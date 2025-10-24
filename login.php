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




        <!-- main header -->
        <header class="main-header">

            <div class="header-lower1">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.php"><img src="assets/images/logo.png" alt=""></a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="index.php"><span>Home</span></a></li>
                                        <li class=""><a href="buy-flats-apartments-properties-near-you.php"><span>Buy</span></a></li>
                                        <li><a href="rent-flats-apartments-properties-near-you.php"><span>Rent</span></a></li>
                                        <li class="dropdown"><a href="#"><span>Services</span></a>
                                            <ul>
                                                <li><a href="property-buying-assistance.php">Property Buying
                                                        Assistance</a></li>
                                                <li><a href="property-selling-assistance.php">Property Selling
                                                        Assistance</a></li>
                                                <li><a href="rental-leasing.php">Rental & Leasing</a></li>
                                                <li><a href="dsa.php">DSA</a></li>

                                            </ul>
                                        </li>

                                        <li><a href="blog.php"><span>News & Updates</span></a></li>
                                        <li><a href="contact.php"><span>Contact</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content clearfix">
                            <div class="sign-box">
                                <a href="login.php"><i class="fas fa-user"></i>Sign In</a>&nbsp; / &nbsp;
                                <a href="signup.php"><i class="fas fa-user"></i>Sign Up</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.php"><img src="assets/images/logo.png" alt=""></a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="sign-box">
                            <a href="login.php"><i class="fas fa-user"></i>&nbsp; Sign In</a>&nbsp; / &nbsp;
                            <a href="signup.php"><i class="fas fa-user"></i>&nbsp; Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <?php
    include('mobile-menu.php');
    ?>



        <!-- ragister-section -->
        <section class="ragister-section centred sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                        <div class="sec-title">

                            <h2>Sign In</h2>
                        </div>
                        <div class="tabs-box">

                            <div class="inner-box">
                                <h4>Sign in</h4>
                                <form action="" method="post" class="default-form">

                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="number"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);"
                                            name="phone" required="" placeholder="Enter your mobile number">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" required=""
                                            placeholder="Enter your password">
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one" name="login">Sign in</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                    <p>Do not have any account? <a href="signup.php">Register Now</a></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </section>

        <?php
     include('footer.php');
     ?>