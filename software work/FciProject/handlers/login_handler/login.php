<?php
$error = ""; // store error message , initialize it here
session_start();
$con = mysqli_connect("localhost", "root", "", "project");
        if(isset($_POST['login_button'])) {

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

            $password = $_POST['password']; //Get password

        $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'"); //select queries form DB that mathches
        $check_login_query = mysqli_num_rows($check_database_query); // count the number of returned queries

        if($check_login_query == 1) { // if the number is more than one , then log him in
        $row = mysqli_fetch_array($check_database_query);
        $email = $row['email'];

        $_SESSION['email'] = $email; // store the email varibale into a SESSION
        header("Location: ../../mapview.php");//redirect to mapview page after login
        exit();
        }
        else {
        $error =  "Email or password was incorrect"; // display error message
        }


        }
?>
<html>
<head>
    <title>SMART POLE</title>
    <script>
function showHidePass() {
  var x = document.getElementById("userpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <style>
        .forstyle1 {
margin-right: 30px;            
        }  
        .forstyle2 {
margin-right: 20px;            
        }
    .icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 40px;
  text-align: center;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../../assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../../assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Login card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <div style="font-size: 22px;margin-bottom: 15px;"><?php  echo $error?></div>
                        <form class="md-float-material" action="login.php" method="post">
                            <div class="text-center">
                                <img class="img-fluid" src="../../assets/images/logo200.png" width="200px" height="60px;" alt="Logo">
                            </div>
                            <div class="auth-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center"><i class="icofont icofont-lock text-primary f-80"></i></h3>
                                    </div>
                                </div>
                                <p class="text-inverse b-b-default text-right">Back to login</p>
                                <div class="input-group">
                                    <i class="fa fa-user icon"></i>
                                    <input type="text" name="email" class="form-control forstyle1" placeholder="Your Email Address">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <i class="fa fa-key icon"></i>
                                    <input type="password" name="password" class="form-control forstyle2" placeholder="Your Password" id="userpass"><br><br>
                                    <input type="checkbox" onclick="showHidePass()">
                                </div>
                                    <?php
                    if(isset($count)&& $count==0 && $_SERVER["REQUEST_METHOD"]=="POST")
                    {
                        echo '<div class="text-left p-t-13 p-b-23">
						<span class="txt1">
							Email or Password is incorrect
						</span>
					</div>';
                    }
                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="login_button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="icofont icofont-lock"></i> Login to proceed</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Login and control .</p>
                                        <p class="text-inverse text-left"><b>YOUR FCI ZU TEAM</b></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Login card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    </body>
</html>
