<?php
    session_start();

    $out = array();

    $OTP = $_POST["OTP"];
    $SUB = $_POST["SUB"];

    $userinfo = $_SESSION["userinfo"]["userinfo"];
    $_emailID = $userinfo["emailid"];

    require("../db.php");

    $ssql =  $conn->prepare("SELECT OTP, TIME FROM STUDENTS WHERE EMAILID=?");
    $ssql->bind_param("s", $_emailID);

    $ssql->execute();

    $result = $ssql->get_result();
    $row = $result->fetch_assoc();

    if((gettimeofday()["sec"]-$row["TIME"])<120){
        if($OTP == $row["OTP"]){
            $out["STATUS"] =  "SUCCESS";
            
            $ssql =  $conn->prepare("SELECT NOTP_".$SUB.", NOP_".$SUB." FROM STUDENTS WHERE EMAILID=?");
            $ssql->bind_param("s", $_emailID);
            $ssql->execute();
            $result = $ssql->get_result();
            $row = $result->fetch_row();
            $NOTP = $row[0];
            $NOP = $row[1]+1;

            $ssql =  $conn->prepare("UPDATE STUDENTS SET NOP_".$SUB."=?  WHERE EMAILID=?");
            $ssql->bind_param("is", $NOP, $_emailID);
            $ssql->execute();
        }
        else {
            $out["STATUS"] = "FAIL";
        }
    }
    else{
        $out["STATUS"] = "TIMEUP";
    }
    print_r(json_encode($out));
?>
