<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-3 d-none d-lg-block">
        </div>
        <div class="col-md-5 d-flex justify-content-center ">
            <img src="../src/img/logo.png" class="h100 p-2"/>
        </div>
        <div class="col-md-3">

         <div class="d-flex justify-content-end login">
             <?php
             if(empty($data['user'])){
                 echo "<a href=\"/User/register\"><i class=\"material-icons p-left-5\">touch_app</i>Register</a>";
                 echo "<div class=\"separator\"></div>";
                 echo "<a href=\"/User/login\"><i class=\"material-icons p-left-5\">vpn_key</i>Log in</a>";
             }else{
                 echo "Hi,  ". $data['user']. ".  "." <a href=\"/Account/logout\">&nbsp Logout <i class=\"material-icons p-left-5\">close</i></a>";

             }

             ?>


            </div>



        </div>
    </div>
</div>

<nav class="navbar navbar-expand navbar-dark bg-dark" id="nav">

    <div class="collapse navbar-collapse justify-content-center" >
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li>
        </ul>
    </div>
</nav>



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

