<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_GET['delete'])) {
        $post_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
        $delete_comment_query = mysqli_query($connection, $query);

        confirm_query($delete_comment_query);
    }
     ?>


      <?php
        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($connection, $query);

        if (!$select_comments) {
            die("QUERY FAILED LOAD COMMENTS" .  mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($select_comments)) {
                $id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $author = $row['comment_author'];
                $email = $row['comment_email'];
                $content = $row['comment_content'];
                $status = $row['comment_status'];
                $date = $row['comment_date'];






                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$author</td>";
                echo "<td>$content</td>";
                echo "<td>$email</td>";

                // $query = "SELECT * FROM categories WHERE cat_id = $category";
                // $select_categorie = mysqli_query($connection, $query);
                // while ($row = mysqli_fetch_assoc($select_categorie)) {
                //     $cat_id= $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                //     echo "<td>$cat_title</td>";
                // }


                echo "<td>$status</td>";

                echo "<td>pending</td>";
                echo "<td>$date</td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$id}'>Approve</a></td>";
                echo "<td><a href='posts.php?delete={$id}'>Unapprove</a></td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$id}'>Delete</a></td>";
                echo "</tr>";
            }
        }

       ?>
  </tbody>
</table>
