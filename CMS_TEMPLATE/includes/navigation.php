<?php include "db.php"; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php 
                        global $connection;
                        $nav_query = "SELECT * FROM categories";
                        $select_data_from_categories = mysqli_query($connection, $nav_query);
                        while ($row = mysqli_fetch_assoc($select_data_from_categories)){
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='#'>$cat_title</a></li>";
                        }
                ?>
                <li> <a href="admin">Admin</a> </li>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>