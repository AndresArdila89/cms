<?php include "includes/admin_header.inc.php" ?>
<?php include "includes/admin_navigation.inc.php" ?>


<div id="page-wrapper">
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Posts <small>edit a post</small></h1>


        <?php

        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }

        switch ($source) {
        case 'add_post':
        include "includes/add_post.inc.php";
        break;

        case 'edit_post':
        include "includes/edit_post.inc.php";
        break;

        case '122':
        echo "nice";
        break;

        default:
        include "includes/view_all_post.inc.php";
        break;

      }
        ?>


      </div>
      <!-- col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.inc.php" ?>
