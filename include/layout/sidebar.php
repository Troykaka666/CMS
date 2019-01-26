<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>

    <?php 

if (isset($_POST['submit'])) {
    $search =  $_POST["search"];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = mysqli_query($con, $query);

    if(!$search_query){
        die("query fail".mysqli_error($con));
    }

    $count = mysqli_num_rows($search_query);

    if($count == 0){
        echo "<h1>No Result</h1>";
    }else{
        
    }
}
   


?>
<!-- search form -->
<form action="search.php" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

  
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <?php
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($con, $query);
    ?>


    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php
            while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

                echo "<li>
                <a href='category.php?category=$cat_id'>{$cat_title}</a>
            </li>";
            }
            ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "include/layout/widget.php" ?>


</div>