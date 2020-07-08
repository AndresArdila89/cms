
<?php

  if (isset($_GET['post_id'])) {
      $id=$_GET['post_id'];

      $sql = "SELECT * FROM posts WHERE post_id = $id";
      $result = mysqli_query($connection, $sql);

      if (!$result) {
          die("query failed" . mysqli_error($connection));
      } else {
          while ($row = mysqli_fetch_assoc($result)) {
              $title = $row['post_title'];
              $category_id = $row['post_category_id'];
              $author = $row['post_author'];
              $status = $row['post_status'];
              $image = $row['post_image'];
              $tag = $row['post_tags'];
              $content = $row['post_content'];
          }
      }
  }

 ?>



<form class=""  action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Post Title</label>
    <input type="text" name="post_title" value="<?php echo $title; ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="">Post category id</label>
    <input type="text" name="post_category_id" value="<?php echo $category_id; ?>" class="form-control">
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
    <input type="file" name="image" value="<?php echo $image ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Tag</label>
    <input type="text" name="post_tags" value="<?php echo $tag; ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Content</label>
    <textarea type="text" name="post_content" class="form-control">
      <?php echo $content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="create_post" value="Create Post" class="btn btn-primary">
  </div>
</form>
