<?php
  session_start();
  $isLogin = $_SESSION["userinfo"]["userinfo"]["isLog"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://nulphary.sirv.com/Images/fabicon.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="./asset/style.css?version=1.0.3">
  <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
</head>

<body>
  <div class="bar"></div>
  <div class="head">
  <div class="col1">
      <div class="name">Hi! <?php if ($isLogin) {
                              print($_SESSION["userinfo"]["userinfo"]["username"]);
                            } ?></div>
    </div>
  </div>
  <div class="dash">
    <div class="col1">
      <ul>
        <?php
        require '../db.php';

        $stmt = $conn->prepare("SELECT DISTINCT SUB FROM SUBJECT");
        $stmt->execute();
        $res = $stmt->get_result();
        $_subject = $res->fetch_all();

        $_required_row = array();

        $name = $_SESSION["userinfo"]["userinfo"]["emailid"];
        $stmt = $conn->prepare("SELECT * from STUDENTS where EMAILID = " . " '$name'");
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        foreach ($_subject as $key) {
          if ($res[$key[0]] != null) {
            array_push($_required_row, $key[0]);
          }
        }


        foreach ($_required_row as $key) {
          printf(
            '<li>
              <a href="./stats.php?std=%s&sub=%s" class="classroom">
                <div class="item">%s</div>
              </a>
              <div class="start_ico">
                <a href="./live/?std=%s&sub=%s"><img src="https://nulphary.sirv.com/Images/raiseh.png"></a>
              </div>
            </li>',
            $_SESSION["userinfo"]["userinfo"]["standard"],
            $key,
            $key,
            $_SESSION["userinfo"]["userinfo"]["standard"],
            $key
          );
        }
        // <i style="font-size:1.5em;color: #14bddb;" class="fas fa-hand-paper"></i>
        
        ?>

      </ul>

    </div>
    <div class="col2">

    </div>
  </div>

</body>

</html>