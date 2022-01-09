<?php 
    $db_servername = "127.0.0.1";
    $db_username = "mrin";
    $db_password = "12345678";
    $db_dbname = "regify";
    
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname, 3306);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
?>
