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
                    if(isset($_GET['p_id'])){
                        $post_id = $_GET['p_id'];
                    }

                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                    $select_all_posts_query = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_category_id = $row['post_category_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image= $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];

                        echo      "<h2>
                        <a href='#'>$post_title</a>
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
           
<!-- Blog Comments -->

                <!-- Comments Form -->
                <?php 
                
                if(isset($_POST['create_comment'])){
                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    $comment_status = "Unapprove";
                    // $comment_date = now();

                    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                    $query .= "VALUES($the_post_id, '{$comment_author}','{$comment_email}','{$comment_content}','{$comment_status}',now()) ";
                    
                    $create_comment_query = mysqli_query($con, $query);

                    if(!$create_comment_query){
                        die("QUERY FAILED".mysqli_error($con));
                    }

                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query .= "WHERE post_id = $the_post_id ";
                    $update_comment_count = mysqli_query($con, $query);
                }
                
                
                
                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="Author">Name</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="Email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Comments">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
            

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        
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
                     
                    </div>
                </div> -->


                <!-- Posted Comment -->
                <?php 
                $query = "SELECT * FROM comments WHERE comment_post_id ={$post_id} ";
                $query .= "AND comment_status = 'approve' ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($con,$query);
                if(!$select_comment_query){
                    die('QUERY FAILED'.mysqli_error($con));
                }
                while($row = mysqli_fetch_assoc($select_comment_query)){
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];
                
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>
                <?php } ?>
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
