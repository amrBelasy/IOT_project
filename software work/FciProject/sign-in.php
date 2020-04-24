		<?php  
		
		if(isset($_POST['login_button'])) {

		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

		//$_SESSION['email'] = $email; //Store email into session variable 
		$password = $_POST['password']; //Get password

		$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		$check_login_query = mysqli_num_rows($check_database_query);

		if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$email = $row['email'];

		$_SESSION['email'] = $email;
		header("Location: indexx.php");
		exit();
		}
		else {
		echo "Email or password was incorrect";
		}


		}

		?>

		<html>
    <body>
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Login card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="index.php" method="post">
                            <div class="text-center">
                                <img class="img-fluid" src="assets/images/logo200.png" width="200px" height="60px;" alt="Theme-Logo">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="login_button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="icofont icofont-lock"></i> Login to proceed
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