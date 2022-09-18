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
                        <h1 class="page-header"> CRUD Categories</h1>

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
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" class="form-control" placeholder="Category Title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                </div>
                            </form>
                            
                            
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Update Category</label>
                                    <?php 
                                        if (isset($_GET['edit'])) {
                                            $edit_id = $_GET['edit'];

                                            global $connection;
                                            $nav_query = "SELECT * FROM categories WHERE cat_id = {$edit_id}";
                                            $select_categories = mysqli_query($connection, $nav_query);

                                            while ($row = mysqli_fetch_assoc($select_categories)){
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                    ?>
                                        <input type="text" value=<?php if (isset($cat_title)) {echo $cat_title;} ?> name="cat_title" class="form-control" placeholder="Category Title">
                                    <?php 
                                            }
                                        } 
                                    ?>

                                    <?php 
                                        if(isset($_POST['update'])) {
                                            $update_cat_title = $_POST['cat_title'];
                                            global $connection;
                                            $update_query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id}";
                                            $update_connect_query = mysqli_query($connection, $update_query);
                                            header("Location: categories.php");

                                            if(!$update_connect_query) {
                                                echo "query failed" . mysqli_error($connection);
                                            }
                                        }
                                    ?>
                                    
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" value="Update Category" class="btn btn-primary">
                                </div>
                            </form>


                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        global $connection;
                                        $nav_query = "SELECT * FROM categories";
                                        $select_categories = mysqli_query($connection, $nav_query);

                                        while ($row = mysqli_fetch_assoc($select_categories)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>
                                                <td>{$cat_id}</td>
                                                <td>{$cat_title}</td>
                                                <td><a href='categories.php?delete={$cat_id}' />Delete</td>
                                                <td><a href='categories.php?edit={$cat_id}' />Edit</td>
                                            </tr>";
                                        }
                                    ?>

                                    <?php
                                        if(isset($_GET['delete'])) {
                                            $delete_cat_id = $_GET['delete'];
                                            $delete_query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
                                            $run_query = mysqli_query($connection, $delete_query);
                                            header("Location: categories.php");
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
