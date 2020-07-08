<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_GET['delete'])) {
        $post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$post_id}";
        $delete_post_query = mysqli_query($connection, $query);

        confirm_query($delete_post_query);
    }
     ?>


      <?php
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query);

        if (!$select_posts) {
            die("QUERY FAILED LOAD POSTS" .  mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($select_posts)) {
                $id = $row['post_id'];
                $category = $row['post_category_id'];
                $title = $row['post_title'];
                $author = $row['post_author'];
                $date = $row['post_date'];
                $image = $row['post_image'];
                $comment = $row['post_content'];
                $tag = $row['post_tags'];
                $comment_count = $row['post_comment_count'];
                $status = $row['post_status'];


                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$author</td>";
                echo "<td>$title</td>";
                echo "<td>$category</td>";
                echo "<td>$status</td>";
                echo "<td><img class='img-responsive' width='100' src='../$image' alt=''> </td>";
                echo "<td>$tag</td>";
                echo "<td>$comment</td>";
                echo "<td>$date</td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$id}'>Delete</a></td>";
                echo "</tr>";
            }
        }

       ?>
  </tbody>
</table>
