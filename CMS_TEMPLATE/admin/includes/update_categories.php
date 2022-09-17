<form action="categories.php" method="post">
                                    <div class="form-group">
                                        <label for="cat_title">Update Category</label>
                                        <?php 
                                            if (isset($_GET['edit'])) {
                                                $edit_id = $_GET['edit'];

                                                global $connection;
                                                $nav_query = "SELECT * FROM categories WHERE cat_id = {$edit_id} ";
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
                                            if(isset($_POST['update_cat'])) {
                                                global $connection;
                                                $update_cat_title = $_POST['cat_title'];
                                                $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id} ";
                                                $update_query = mysqli_query($connection, $query);
                                                header("Location: categories.php");

                                                if(!$update_query) {
                                                    echo "query failed" . mysqli_error($connection);
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="update_cat" value="Update Category" class="btn btn-primary">
                                    </div>
                                </form>