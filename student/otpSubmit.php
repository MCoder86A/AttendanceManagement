<?php
    session_start();

    $out = array();

    $OTP = $_POST["OTP"];
    $SUB = $_POST["SUB"];

    $userinfo = $_SESSION["userinfo"]["userinfo"];
    $_emailID = $userinfo["emailid"];
    $username = $userinfo["username"];

    require_once("../vendor/autoload.php");
    use Kreait\Firebase\Factory;
    $factory = (new Factory())->withDatabaseUri('https://regify-67daa-default-rtdb.asia-southeast1.firebasedatabase.app');
    $database = $factory->createDatabase();

    $database = $database->getReference('users/');

    require("../db.php");

    $ssql =  $conn->prepare("SELECT OTP, TIME, cflag FROM STUDENTS WHERE EMAILID=?");
    $ssql->bind_param("s", $_emailID);

    $ssql->execute();

    $result = $ssql->get_result();
    $row = $result->fetch_assoc();

    if((gettimeofday()["sec"]-$row["TIME"])<120){
        if($OTP == $row["OTP"] && $row["cflag"]!=1){
            $out["STATUS"] =  "SUCCESS";

            $database->set([
                'name' => $username,
                'sid' => $_emailID,
                'status' => 'ACK',
            ]);
            
            $ssql =  $conn->prepare("SELECT NOTP_".$SUB.", NOP_".$SUB." FROM STUDENTS WHERE EMAILID=?");
            $ssql->bind_param("s", $_emailID);
            $ssql->execute();
            $result = $ssql->get_result();
            $row = $result->fetch_row();
            $NOTP = $row[0];
            $NOP = $row[1]+1;

            $ssql =  $conn->prepare("UPDATE STUDENTS SET cflag = 1, NOP_".$SUB."=?  WHERE EMAILID=?");
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
