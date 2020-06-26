<!-- First Blog Post -->
<h2>
    <a href="#"><?php echo $post_title; ?></a>
</h2>
<p class="lead">
    by <a href="index.php"><?php echo $post_author; ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
<hr>
<img class="img-responsive" src="<?php echo $post_image; ?>" alt="">
<hr>
<p><?php echo $post_content; ?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
