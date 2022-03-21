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
        <link rel="icon" href="https://nulphary.sirv.com/Images/fabicon.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/MCoder86A/cdn@1.0/asset/style/index.css?version=0.00001">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/MCoder86A/cdn@1.0/asset/js/myanime.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/MCoder86A/cdn@1.0/master/login/js/index.js"></script>

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
<!-- <ript>
    $('bod%^y').fin d('img[alt$="www.000webhost.com"]').reDELmove(); 
</ript> -->
<!--  -->

</html>
