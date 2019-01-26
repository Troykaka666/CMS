<?php 
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }
     $query = "SELECT * FROM posts";
     $select_posts_by_id = mysqli_query($con, $query);
 
    
     while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
         $post_id = $row['post_id']; 
         $post_category_id = $row['post_category_id']; 
         $post_title = $row['post_title']; 
         $post_author = $row['post_author'];  
         $post_date = $row['post_date'];                                   
         $post_image = $row['post_image']; 
         $post_content = $row['post_content'];
         $post_tags = $row['post_tags'];
         $post_comment_count = $row['post_comment_count'];
         $post_status = $row['post_status'];
     }

     if(isset($_POST['update_post'])){
        $post_category_id = $_POST['post_category']; 
        $post_title = $_POST['post_title']; 
        $post_author = $_POST['post_author'];  
        $post_status = $_POST['post_status'];                                  
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name']; 
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)){
            $post_image = "logo2.png";
        }

        $query = "UPDATE posts SET ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_title = '{$post_title}', ";
       
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_date = now(), ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_status = '{$post_status}' ";
        $query .= "WHERE post_id = {$the_post_id} ";

        $update_post_query = mysqli_query($con,$query);
        if(!$query){
            die("QUERY FAIL ".mysqli_error($con));
        }
        
     }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
    </div>
    <div class="form-group">
        <select name="post_category" id="post_category">
            <?php 
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($con, $query);

                //  confirm($select_categories);
        
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];    
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author ?>">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status ?>">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $post_image; ?>" style="width:100px;" alt="">
        <!-- <label for="post_image">Post Image</label>-->
        <input type="file"  name="image" /> 
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control">
            <?php echo $post_content ?>
        </textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Publish Post" name="update_post" />
    </div>
</form>