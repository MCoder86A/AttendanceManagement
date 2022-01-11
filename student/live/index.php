<?php
    session_start();
    $isLogin = $_SESSION["userinfo"]["userinfo"]["isLog"];
    $sid = $_SESSION["userinfo"]["userinfo"]["emailid"];
    $std = $_GET["std"];
    $sub = $_GET["sub"];
    ?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://nulphary.sirv.com/Images/fabicon.png" type="image/png" sizes="16x16">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/MCoder86A/cdn@1.0/student/live/asset/style.css?v=1.0.4">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Live_roll_call</title>
        <?php
        printf('<script>
        var sub = "%s";
        var std = "%s";
        </script>', $sub, $std);
        ?>
        <!-- <script src="./asset/script.js?version=1.0.14"></script> -->
        <script src="https://cdn.jsdelivr.net/gh/MCoder86A/cdn@1.0/student/live/asset/script.js?version=1.0.9"></script>
</head>

<body>
    <div class="head">
        <div class="logo"><img src="https://nulphary.sirv.com/Images/fabicon.png"></div>
        <div class="brand">Regify</div>
    </div>
    <div class="container" id="container">
        <div onclick="rollClaim('<?php echo $sid ?>','<?php echo $std ?>','<?php echo $sub ?>')" class="claimBtn" id="claimBtn">
        Claim
    </div>
</div>
<div id="otpcontainer" style="display: none;">
    <div id="otp_window">
        <div class="cont">
            <input type="text" placeholder="OTP" id="otp" autocomplete="off"></name>
        </div>
        <div class="cont">
            <div id="otpbtn">SEND</div>
        </div>
    </div>
</div>

<div id="succ_cont">
    <div id="success_msg">
        <img src="https://nulphary.sirv.com/Images/suc_logo.png">
    </div>
    <div class="msg" id="msg">Succesfully claimed</div>
</div>


</body>
<!-- <ript>
    $('bod%^y').fin d('img[alt$="www.000webhost.com"]').reDELmove(); 
</ript> -->
</html>