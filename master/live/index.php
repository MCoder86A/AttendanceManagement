<?php
    session_start();
    $isLogin = $_SESSION["userinfo"]["userinfo"]["isLog"];
    $sub = $_GET["sub"];
    $std = $_GET["std"];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style.css?v=1.0.2">
    <script src="./asset/script.js?v=1.0.4" type="module"></script>
    <title>Live_roll_call</title>
    <?php
        printf('
        <script>
            var sub = "%s";
            var std = "%s";
        </script>
        ', $sub, $std);

        require("../../db.php");

        $name = $_SESSION["userinfo"]["userinfo"]["emailid"];

        $q = "UPDATE STUDENTS SET NOTP_".$sub."= NOTP_".$sub."+1 WHERE STANDARD='".$std."' and ".$sub."= '".$name."'";
        $stmt = $conn->prepare($q);
        $stmt->execute();
    ?>

</head>

<body>

    <div class="head">
        <div class="logo"><img src="../../asset/image/fabicon.png"></div>
        <div class="brand">Regify</div>
    </div>
    <div class="req">
        <div class="name" id="name"></div>
        <div class="otpShow" id="otpShow"></div>
    </div>
    <div class="container">
        <div id="startLstn" class="startLstn">
            Listen
        </div>
    </div>
</body>

</html>