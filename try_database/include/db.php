<?php 

    $connection = mysqli_connect("localhost", "root", "", "try");
    if (!$connection) {
        echo "connection error" . mysqli_connect_error();
    } 


?>