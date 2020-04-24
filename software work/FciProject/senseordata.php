<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 0.1px solid #d9d9d9;
  text-align: left;
  float: left;
    padding-right: 30px;
    padding-left: 18px;
    padding-top: 15px;
    padding-bottom: 15px;
    width: 320px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<html>
<head>
    <title>Smart Pole</title>
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
                                            <div style="margin: 0 auto;">
                                            <?php
                                            $con = mysqli_connect("localhost" , "root" , "" , "project");
                                            $query = mysqli_query($con , "SELECT poles_number , temperature FROM poles_info" );
                                            echo '<table style="margin-top:30px;">
                                                      <tr style="background-color:#868e96;color:#fff;margin:15px;">
                                                        <th>Pole Number</th>
                                                        <th>temperature</th>
                                                      </tr>
                                                    </table> ';
                                            while ($row = mysqli_fetch_array($query))
                                                    {
                                                        $temperature = $row['temperature'];
                                                        $poles_number = $row['poles_number'];

                                             echo     "<table>".
                                                     " <tr>".
                                                        "<th>$poles_number</th>".
                                                        "<th>$temperature</th>".
                                                      "</tr>".
                                                    "</table> ";                                                  }        

                                             ?>

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
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <!-- modernizr js -->
    <script type="text/javascript" src="lib/modernizr/js/modernizr.js"></script>
    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/demo-12.js"></script>
    <script type="text/javascript" src="assets/js/script.min.js"></script>
</body>
</html>