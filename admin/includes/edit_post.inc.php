
<?php
// get the values from the url
  if (isset($_GET['post_id'])) {
      $id=$_GET['post_id'];
      // if the global variable is true the we run the sql statement
      $sql = "SELECT * FROM posts WHERE post_id = $id";
      $result = mysqli_query($connection, $sql);
      // verifie if the result from the query is successful
      if (!$result) {
          die("query failed" . mysqli_error($connection));
      } else {
          // run a loop to fetch the data from the database
          while ($row = mysqli_fetch_assoc($result)) {
              $title = $row['post_title'];
              $category_id = $row['post_category_id'];
              $author = $row['post_author'];
              $status = $row['post_status'];
              $image = $row['post_image'];
              $tag = $row['post_tags'];
              $content = trim($row['post_content']);
          }
      }
  }






  if (isset($_POST['update_post'])) {
      $post_title = $_POST['post_title'];
      $category = $_POST['categories'];
      $post_author = $_POST['post_author'];
      $post_status = $_POST['post_status'];
      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];
      // upload post image

      if (!empty($_FILES['image']['name'])) {
          $post_image = 'images/' . $_FILES['image']['name'];
          $post_image_temp = $_FILES['image']['tmp_name'];
          move_uploaded_file($post_image_temp, "../$post_image");
      } else {
          $post_image = $image;
      }






      $sql = "UPDATE posts SET post_title = '$post_title', post_category_id = $category, post_author = '$post_author', post_status = '$post_status', post_tags = '$post_tags', post_content = '$post_content', post_image = '$post_image' WHERE post_id = $id";
      $result = mysqli_query($connection, $sql);

      if (!$result) {
          die("QUERY FAILED 2" . mysqli_error($connection));
      }
      header("Location: posts.php?update=success");
  }

 ?>



<form class=""  action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Post Title</label>
    <input type="text" name="post_title" value="<?php echo $title; ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="">Post category id</label>
    <select class="form-control" name="categories">
      <!-- get all the categories from the database to display them dinamicaly in the page -->
      <?php
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
            die("QUERY FAILED". mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $cat = $row['cat_title'];
                $cat_id = $row['cat_id'];

                echo "<option value='$cat_id'>{$cat}</option>";
            }
        }
      ?>

    </select>

  </div>

  <div class="form-group">
    <label for="">Post Author</label>
    <input type="text" name="post_author" value="<?php echo $author; ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Status</label>
    <input type="text" name="post_status" value="<?php echo $status; ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Image</label>
    <img height="100" src="../<?php echo $image ?>" alt="">

    <input type="file" name="image"  class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Tag</label>
    <input type="text" name="post_tags" value="<?php echo $tag; ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Content</label>
    <textarea type="text" name="post_content" class="form-control"><?php echo $content;?></textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
  </div>
</form>

<?php

 ?>
