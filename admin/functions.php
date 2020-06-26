<?php

// category insertion

function insert_categories()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat-title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $created_category_query = mysqli_query($connection, $query);

            if (!$created_category_query) {
                die('query failed' . mysqli_error($connection));
            }
        }
    }
}

// category update

function update_category()
{
    if (isset($_GET['edit'])) {
        global $connection;

        $cat_id = $_GET['edit'];
        echo '<form class="" action="" method="post">
            <div class="form-group">
            <label for="cat-title">Edit Catergory</label>';

        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
            $select_categories = mysqli_query($connection, $query);

            if (!$select_categories) {
                die("Query Error select categories". mysqli_error($connection));
            } else {
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $category = $row['cat_title'];
                    $id = $row['cat_id'];
                    if (isset($category)) {
                        echo "<input class='form-control' type='text' name='cat-title' value={$category}>";
                    }
                }
            }
        }

        // Query Update
        if (isset($_POST['update'])) {
            $cat_title = $_POST['cat-title'];
            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
            $update_query = mysqli_query($connection, $query);
        }

        echo '</div>
          <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update" value="Update Category">
          </div>
          </form>';
    }
}


// display all Categories

function display_all_categories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $get_all_categories = mysqli_query($connection, $query);

    if (!$get_all_categories) {
        echo "query failed" . mysqli_error($connection);
    } else {
        while ($row = mysqli_fetch_assoc($get_all_categories)) {
            $category = $row['cat_title'];
            $id = $row['cat_id'];
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$category}</td>";
            echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$id}'>Edit</a></td>";
            echo "</tr>";
        }
    }
}

// delete category

function delete_category()
{
    if (isset($_GET['delete'])) {
        global $connection;
        $delete_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id}";

        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");

        if (!$delete_query) {
            die("failed query" . mysqli_error($connection));
        }
    }
}


// verify error connection send query

function confirm_query($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}
