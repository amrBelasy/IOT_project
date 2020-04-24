<?php
$message = "";
 $connection = mysqli_connect("localhost", "root","","project");
    if(isset($_POST['update_password_button']) and !empty($_POST['oldpassword'] ) and !empty($_POST['newpassword']) and !empty($_POST['newpassword_confirm'])){
    $oldpass=$_POST['oldpassword'];
     $newpassword=$_POST['newpassword'];
     $rnewpassword=$_POST['newpassword_confirm'];
     $query1="SELECT password FROM users where password='$oldpass' ";
     $query2="UPDATE users SET password= '$newpassword' where password = '$oldpass' ";
    $sql=mysqli_query($connection,$query1);
    $row=mysqli_fetch_array($sql);
    $oldpassdb = $row["password"];
    if($oldpass == $oldpassdb && $newpassword == $rnewpassword )
    {
        if($newpassword == $oldpassdb)
            $message =  "The new password can't be equal to the old ";
         else 
         {  
             $sql=mysqli_query($connection,$query2);
             $message =  "Password Updated Successfulyl";
         }
             }
                else
                {
                $message = "Old Password doesn't match ";
                }
}
 ?>

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
                    <?php include "sidenav.php" ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <div style="float: left;margin: 0 auto ; position: relative;font-size: 20px;color: #a5a5a5;"><?php echo $message;?></div>
                                            <div style="float: left;margin-left: 30%;margin-top: 5%;">
                                                <form action="update_password.php" method="POST">
                                                    <input class="update_password" id="update_password1" type="password" name="oldpassword" placeholder="The old password" required>
                                                    <input class="showhide" type="checkbox" onclick="showHidePass1()">
                                                    <input class="update_password" type="password" name="newpassword" id="update_password2" placeholder="The New password" required>
                                                     <input class="showhide" type="checkbox" onclick="showHidePass2()">
                                                    <input class="update_password" id="update_password3" type="password" name="newpassword_confirm" placeholder="The New password again " required>
                                                    <input class="showhide" type="checkbox" onclick="showHidePass3()">
                                                    <input type="submit" value="Upate Password Now" name="update_password_button" class="update_password_button">
                                                </form>
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

            <script>
             function showHidePass1() {
              var x = document.getElementById("update_password1");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            } 

            function showHidePass2() {
              var x = document.getElementById("update_password2");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }             

            function showHidePass3() {
              var x = document.getElementById("update_password3");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
             </script>

    <!-- Required Jquery -->
    <script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="lib/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="lib/modernizr/js/modernizr.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/demo-12.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.min.js"></script>
</body>
</html>