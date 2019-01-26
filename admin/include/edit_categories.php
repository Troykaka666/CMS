<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php 
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
        $select_categories_id = mysqli_query($con, $query);


        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];    
            $cat_title = $row['cat_title'];
        
            ?>
        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
        <?php } }
        //Update Category
        if(isset($_POST['edit'])){
            $the_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
            $update_query = mysqli_query($con, $query);
            if (!$update_query) {
                # code...
                die("QUERY FAIL".mysqli_error($con));
            }
        }
        
        ?>  
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit" value="Edit Category">
    </div>
</form>