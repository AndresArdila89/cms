<?php include "includes/db.inc.php"; ?>
<!-- Header -->
<?php include "includes/header.inc.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.inc.php"; ?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php


                if (isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                } else {
                    $query = "SELECT * FROM posts";
                }



                  $select_all_post_query = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                      $post_title = $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_image = $row['post_image'];
                      $post_content = substr($row['post_content'], 0, 100);

                      include "includes/post.inc.php";
                  }

                 ?>
                 <!-- Blog Comments -->

                 <?php
                    if (isset($_POST['create_comment'])) {
                        $author = $_POST['comment_author'];
                        $email = $_POST['comment_email'];
                        $comment = $_POST['comment'];

                        $sql = "SELECT"
                    }

                  ?>

                 <!-- Comments Form -->
                 <div class="well">
                     <h4>Leave a Comment:</h4>
                     <form role="form">
                         <div class="form-group">
                             <label for="">Name:</label>
                             <input type="text" class="form-control" name="comment_author" placeholder="Name">
                         </div>
                         <div class="form-group">
                             <label for="">Email:</label>
                             <input type="text" class="form-control" name="comment_email" placeholder="Email">
                         </div>
                         <div class="form-group">
                             <textarea class="form-control"name="comment" rows="3"></textarea>
                         </div>
                         <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                     </form>
                 </div>

                 <hr>

                 <!-- Posted Comments -->

                 <!-- Comment -->
                 <div class="media">
                     <a class="pull-left" href="#">
                         <img class="media-object" src="http://placehold.it/64x64" alt="">
                     </a>
                     <div class="media-body">
                         <h4 class="media-heading">Start Bootstrap
                             <small>August 25, 2014 at 9:30 PM</small>
                         </h4>
                         Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                     </div>
                 </div>

                 <!-- Comment -->
                 <div class="media">
                     <a class="pull-left" href="#">
                         <img class="media-object" src="http://placehold.it/64x64" alt="">
                     </a>
                     <div class="media-body">
                         <h4 class="media-heading">Start Bootstrap
                             <small>August 25, 2014 at 9:30 PM</small>
                         </h4>
                         Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                         <!-- Nested Comment -->
                         <div class="media">
                             <a class="pull-left" href="#">
                                 <img class="media-object" src="http://placehold.it/64x64" alt="">
                             </a>
                             <div class="media-body">
                                 <h4 class="media-heading">Nested Start Bootstrap
                                     <small>August 25, 2014 at 9:30 PM</small>
                                 </h4>
                                 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                             </div>
                         </div>
                         <!-- End Nested Comment -->
                     </div>
                 </div>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.inc.php"; ?>
                    <!-- /.row -->




        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.inc.php"; ?>
