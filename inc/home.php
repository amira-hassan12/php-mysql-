
 <!-- Blog Entries Column -->
 <div class="container">
 
     <div class="col-md-8" >
     <h1 class="page-header">Global news <small> by amira</small> </h1>
     <?php 
            $postsSql ="SELECT * FROM `posts`";
            $allPosts =mysqli_query($connection ,$postsSql);

            while($row =mysqli_fetch_assoc($allPosts)):
                $post_id =$row['post_id'];
                $post_title =$row['post_title'];
                $post_categories=$row['post_categories'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image =$row['post_image'];
                //$post_content=$row['post_content'];
                $post_content=substr($row['post_content'],0,150);
                $post_tags=$row['post_tags'];
                $post_comment_count=$row['post_comment_count'];

    ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?pid=<?=$post_id?>"><?=$post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?=$post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?=$post_image?>" alt="">
                <hr>
                <p><?=$post_content?></p>
                <a class="btn btn -primary" href="post.php?pid=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               <?php endwhile;?>
            </div>
