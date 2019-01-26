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
            <td>$post_status</td>
            <td>{$post_category_id}</td>    
            <td><img class='img-responsive' style='width:50%;' src='../images/{$post_image}'></td>                        
            <td>{$post_tags}</td>
            <td>{$post_comment_count}</td>
            <td>{$post_date}</td>
            
        </tr>";}
    
    
    
    ?>

        
    </tbody>
</table>