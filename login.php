<?php 
session_start();
include('config.php');
	$error="";
	if(isset($_POST['login']))
	{
		$user=$_REQUEST['phone'];
		$pass=$_REQUEST['password'];
		$pass= sha1($pass);
		
		if(!empty($user) && !empty($pass))
		{
			$query = "SELECT * FROM user WHERE mobile='$user' AND password='$pass' and status=1";
			$result = mysqli_query($con,$query)or die(mysqli_error());
			$num_row = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
            $userid=$row['userid'];
			if( $num_row ==1 )
			{
				$_SESSION['user']=$userid;
				header("Location: user/profile.php");
			}
			else
			{
				echo "<script>alert('Invalid mobile or password!');</script>";
			}
		}
       
		
	}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Propel | Login</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/custom-auth.css" rel="stylesheet">
    <?php
include('gtag.php');
?>
</head>


<!-- page wrapper -->

<body>
    <?php
include('tagmanager.php');
?>
    <div class="boxed_wrapper">




        <?php $header_style = 'inner'; include('header.php'); ?>

        <!-- auth-section -->
        <section class="ragister-section auth-section centred sec-pad">
            <div class="auto-container">
                <div class="row clearfix justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="auth-card">
                            <div class="auth-header">
                                <h2 class="auth-title">Welcome back</h2>
                                <p class="auth-subtitle">Sign in to continue</p>
                            </div>

                            <form action="" method="post" class="default-form auth-form">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div class="auth-input">
                                        <span class="fi-icon fa fa-phone"></span>
                                        <input type="number"
                                               oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);"
                                               name="phone" required placeholder="Enter your mobile number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="auth-input">
                                        <span class="fi-icon fa fa-lock"></span>
                                        <input type="password" name="password" required placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group auth-submit message-btn">
                                    <button type="submit" class="theme-btn btn-one" name="login">Sign in</button>
                                </div>
                            </form>

                            <div class="auth-footer">
                                <p>Don’t have an account? <a href="signup.php">Register Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
     include('footer.php');
     ?>