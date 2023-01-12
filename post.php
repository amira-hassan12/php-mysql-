<?php
include './inc/header.php';
include './inc/navbar.php';

?>
<!-- Page Content -->
<div class="container">


 
    <div class="row">
        <div class="col-lg-8">

            <!-- Blog Post -->
            <?php 
            
            if (isset($_GET['pid'])){
                $pid=$_GET['pid'];
            }
            $postsSql ="SELECT * FROM `posts` WHERE `post_id`='$pid'";
            $allPosts =mysqli_query($connection ,$postsSql);

            while($row =mysqli_fetch_assoc($allPosts)):
                $post_id =$row['post_id'];
                $post_title =$row['post_title'];
                $post_categories=$row['post_categories'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image =$row['post_image'];
                $post_content=$row['post_content'];
               // $post_content=substr($row['post_content'],0,150);
                $post_tags=$row['post_tags'];
                $post_comment_count=$row['post_comment_count'];

    ?>

            <!-- Title -->
            <h1><?=$post_title?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?=$post_author?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post_date?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="images/<?=$post_image?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                <?=$post_content?> </p>
            <hr>

            <!-- Blog Comments -->
            <?php endwhile;?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
        <?php
        include './inc/sidebar.php';
        
       
        ?>


    </div>
    <!-- /.row -->

    <?php include './inc/footer.php'; ?>