<?php include "includes/header.php"; ?>
<?php include "includes/db.php";?>
<body>


    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

<?php 
        
    if(isset($_POST['submit'])) {
        global $connection;

        $search = $_POST['search'];

        $search_query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_connection = mysqli_query($connection, $search_query);

        if (!$search_connection) {
            die("query error" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($search_connection);

        if($count == 0) {
            echo "<h1>Nothing Found<h1/>";
        } else {

            while ($row = mysqli_fetch_array($search_connection)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
    <?php } 
        }


    }
    ?>


            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
