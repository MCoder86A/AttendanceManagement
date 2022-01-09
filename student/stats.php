<?php
    session_start();
    $userinfo = $_SESSION["userinfo"]["userinfo"];
    $isLogin = $userinfo["isLog"];
    $name = $userinfo["username"];
    $std = $userinfo["standard"];
    $sub = $_GET["sub"];
    $emailid = $userinfo["emailid"];


    require '../db.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://nulphary.sirv.com/Images/fabicon.png" type="image/png" sizes="16x16">
    <title>Regify-stats</title>
    <link rel="stylesheet" href="./stats.css?v=1.0.3">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <?php
        $q = "SELECT NOTP_".$sub.", NOP_".$sub." FROM STUDENTS WHERE EMAILID =?";
        $stmt = $conn->prepare($q);
        $stmt->bind_param("s", $emailid);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();

        $p_percent = ($row["NOP_".$sub]/$row["NOTP_".$sub])*100;
        printf('
        <script>
            var p = %s;
            var a = %s;
        </script>
        ', $p_percent, 100-$p_percent);
    ?>
    <div class="head">
        <div class="logo"><img src="https://nulphary.sirv.com/Images/fabicon.png"></div>
        <div class="brand">Regify</div>
    </div>
    <div class="intro">
        <div class="std"><?php echo $std ?></div>
        <div class="name"><?php echo $name ?></div>
        <div class="sub"><?php echo $sub ?></div>
    </div>
    <div class="chart">
        <div class="percentge">
            <canvas id="p_percentage"></canvas>
        </div>
    </div>

    <script src="./stats.js?v=1.0.1" type="module"></script>

</body>

</html>