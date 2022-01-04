<?php
    session_start();
    $sid = $_POST["sid"];
    $sub = $_POST["sub"];
    $std = $_POST["std"];
    $userinfo = $_SESSION["userinfo"]["userinfo"];
    require("../db.php");

    $ssql =  $conn->prepare("SELECT OTP, STANDARD FROM STUDENTS WHERE EMAILID = ? AND ".$sub." = ?");
    $ssql->bind_param("ss", $sid, $userinfo["emailid"]);
    $ssql->execute();
    $result = $ssql->get_result();
    $row = $result->fetch_assoc();

    $out = array();
    
    if(isset($row["OTP"])){
        $out["STATUS"] = "SUCCESS";
        $out["OTP"] = strval($row["OTP"]);
    }
    else{
        $out["STATUS"] = "FAIL";
    }
    print_r(json_encode($out));

?>