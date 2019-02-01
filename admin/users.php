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

                    <!-- Display posts -->

                    <?php 
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = "";
                    }
                    switch ($source) {
                        case 'add_post':
                            include "include/add_user.php";
                            break;
                        case 'edit_post':
                            include "include/edit_user.php";
                            break;
                        default:
                            include "include/view_all_users.php"; 
                            break;
                    }

                  
                    
                    ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include "include/footer.php" ?>
