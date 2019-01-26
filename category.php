<!DOCTYPE html>
<html lang="en">
<?php include "include/db.php" ?>
<?php include "include/layout/header.php" ?>


<body>
    <!-- Navigation -->
    <?php include "include/layout/nav.php" ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               

                <?php 
                    if(isset($_GET['category'])){
                        $post_category_id = $_GET['category'];
                    }

                    $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
                    $select_all_posts_query = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_id = $row['post_id'];
                        $post_category_id = $row['post_category_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image= $row['post_image'];
                        $post_content = substr($row['post_content'],0,50);
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];

                        echo      "<h2>
                        <a href='post.php?p_id=$post_id'>$post_title</a>
                    </h2>
                    <p class='lead'>
                        by <a href='index.php'>$post_author</a>
                    </p>
                    <p><span class='glyphicon glyphicon-time'></span> Posted on $post_date</p>
                    <hr>
                    <img class='img-responsive' src='images/$post_image' alt=''>
                    <hr>
                    <p>$post_content</p>
                    <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
                    <hr>";
                    }
                
                ?>

                <!-- First Blog Post -->
           
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed officia consequatur quasi cupiditate dolor facilis aliquam, veritatis magnam, eveniet omnis esse! Facilis consequatur ut itaque ex! Veritatis neque sunt ab?  

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/layout/sidebar.php" ?>
            
 

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "include/layout/footer.php" ?>
      
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
