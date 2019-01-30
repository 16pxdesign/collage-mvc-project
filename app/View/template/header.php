<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>School Name</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/parallax.js-1.5.0/parallax.min.js"></script>
</head>

<body>
<header class="header">
    <div class="header-box">
        <div class="logo">
            <img src="../src/img/logo2.png">
        </div>
        <div class="menu-box">
            <div class="login-panel">
                <?php
                    if($data['session_user'] != false){
                        echo "<p>Hi, " . $data['session_user'] . "</p>, <p><a href='' class='noDecoration'>My Account</a> </p> | <p>( <a href='../Index/logout' class='noDecoration'>Logout</a> ) </p>";
                    }else{
                        echo "  <p><a href='../Index/set' class='noDecoration'>LOGIN</a> </p> | <p>REGISTER</p> ";
                    }
                ?>


            </div>
            <div class="menu">
                <ul>
                    <?php
                    if(isset($data['menu'])){
                        foreach ($data['menu'] as $item){
                            echo '<li><a href="'.$item['link'].'">'. $item['name'] .'</a></li>';
                        }

                    }
                    ?>

                </ul>
            </div>

        </div>
    </div>
</header>
