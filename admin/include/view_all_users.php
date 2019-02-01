<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>User_name</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>UserEmail</th>
            <th>UserRole</th>
            
        </tr>
    </thead>
    <tbody>

    <?php 
        $query = "SELECT * FROM users";
        if(!$con){
            echo "error";
        }
        $select_users = mysqli_query($con, $query);
    
    
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id']; 
            $username = $row['username']; 
            $user_password = $row['user_password']; 
            $user_firstname = $row['user_firstname']; 
            $user_lastname = $row['user_lastname'];  
            $user_email = $row['user_email'];
            $user_image = $row['user_image']; 
            $user_role = $row['user_role'];                               
    
            
    
            echo "  <tr>
            <td>$user_id</td>
            <td>$username</td>
            <td>$user_firstname</td>
            <td> $user_lastname</td>
            <td>$user_email</td>
            <td>$user_role</td>
            <td><a href='comments.php?approve='>Approve</a></td>
            <td><a href='comments.php?unapprove='>Unapprove</a></td>
            <td><a href='comments.php?delete='>Delete</a></td></tr>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            // $select_categories = mysqli_query($con, $query);

            //  confirm($select_categories);
    
            // while ($row = mysqli_fetch_assoc($select_categories)) {
            //     $cat_id = $row['cat_id'];    
            //     $cat_title = $row['cat_title'];
            //     echo "<td>{$cat_title}</td>";  
            // }
            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            // $select_post_id_query = mysqli_query($con, $query);
            // while($row = mysqli_fetch_assoc($select_post_id_query)){
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];
            //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }
       

              
     }
    
    
    
    ?>

        
    </tbody>
</table>

<?php 
if(isset($_GET['approve'])){
    $comment_post_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $comment_post_id";
    $approve_query = mysqli_query($con, $query);
    header("Location: comments.php"); 
}
if(isset($_GET['unapprove'])){
    $comment_post_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $comment_post_id";
    $unapprove_query = mysqli_query($con, $query);
    header("Location: comments.php"); 
}

if(isset($_GET['delete'])){
    $comment_post_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$comment_post_id} ";
    $delete_query = mysqli_query($con, $query);

    header("Location: comments.php"); 
}

?>