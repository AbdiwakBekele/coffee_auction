<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db_Name = "auction_db";

    $con = mysqli_connect($serverName, $userName, $password, $db_Name);

    if(!$con){
        $msg = "Error Connecting the server <br/>";
        $msg .= "Error No: " . mysqli_connect_errno();
        $msg .= "Error: " . mysqli_connect_error();
        die($msg);
    }

?>