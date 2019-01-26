<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>AUTHOR</th>
            <th>TITLE</th>
            <th>CATEGORY</th>
            <th>STATUS</th>
            <th>IMAGE</th>
            <th>TAGS</th>
            <th>Comments</th>
            <th>DATE</th>
        </tr>
    </thead>
    <tbody>

    <?php 
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($con, $query);
    
    
        while ($row = mysqli_fetch_assoc($select_posts)) {
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
    
            echo "  <tr>
            <td>{$post_id}</td>
            <td>{$post_author}</td>
            <td>{$post_title}</td>
            <td>$post_status</td>";

            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            $select_categories = mysqli_query($con, $query);

            //  confirm($select_categories);
    
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];    
                $cat_title = $row['cat_title'];

            }


            echo "<td>{$cat_title}</td>    
            <td><img class='img-responsive' style='width:200px; height:100px;' src='../images/{$post_image}'></td>                        
            <td>{$post_tags}</td>
            <td>{$post_comment_count}</td>
            <td>{$post_date}</td>
            <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>
            <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
            
        </tr>";}
    
    
    
    ?>

        
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