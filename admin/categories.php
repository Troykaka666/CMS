<?php ob_start(); ?>
<?php include "include/header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "include/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author Name</small>
                        </h1>
                        <div class="col-xs-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                         <?php 
                         if(isset($_GET['edit'])){
                             $cat_id = $_GET['edit'];
                             include "include/edit_categories.php"; 
                         }                      
                         ?>   

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        <?php 
                                        findAllCategories();

                                        //Delete Function
                                        delete_category();
                                        ?>
                                     
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include "include/footer.php" ?>
