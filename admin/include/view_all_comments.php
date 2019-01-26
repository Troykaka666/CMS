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
    
    
        while ($row = mysqli_fetch_assoc($select_comments)) {
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
            <td>$comment_email</td>
            <td>$comment_status</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            // $select_categories = mysqli_query($con, $query);

            //  confirm($select_categories);
    
            // while ($row = mysqli_fetch_assoc($select_categories)) {
            //     $cat_id = $row['cat_id'];    
            //     $cat_title = $row['cat_title'];
            //     echo "<td>{$cat_title}</td>";  
            // }
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }
            echo "<td>{$comment_date}</td>
            <td><a href='comments.php?approve={$comment_id}'>Approve</a></td>
            <td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>
            <td><a href='comments.php?delete={$comment_id}'>Delete</a></td></tr>";

              
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