<?php 

    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_password'] = "";
    $db['db_name'] = "cms";

    // foreach($db[$key] => $value) {

    // }
    $connection = mysqli_connect("localhost", "root", "", "cms");
    if($connection) {
        echo "hell";
    }


?>