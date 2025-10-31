<?php
session_start();
include('../config.php');
if (!isset($_SESSION['user'])) {
    // Redirect to login page if session is not set
    header("Location: ../login.php");
    exit();
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>Propel</title>

        <!-- Fav Icon -->
        <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">

        <!-- Google Fonts -->
        <link
                href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
                rel="stylesheet">

        <!-- Stylesheets -->
        <link href="../assets/css/font-awesome-all.css" rel="stylesheet">
        <link href="../assets/css/flaticon.css" rel="stylesheet">
        <link href="../assets/css/owl.css" rel="stylesheet">
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/jquery.fancybox.min.css" rel="stylesheet">
        <link href="../assets/css/animate.css" rel="stylesheet">
        <link href="../assets/css/jquery-ui.css" rel="stylesheet">
        <link href="../assets/css/nice-select.css" rel="stylesheet">
        <link href="../assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
        <link href="../assets/css/switcher-style.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link href="../assets/css/responsive.css" rel="stylesheet">
        <link href="../assets/css/custom-user.css" rel="stylesheet">


        <script src="https://unpkg.com/feather-icons"></script>

    </head>

    <body>
    
    

    <div class="boxed_wrapper">

        <header class="main-header">

            <div class="container">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="../index.php"><img src="../assets/images/logo.png" alt=""></a>
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
                                        <li><a href="../index.php"><span>Home</span></a></li>
                                        <li><a href="../buy-flats-apartments-properties-near-you.php"><span>Buy</span></a></li>
                                        <li><a href="../rent-flats-apartments-properties-near-you.php"><span>Rent</span></a></li>
                                        <li class="dropdown"><a href="#"><span>Services</span></a>
                                            <ul>
                                                <li><a href="../property-buying-assistance.php">Property Buying
                                                        Assistance</a></li>
                                                <li><a href="../property-selling-assistance.php">Property Selling
                                                        Assistance</a></li>
                                                <li><a href="../rental-leasing.php">Rental & Leasing</a></li>
                                                <li><a href="../dsa.php">DSA</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="../blog.php"><span>Refer & Earn</span></a></li>
                                        <li><a href="../blog.php"><span>News & Updates</span></a></li>
                                        <li><a href="../contact.php"><span>Contact</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content clearfix">
                            <div class="sign-box">
                                <a href="../logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </header>

<?php include('mobile-menu.php'); ?>