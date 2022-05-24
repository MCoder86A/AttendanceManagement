<?php 
    $db_servername = "hostaddress";
    $db_username = "username";
    $db_password = "12345678";
    $db_dbname = "regify";
    
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname, 3306);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
?>
