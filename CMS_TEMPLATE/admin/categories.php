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
                        <h1 class="page-header"> Add Categories</h1>

                        <div class="col-xs-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="cat_title" class="form-control" placeholder="Category Title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                        <?php 
                            global $connection;
                            $nav_query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $nav_query);
                        ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while ($row = mysqli_fetch_assoc($select_categories)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>
                                                <td>$cat_id</td>
                                                <td>$cat_title</td>
                                            </tr>";
                                        }
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
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
