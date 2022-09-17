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
                            <?php
                                if(isset($_POST['submit'])) {
                                    $cat_title = $_POST['cat_title'];

                                    if(empty($cat_title) || $cat_title == "") {
                                        echo "This field should not be empty.";
                                    } else {
                                        $query = "INSERT INTO categories(cat_title)";
                                        $query .= " VALUES ('$cat_title')";

                                        $create_category = mysqli_query($connection, $query);

                                        if($create_category == false) {
                                            die( "query failed" . mysqli_error($connection));
                                        }
                                    }  
                                }
                            ?>
                            <form action="categories.php" method="post">
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
                                                <td><a href='categories.php?delete = $cat_id' />Delete</td>
                                            </tr>";
                                        }
                                    ?>

                                    <?php
                                        if(isset($_POST['delete'])) {
                                            $delete_cat_id = $_POST['delete'];
                                            $delete_query = "DELETE FROM categories WHERE cat_id = $cat_id";
                                            $run_query = mysqli_query($connection, $delete_query);
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
