<?php include "includes/admin_header.inc.php" ?>
<?php include "includes/admin_navigation.inc.php" ?>


<div id="page-wrapper">
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Categories <small>add a category</small></h1>

        <!-- Add category form -->
        <div class="col-xs-6">

          <?php insert_categories();?>

          <form class="" action="" method="post">
            <div class="form-group">
              <label for="cat-title">Add Catergory</label>
              <input class="form-control" type="text" name="cat-title" value="">
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
            </div>
          </form>

          <!-- Update Category -->
          <?php update_category();?>

        </div>

        <div class="col-xs-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category</th>
              </tr>
            </thead>
            <tbody>

              <!-- display all categories -->
              <?php display_all_categories();?>

              <!-- delete category -->
              <?php delete_category();?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.inc.php" ?>
