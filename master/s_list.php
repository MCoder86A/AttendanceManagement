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
  <title>Regify-Teacher dashboard</title>
  <link rel="stylesheet" href="./s_list.css?v=1.0.2">
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
  <!-- <div class="header">
      <div class="name">Name</div>
      <div class="roll">Roll</div>
      <div class="p_percent">Present(%)</div>
  </div> -->
  <div class="dash">
    <div class="col1">
      <table>
        <tr class="tableH">
          <th>Name</th>
          <th>Roll</th>
          <th style="width: 30%;">Present(%)</th>
        </tr>
        
        <?php
        require '../db.php';

        $name = $_SESSION["userinfo"]["userinfo"]["emailid"];

        $q = "SELECT NAME, ROLL, NOTP_".$sub.", NOP_".$sub." FROM STUDENTS WHERE STANDARD='".$std."' and ".$sub."= '".$name."'";
        $stmt = $conn->prepare($q);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
          if("NOTP_".$sub == 0){
            $p_percnt = 0;
          }
          else{
            $p_percnt = ("NOP_".$sub/"NOTP_".$sub)/100;
          }

          printf('<tr>
          <td>%s</td>
          <td>%s</td>
          <td>%s</td>
        </tr>', $row["NAME"], $row["ROLL"], $p_percnt);
        }

        ?>
      </table>


    </div>
    <div class="col2">

    </div>
  </div>

</body>

</html>