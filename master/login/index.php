<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regify - registering childrens daily pressence</title>
        <link rel="icon" href="../../asset/image/fabicon.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="../../asset/style/index.css?version=0.00001">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
        <script src="../../asset/js/myanime.js"></script>
        <script src="./js/index.js"></script>

</head>

<body>
    <!-- <video id="cam"></video> -->
    <div class="section_a">
        <div class="row">
            <div class="container">
                <div class="textBox">
                    <div class="c_name"><a href="../../">Regify</a></div>
                    <div class="intro">WE DELIVER ROBUST TECHNICAL
                        SOLUTION TO EMPOWER GROWTH AND EFFICIENT MANAGEMENT
                    </div>
                </div>
            </div>
            <div class="container_b" id="container_b_id">
                <div class="master_img">
                    <form action="#" name="loginForm" class="teacherform" onsubmit="return onSub()">
                        <div class="input">
                            <input type="text" name="userID" placeholder="Email">
                        </div>
                        <div class="input">
                            <input type="password" name="pwd" placeholder="Password">
                        </div>
                        <div class="input login">
                            <input type="submit" value="Login" onmouseover="loginHover(this)" onmouseout="loginUnHover(this)">
                        </div>
                        <div class="refer_user">
                            Are you a Student? &nbsp<a href="../../student/login">click here</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

<!--  -->

</html>
