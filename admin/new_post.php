<?php 
    include('./admin_inc/admin_header.php');
    include('./admin_inc/admin_navbar.php');
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <h1 class="page-header">  News <small> add new post </small>  </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Page Content  -->
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Post Title</label>
                        <input type="text" name="post_title" class="form-control">
                    </div><!-- title -->

                    <div class="form-group">
                        <label>Post Category</label>
                        <select name="post_category" class="form-control">

                        <?php 
                        $Sqlcategories ="SELECT * FROM `categories`";
                        $allCategories=mysqli_query($connection ,$Sqlcategories);
                        while($row =mysqli_fetch_assoc($allCategories)):
                            $cat_id =$row ['cat_id'];
                            $cat_title =$row['cat_title'];
                        ?>

                            <option value="<?=$cat_id?>"><?=$cat_title?></option>
                            <?php endwhile; ?>
                        </select>
                    </div><!--  Category -->

                    <div class="form-group">
                        <label>Post Author</label>
                        <input type="text" name="post_author" class="form-control">
                    </div><!--  Author -->

                    <div class="form-group">
                        <label>Post Image</label>
                        <input type="file" name="post_image" class="form-control">
                    </div><!--  Image -->

                    <div class="form-group">
                        <label>Post Content</label>
                        <textarea rows="5" name="post_content" class="form-control"></textarea>
                    </div><!--  Content -->

                    <div class="form-group">
                        <label>Post Tags</label>
                        <input type="text" name="post_tags" class="form-control">
                    </div><!--  Tags -->

                    <div class="form-group">
                        <input type="submit" name="add_post" class="btn btn-primary btn-block">
                    </div>
                </form>
                <?php
                if(isset($_POST['add_post'])){

                    $post_title=$_POST['post_title'];
                    $post_categories=$_POST['post_categories'];
                    $post_author=$_POST['post_author'];

                    $post_date=date('d-m-y');
                    $post_content=$_POST['post_content'];
                    $post_tagse=$_POST['post_tags'];

                    $post_image_name=$_FILES['post_image']['name'];
                    $post_image_tmp=$_FILES['post_image']['tmp_name'];
                    move_uploaded_file($post_image_tmp,"../images/$post_image_name");

                    $insertSql = " INSERT INTO `posts`
                    ( `post_title`, `post_categories`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`) 
                    VALUES
                     ('$post_title','$post_categories','$post_author','$post_date','$post_image_name','$post_content','$post_tags')";

                    $newPost = mysqli_query($connection, $insertSql);
                    header("LOCATION:posts.php");
                 
                }
                ?>
                </div>
                </div> <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

        <?php   include('./admin_inc/admin_footer.php');?>