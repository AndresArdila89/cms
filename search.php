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

                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];

                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);

                    if (!$search_query) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    } else {
                        $count = mysqli_num_rows($search_query);

                        if ($count == 0) {
                            echo "<h1>no result</h1>";
                        } else {
                            while ($row = mysqli_fetch_assoc($search_query)) {
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];

                                include "includes/post.inc.php";
                            }
                        }
                    }
                }

                 ?>




            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.inc.php"; ?>
                    <!-- /.row -->




        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.inc.php"; ?>
