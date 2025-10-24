<?php

include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Contact Us I Apartment Sale and Rent Assistance</title>
    <meta name="description"
        content="Get expert assistance for apartment sales and rental. Reach out to us for inquiries, support, or guidance in finding your ideal property. We’re here to help.">



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

            <!-- header-lower -->
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
                                        <li><a href="buy-flats-apartments-properties-near-you.php"><span>Buy</span></a></li>
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
                                        <li class="current"><a href="contact.php"><span>Contact</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content clearfix">
                            <div class="sign-box">
                                <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                                <a href="user/profile.php"><i class="fas fa-user"></i>My Profile</a>
                                <?php
                    }
                    else
                    {
                        ?>
                                <a href="login.php"><i class="fas fa-user"></i>Sign In</a>&nbsp; / &nbsp;
                                <a href="signup.php"><i class="fas fa-user"></i>Sign Up</a>
                                <?php
                    }
                    ?>
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
                            <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                            <a href="user/profile.php"><i class="fas fa-user"></i>My Profile</a>
                            <?php
                    }
                    else
                    {
                        ?>
                            <a href="login.php"><i class="fas fa-user"></i>&nbsp; Sign In</a>&nbsp; / &nbsp;
                            <a href="signup.php"><i class="fas fa-user"></i>&nbsp; Sign Up</a>
                            <?php
                    }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php
       include('mobile-menu.php');
       ?>


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/banner/banner-breadcrum.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Contact Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                    <p class="mt-3" style="font-size:16px;">Looking to buy a home or need a rental far from your current
                        place? Contact us today to explore the best properties in your city. We’re here to help you find
                        your perfect home.</p>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-info-section -->
        <section class="contact-info-section sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Contact us</h5>
                    <h2>Get In Touch</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-32"></i></div>
                                <h4>Email Address</h4>
                                <p><a href="mailto:info@propel.plus">info@propel.plus</a><br>&nbsp;<br><br>&nbsp;<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-33"></i></div>
                                <h4>Phone Number</h4>
                                <p><a href="tel:+917969451150">7969451150</a><br>&nbsp;<br><br>&nbsp;<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-34"></i></div>
                                <h4>Office Address</h4>
                                <p>Plot No: 108/3607, 1st Floor Opposite Pal Heights Gate No. 3, Jaydev Vihar,
                                    Bhubaneswar, Odisha-751013
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-section end -->


        <!-- contact-section -->
        <section class="contact-section bg-color-1">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h5>Contact</h5>
                                <h2>Contact Us</h2>
                            </div>
                            <div class="form-inner">
                                <form method="post" action="sendemail.php" id="contact-form">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="username" placeholder="Your Name" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Email address" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="subject" placeholder="Subject" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn btn-one" type="submit" name="submit-form">Send
                                                Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="google-map-area">
                            <div class="google-map" id="contact-google-map" data-map-lat="40.712776"
                                data-map-lng="-74.005974" data-icon-path="assets/images/icons/map-marker.png"
                                data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12" data-markers='{
                                    "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                                }'>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- subscribe-section -->
        <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <span>Subscribe</span>
                            <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                        <div class="form-inner">
                            <form action="contact.html" method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter your email" required="">
                                    <button type="submit">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->

        <?php
include('footer.php');
?>