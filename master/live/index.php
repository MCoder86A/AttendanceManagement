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
    <link rel="icon" href="https://nulphary.sirv.com/Images/fabicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="./asset/style.css?v=1.0.2">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Live_roll_call</title>
    <?php
        printf('
        <script>
        var sub = "%s";
        var std = "%s";
        </script>
        ', $sub, $std);
        
        
        ?>

</head>

<body>
    
    <div class="head">
        <div class="logo"><img src="https://nulphary.sirv.com/Images/fabicon.png"></div>
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

    <script src="./asset/script.js?v=1.0.5" type="module"></script>

</body>
</html>