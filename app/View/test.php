<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="../src/css/style1.css"/>
    <link rel="stylesheet" href="../src/css/style2.css"/>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script><!--header scroll script-->
        $(document).ready(function () {
            var header = $('#nav');
            var offset = header.offset().top;
            var up = true;
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll >= offset) {
                    header.addClass('fixed-top');
                    if (up) {
                        up = false;
                        header.hide().slideDown();
                    }
                } else {
                    up = true;
                    header.removeClass('fixed-top');
                }
            });
        });


    </script><!--header scroll script-->

</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-3 d-none d-lg-block">
        </div>
        <div class="col-md-5 d-flex justify-content-center ">
            <img src="../src/img/logo.png" class="h100 p-2"/>
        </div>
        <div class="col-md-3">

            <div class="d-flex justify-content-end login">
                <a class=""><i class="material-icons p-left-5">touch_app</i>Register</a>

                <div class="separator"></div>
                <a class=""><i class="material-icons p-left-5">vpn_key</i>Log in</a>
            </div>
        </div>
    </div>

</div>

<div class="navbar justify-content-center bg-white" id="nav">

    <a class="active" href="javascript:void(0)">Home</a>
    <a href="javascript:void(0)">News</a>
    <a href="javascript:void(0)">Contact</a>

</div>