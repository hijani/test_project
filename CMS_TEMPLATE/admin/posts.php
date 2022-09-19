<?php ob_start(); ?>
<?php include "includes/header.php" ?>

<body>

    <div id="wrapper">
    
        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Posts</h1>

<?php 
    if(isset($_GET['source'])) {
        $source = $_GET['source'];

    } else {
        switch($source) {
            case '34':
            echo "nice34";
            break;
            case '100':
            echo "nice100";
            break;
            case "200":
            echo "nice200";
            break;
            default:
            include "includes/view_all_posts.php";
            break;

        }
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
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
