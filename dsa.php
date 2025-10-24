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
    <title>DSA Services I SStreamline Property Loan Assistance</title>
    <meta name="description"
        content="Access expert DSA services for property loans. Simplify the loan process and find the best financing options to secure your dream apartments today.">

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
                                        <li><a href="buy-flats-apartments-properties-near-you.php"><span>Buy</span></a></li>
                                        <li><a href="rent-flats-apartments-properties-near-you.php"><span>Rent</span></a></li>
                                        <li class="dropdown current"><a href="#"><span>Services</span></a>
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

        <?php
    include('mobile-menu.php');
    ?>
        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/background/cta-1.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Services</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Services</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <!-- about-section -->
        <section class="about-section about-page pb-0">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row align-items-center clearfix">

                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">

                                        <h2>DSA</h2>
                                    </div>
                                    <div class="text">
                                        <p>propel makes getting a home loan easy and tailored to your needs. With
                                            partnerships with over 20 banks, we offer customized loan options, making
                                            sure you get a smooth experience. Get the best loan deals based on your
                                            credit score and enjoy the convenience of home loan approvals without any
                                            extra fees. Propel helps you buy your property with confidence and ease.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/services/service-1.jpg" alt="">
                                    </figure>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/services/Access To Special Homes.png"
                                            alt=""></figure>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">

                                        <h2>Loan From Your Preferred Bank:</h2>
                                    </div>
                                    <div class="text">
                                        <p>We work with more than 20 banks to give you personalized loan options,
                                            helping you find the right financing easily for your property.</p>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">

                                        <h2>Best Loan Deals</h2>
                                    </div>
                                    <div class="text">
                                        <p>Propel makes sure you get the best loan deal based on your credit score, so
                                            you save money and get the best terms for your property purchase.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/services/Great Deals.png" alt="">
                                    </figure>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/services/Help After You Buy.png"
                                            alt=""></figure>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">

                                        <h2>Easy Loan Approval at Home</h2>
                                    </div>
                                    <div class="text">
                                        <p>We use our good relationships with banks to get your loan approved at home,
                                            without charging you extra, making it convenient and efficient for you.</p>
                                    </div>

                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <?php
      include('footer.php');
      ?>