<?php
    session_start();

    $sid = $_POST["sid"];
    $std = $_POST["std"];
    $sub = $_POST["sub"];
    $status = $_POST["status"];
    $time = gettimeofday();
    $userinfo = $_SESSION["userinfo"]["userinfo"];
    $username = $userinfo["username"];
    
    $jsonObj = array("status"=>"");

    require("../db.php");

    require_once("../vendor/autoload.php");
    use Kreait\Firebase\Factory;
    $factory = (new Factory())->withDatabaseUri('https://regify-67daa-default-rtdb.asia-southeast1.firebasedatabase.app');
    $database = $factory->createDatabase();

    $database = $database->getReference('users/');
    $res = $database->getValue();

    require("../db.php");
        
    $name = $_SESSION["userinfo"]["userinfo"]["emailid"];
    
    $q = "SELECT cflag from STUDENTS where EMAILID = '".$sid."'";
    $stmt = $conn->prepare($q);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $isAlreadyClaim = $row["cflag"];

    if(gettimeofday()["sec"]-$res["time"]<10&&$res["sid"]==$sid){
        $jsonObj["status"] = "TOOFREQ";
    }
    else if($isAlreadyClaim){
        $jsonObj["status"] = "ACLAIMED";
    }
    else{
        $otp = strval(random_int(1000,9999));
        $_SESSION["otp"] = $otp;
        
        $ssql =  $conn->prepare("UPDATE STUDENTS SET OTP = ?, TIME = ? WHERE EMAILID = ?");
        $ssql->bind_param("iis", $otp, $time["sec"], $sid);
        $ssql->execute();
        
        $jsonObj["status"] = "SUCCESS";

        $database->set([
            'name' => $username,
            'sid' => $sid,
            'std' => $std,
            'sub' => $sub,
            'status' => $status,
            'time' => $time["sec"],
           ]);
    }
    print_r(json_encode($jsonObj));
    
?>
