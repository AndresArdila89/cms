<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tag = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_title, post_category_id, post_author, post_status, post_image, post_tags, post_content, post_date, post_comment_count)";
    $query .= "VALUES ('{$post_title}', {$post_category_id}, '{$post_author}', '{$post_status}', 'images/{$post_image}', '{$post_tag}', '{$post_content}', now(), {$post_comment_count}) ";

    $create_new_post_query = mysqli_query($connection, $query);

    confirm_query($create_new_post_query);
}
?>

<form class=""  action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Post Title</label>
    <input type="text" name="post_title" value="" class="form-control">
  </div>
  <div class="form-group">
    <label for="">Post category id</label>
    <select name="post_category_id" class="form-control">
      <option value=""></option>
      <?php
          $sql = "SELECT * FROM categories";
          $result = mysqli_query($connection, $sql);

          if (!$result) {
              die("query failed" . mysqli_error($connection));
          } else {
              while ($row = mysqli_fetch_assoc($result)) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];

                  echo "<option value='$cat_id'>$cat_title</option>";
              }
          }
       ?>

      </select>
  </div>

  <div class="form-group">
    <label for="">Post Author</label>
    <input type="text" name="post_author" value="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Status</label>
    <input type="text" name="post_status" value="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Image</label>
    <input type="file" name="image" value="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Tag</label>
    <input type="text" name="post_tags" value="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Post Content</label>
    <textarea type="text" name="post_content" value="" class="form-control">
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="create_post" value="Create Post" class="btn btn-primary">
  </div>
</form>
