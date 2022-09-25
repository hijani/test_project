<?php include "includes/header.php"; ?>

<body>
<?php include "includes/db.php";?>

    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                    if(isset($_GET['p_id'])) {
                        $single_post_id = $_GET['p_id'];
                    }

                    $query = "SELECT * FROM posts WHERE post_id = {$single_post_id}";
                    $select_all_posts = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($select_all_posts)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_content = substr($row['post_content'], 0,100);
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                ?>

                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $single_post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php } ?>

                <?php 
                
                    if(isset($_POST['create_comment'])) {
                        $comment_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_content = $_POST['comment_content'];
                        $comment_email = $_POST['comment_email'];

                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES ($comment_post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now()) ";
                        $create_comment_query = mysqli_query($connection, $query);

                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        $query .= " WHERE post_id = $comment_post_id ";
                        $update_comment_count = mysqli_query($connection, $query);

                    }
                
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <input type="text" name="comment_author" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="comment_email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" class="form-control" rows="3" placeholder="Your Comment"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                
                    
                    
                <?php 
                    $approve_query = "SELECT * FROM comments WHERE comment_post_id = {$single_post_id} ";
                    $approve_query .= " AND comment_status = 'Approved' ";
                    $approve_query .= " ORDER BY comment_id DESC";
                    $select_approve_comments = mysqli_query($connection, $approve_query);

                    while($row = mysqli_fetch_assoc($select_approve_comments)) {
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

                <?php } ?>

                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>



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
