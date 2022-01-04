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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Live_roll_call</title>
    <?php
        printf('<script>
            var sub = "%s";
        </script>', $sub);
    ?>
    <script src="./asset/script.js?v=1.0.2"></script>
    <link rel="stylesheet" href="./asset/style.css">
</head>

<body>
    <div class="head">
        <div class="logo"><img src="../../asset/image/fabicon.png"></div>
        <div class="brand">Regify</div>
    </div>
    <div class="container">
        <div onclick="rollClaim('<?php echo $sid ?>','<?php echo $std ?>','<?php echo $sub ?>')" class="claimBtn">
            Claim
        </div>
    </div>
    <input type="text" id="otp"></input>
    <div id="otpbtn">send</div>

<script>
    document.getElementById("otpbtn").addEventListener("click", otpSubmit, false);
</script>
</body>

</html>