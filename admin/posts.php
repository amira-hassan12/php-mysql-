<?php 
    include('./admin_inc/admin_header.php');
    include('./admin_inc/admin_navbar.php');
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <h1 class="page-header">  Kholoud News <small> posts </small>  </h1>

                <div class="row">

                    <div class="col-md-12">

                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="30%">Title</th>
                                <th width="20%">author</th>
                                <th width="20%">image</th>
                                <th width="20%">Edit</th>
                                <th width="20%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        <tr>
                                <td><?=$post_id?></td>
                                <td><?=$post_title?></td>
                                <td><?=$post_author?></td>
                                <td><img class="img-responsive" src="../images/<?=$post_image?> "width="100"></td>
                                <td class="text-center"><a href="posts.php" class="btn btn-warning"> <i class="fa fa-edit"></i> </a></td>
                                <td class="text-center"><a href="posts.php" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
                            </tr>
                       <?php endwhile; ?>
                            </tbody>
                            <!--delete -->
                            <?php 
                            if (isset($_GET['del_id'])){
                                    $del_id =$_GET['del_id'];
                                    $delSql ="DELETE FROM `posts` WHERE `post_id`='$del_id'";
                                    $delCategory =mysqli_query($connection ,$delSql);
                                    header("Location:posts.php");
                                    } 
                            ?>
                            



                       </table>
                      </div> <!-- form -->
                        </div> <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div> <!-- /#page-wrapper -->

        <?php   include('./admin_inc/admin_footer.php');?>