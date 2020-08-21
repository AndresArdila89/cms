<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">




      <form  action="search.php" method="post">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                  <?php
                  $query = "SELECT * FROM categories";
                  $query_get_categories = mysqli_query($connection, $query);

                  if (!$query_get_categories) {
                      echo "query failed" . mysqli_error($connection);
                  } else {
                      while ($row = mysqli_fetch_assoc($query_get_categories)) {
                          $category = $row['cat_title'];
                          $cat_id = $row['cat_id'];
                          echo "<li><a href='category.php?category=$cat_id'>{$category}</a></li>";
                      }
                  }

                   ?>


                </ul>
            </div>

        </div>
      </div>
      <!-- Side Widget Well -->

<?php include "widget.inc.php" ?>





  </div>
