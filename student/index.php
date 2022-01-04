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
  <link rel="stylesheet" href="./asset/style.css?version=1.0.2">
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
              <a href="#" class="classroom">
                <div class="item">%s</div>
              </a>
              <div class="start_ico">
                <a href="./live/?std=%s&sub=%s"><img src="../asset/image/raiseh.png"></a>
              </div>
            </li>',
            $key,
            $_SESSION["userinfo"]["userinfo"]["standard"],
            $key
          );
        }

        ?>

      </ul>

    </div>
    <div class="col2">

    </div>
  </div>

</body>

</html>