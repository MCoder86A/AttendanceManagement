<?php

session_start();

$_emailID = $_POST["userID"];
$_pwd = $_POST["pwd"];
require("../../db.php");
if (isset($_POST["userID"]) && isset($_POST["pwd"])) {

    $status = array();

    $ssql =  $conn->prepare("SELECT TEACHERID, PWD, NAME FROM TEACHER WHERE TEACHERID=? AND PWD=?");
    $ssql->bind_param("ss", $_emailID, $_pwd);

    $ssql->execute();

    $result = $ssql->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $username = filter_var($row["NAME"], FILTER_SANITIZE_STRING);
        $emailid = filter_var($row["TEACHERID"], FILTER_SANITIZE_STRING);

        $userinfo = ["userinfo" => [
            "isLog" => true,
            "username" => $username,
            "emailid" => $emailid,
            "whoAmI" => "master",
        ]];
        
        $_SESSION["userinfo"] = $userinfo;
        $status["status"] = "success";
        print_r(json_encode($status));
        // echo '<script>setTimeout(()=>{window.location = "../"},1000);</script>';
        // echo $sTag;
    } else {
        $status["status"] = "fail";
        print_r(json_encode($status));
    }
}
