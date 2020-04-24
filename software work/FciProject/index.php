<?php 
session_start();
if(!(isset($_SESSION['email'])))
{
    header('location:handlers/login_handler/login.php'); // redirect to main page
    exit();
}
?>
<html>
<head>
    <title>Smart Poles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>


<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php include "topnav.php" ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include"sidenav.php" ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-power-zone bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">power saved</span>
                                                        <h4>1241 kw</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>and ther's more
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-light-bulb bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Served pole</span>
                                                        <h4>5</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last year only
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Fixed issue</span>
                                                        <h4>450</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked by our devices
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-compass bg-c-blue card1-icon"></i>
                                                        <i class="icofont  card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600">streets served</span>
                                                        <h4>6</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>and ther's more
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- Statistics Start -->
                                            <div class="col-md-12 col-xl-8" style="margin: 0 auto;margin-top: 45px;">
                                                <!--- weather card start -->
                                            <div>
                                                <div>
                                                        <a class="weatherwidget-io" href="https://forecast7.com/ar/30d0431d24/cairo/" data-label_1="الطقس" data-label_2="الان" data-font="Droid Arabic Kufi" data-theme="original" data-basecolor="#303548" >الطقس الان</a>
                                                        <script>
                                                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                                                        </script>
                                                </div>
                                            </div>
                                            <!--- weather card End -->
                                            <!-- Project overview Start -->
                                            <!-- Project overview End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alarm"></div>
            <script type="text/javascript">
            function fetch_alarm() {
                xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET","alarm.php",false);
                xmlhttp.send(null);
                document.getElementById("alarm").innerHTML=xmlhttp.responseText;
            }
            fetch_alarm();
            setInterval(function(){
            fetch_alarm();},300000);
        </script>
    <script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="lib/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="lib/modernizr/js/modernizr.js"></script>

    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/demo-12.js"></script>
    <script type="text/javascript" src="assets/js/script.min.js"></script>
</body>

</html>
