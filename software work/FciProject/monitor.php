<!DOCTYPE html >
<html>
<head>
    <title>SMART POLE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <!-- Range slider CSS-->
    <link rel="stylesheet" type="text/css" href="lib/seiyria-bootstrap-slider/css/bootstrap-slider.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/menu-search/css/component.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
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
                    <?php include "sidenav.php" ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!---- include control page goes here -->
                                            <div style="margin: 0 auto;">
                                            <?php include "monitor_data_with_ajax.php"?>
                                            </div>
                                        </div>
                                    </div>
                                    <!---- include control page ends -->
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
            fetch_alarm();},4000);
        </script>

    <!-- Required Jquery -->
    <script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <!-- modernizr js -->
    <!-- Custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/demo-12.js"></script>
    <script type="text/javascript" src="assets/js/script.min.js"></script>
</body>
</html>