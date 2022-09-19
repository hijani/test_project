
<?php

    function view_category() {
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
    }

    function inset_category() {
        global $connection;
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
    }

    function delete_category() {
        global $connection;
        if(isset($_GET['delete'])) {
            $delete_cat_id = $_GET['delete'];
            $delete_query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";
            $run_query = mysqli_query($connection, $delete_query);
            header("Location: categories.php");
        }
    }
?>