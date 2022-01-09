<?php

    session_start();
    $userinfo = $_SESSION["userinfo"]["userinfo"];
    $sub = $_POST["SUB"];
    $std = $_POST["STD"];
    
    require("../../db.php");

    $name = $_SESSION["userinfo"]["userinfo"]["emailid"];
    $q = "UPDATE STUDENTS SET cflag = 0 WHERE STANDARD='".$std."' and ".$sub."= '".$name."'";
    $stmt = $conn->prepare($q);
    $stmt->execute();

    $q = "UPDATE STUDENTS SET NOTP_".$sub."= NOTP_".$sub."+1 WHERE STANDARD='".$std."' and ".$sub."= '".$name."'";
    $stmt = $conn->prepare($q);
    $stmt->execute();
    
?>