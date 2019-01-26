<?php 

function comfirm($result){
    global $con;
    if(!$result){
        die("QUERY FAIL,  ".mysqli_error($con));
    }
}

function add_newpost(){
    global $con;
    if(isset($_POST['create_post'])){ 
        $post_title = $_POST['title']; 
        $post_category_id = $_POST['post_category']; 
        $post_author = $_POST['author'];  
        $post_status = $_POST['post_status'];
                                            
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');  
        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
        $query .= "VALUE({$post_category_id},'{$post_title}', '{$post_author }',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}')";
        
        $create_post_query = mysqli_query($con, $query);
        comfirm($create_post_query);
    }
}

function insert_categories(){
    global $con;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title =="" || empty($cat_title)) {
            echo "This field should not be empty";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($con, $query);
            if(!$create_category_query){
                die('QUERY FAILED' . mysqli_error($con));
            }
        }
    }
}

function findAllCategories(){
    global $con;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($con, $query);


    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];    
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_category(){
    global $con;
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($con, $query);
    header("Location: categories.php");    
    }
}







?>