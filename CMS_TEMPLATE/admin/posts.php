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

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>autht</td>
                                    <td>tiuttu</td>
                                    <td>catet</td>
                                    <td>stat</td>
                                    <td>imghm</td>
                                    <td>tagg</td>
                                    <td>commm</td>
                                    <td>dteee</td>
                                </tr>
                            </tbody>
                        </table>
                        

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
