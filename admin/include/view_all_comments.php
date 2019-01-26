<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>AUTHOR</th>
            <th>comment</th>
            <th>email</th>
            <th>STATUS</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php 
        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($con, $query);
    
    
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $comment_id = $row['comment_id']; 
            $comment_post_id = $row['comment_post_id']; 
            $comment_author = $row['comment_author']; 
            $comment_email = $row['comment_email'];  
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];                                   
    
            
    
            echo "  <tr>
            <td>$comment_id</td>
            <td>$comment_author</td>
            <td>$comment_content</td>
            <td>$comment_email</td>";

            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            $select_categories = mysqli_query($con, $query);

            //  confirm($select_categories);
    
            // while ($row = mysqli_fetch_assoc($select_categories)) {
            //     $cat_id = $row['cat_id'];    
            //     $cat_title = $row['cat_title'];
            //     echo "<td>{$cat_title}</td>";  
            // }


              
     }
    
    
    
    ?>
    <td><img class='img-responsive' style='width:200px; height:100px;' src='../images/{$post_image}'></td>                        
    <td>{$post_tags}</td>
    <td>{$post_comment_count}</td>
    <td>{$post_date}</td>
    <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>
    <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
    
</tr>
        
    </tbody>
</table>

<?php 
if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($con, $query);

    header("Location: posts.php"); 
}

?>