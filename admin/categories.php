<?php 
    include('./admin_inc/admin_header.php');
    include('./admin_inc/admin_navbar.php');
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <h1 class="page-header">  Kholoud News <small> Categories </small>  </h1>

                <div class="row">

                    <div class="col-md-6">

                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="50%">Title</th>
                                <th width="20%">Edit</th>
                                <th width="20%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                    <?php 
                    $Sqlcategories ="SELECT * FROM `categories`";
                    $allCategories=mysqli_query($connection ,$Sqlcategories);
                    while($row =mysqli_fetch_assoc($allCategories)):
                        $cat_id =$row ['cat_id'];
                        $cat_title =$row['cat_title'];
                        ?>

                        <tr>
                                <td><?=$cat_id?></td>
                                <td><?=$cat_title?></td>
                                <td class="text-center"><a href="categories.php?edit_id=<?=$cat_id?>" class="btn btn-warning"> <i class="fa fa-edit"></i> </a></td>
                                <td class="text-center"><a href="categories.php?del_id=<?=$cat_id?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    <!--delete  code-->
                        <?php 
                            if (isset($_GET['del_id'])){
                                    $del_id =$_GET['del_id'];
                                    $delSql ="DELETE FROM`categories` WHERE `cat_id`='$del_id'";
                                    $delCategory =mysqli_query($connection ,$delSql);
                                    header("Location:categories.php");
                                    } 
                        ?>

                    </table>
                    </div> <!-- table -->
                    <div class="col-md-6">
                        
                      <?php 
                      if(isset($_POST['add_category'])){
                          $title =$_POST['title'];
                          if($title==""|| empty($title)){
                            echo '
                                  <div class="alert alert-danger text-center">
                                    <h1 class="text-danger">اكتب اى حاجة</h1>
                                  </div>
                                  ';
                                }else{
                                    $inserSql="INSERT INTO `categories`(`cat_title`) VALUES ('$title')";
                                    $newCategory =mysqli_query($connection ,$inserSql);
                                    header("Location:categories.php");

                                }//else
                      }//if isset
                    ?>



                        <form action="" method="post">
                            <div class="form-group">
                                <label>Category Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="add_category" class="btn btn-primary btn-block">
                            </div>

                        </form>
                    
                
                        <!--edit code-->
                        <?php 
                        if (isset($_GET['edit_id'])){
                            $edit_id =$_GET['edit_id'];
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Category Title</label>
                                    <?php 
                                        $Sqlcategories ="SELECT * FROM `categories`WHERE `cat_id`='$edit_id'";
                                        $allCategories=mysqli_query($connection ,$Sqlcategories);
                                        while($row =mysqli_fetch_assoc($allCategories)):
                                            $cat_id =$row ['cat_id'];
                                            $cat_title =$row['cat_title'];
                                    ?>

                                    <input type="text" name="title" class="form-control" value="<?=$cat_title?>">
                                    <?php endwhile; ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="update_category" value="Update" class="btn btn-success btn-block">
                                    <?php
                                    if(isset($_POST['update_category'])){
                                        $title =$_POST['title'];
                                          
                                                  $updateSql="UPDATE `categories` SET `cat_title`='$title' WHERE `cat_id`='$edit_id'";
                                                  $updateCategory =mysqli_query($connection ,$updateSql);
                                                  header("Location:categories.php");
              
                                    }//if isset
                                    
                                    
                                    ?>

                                </div>
                            </form>
                        <?php
                        }
                        ?>
                      </div> <!-- form -->
                        </div> <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div> <!-- /#page-wrapper -->

        <?php   include('./admin_inc/admin_footer.php');?>