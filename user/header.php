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
    <style>
    .profile-details {
        text-align: left;
    }

    .main-content {
        flex-grow: 1;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }




    .details-section {
        text-align: left;
    }

    .details-section .detail-row {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .details-section .detail-row span:first-child {
        font-weight: bold;
        font-size: 16px;
        color: #333;
        width: 40%;
        text-align: left;
        padding-right: 20px;
    }

    .details-section .detail-row span:last-child {
        font-size: 16px;
        color: #555;
        width: 60%;
        text-align: left;
    }

    /* Profile Image Styling */
    .profile-img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        margin: 20px 0;
        display: block;
    }

    .sidebar {
        background-color: #f0f4f8;
        padding: 20px;
        border-radius: 8px;
        width: 200px;
    }

    .sidebar h2 {
        font-size: 16px;
        margin-bottom: 20px;
        color: #7e57c2;
    }

    .sidebar a {
        text-decoration: none;
        color: #333;
        display: block;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        text-align: center;
    }

    .sidebar a:hover {
        background-color: #7e57c2;
        color: #fff;
    }

    .profile-content {
        flex: 1;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        margin-left: 20px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .profile-picture {
        width: 60px;
        height: 60px;
        background-color: #f1f3f5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #7e57c2;
        margin-right: 15px;
    }

    .profile-info h3 {
        margin-bottom: 5px;
    }

    .profile-completion {
        font-size: 14px;
        color: #555;
    }

    .profile-completion span {
        color: #7e57c2;
    }

    .profile-details {
        padding-top: 10px;
    }

    .profile-details h4 {
        border-bottom: 2px solid #f1f3f5;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .profile-details p {
        margin-bottom: 10px;
        font-size: 14px;
    }

    .verified {
        color: green;
        font-weight: bold;
    }

    .edit-profile {
        background-color: #7e57c2;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-profile:hover {
        background-color: #5e35b1;
    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }

        .container {
            flex-direction: column;
            padding: 10px;
        }

        .profile-content {
            margin-left: 0;
        }
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .details-section {
        flex: 1;
        padding: 20px;
        border-left: 1px solid #e0e0e0;
    }

    .detail-row span {
        color: #6a6a6a;
    }

    .container {
        display: flex;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        align-items: flex-start;
    }



    .main-content h3 {
        margin-bottom: 20px;
        font-size: 18px;
    }

    .tabs {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }

    .tab {
        padding: 10px 15px;
        font-size: 14px;
        color: #7e57c2;
        background-color: #f8f9fa;
        border: none;
        border-bottom: 2px solid transparent;
        cursor: pointer;
    }

    .tab.active {
        border-bottom: 2px solid #7e57c2;
        font-weight: bold;
    }

    .interaction-cards .card {
        display: flex;
        align-items: center;
        padding: 15px;
        border: 1px solid #f1f3f5;
        border-radius: 8px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
    }

    .icon {
        font-size: 30px;
        color: #7e57c2;
        margin-right: 15px;
    }

    .details p {
        margin: 0;
        font-size: 14px;
    }

    .rate-experience {
        margin-left: auto;
        padding: 8px 15px;
        font-size: 12px;
        color: #3cb371;
        background-color: #e6ffed;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }

        .container {
            flex-direction: column;
            padding: 10px;
        }

        .main-content {
            margin-left: 0;
        }
    }

    .edit-profile {
        position: absolute;
        top: -20px;
        right: 10px;
        text-decoration: none;
        color: #fff;
        font-size: 14px;
    }

    .cards {
        position: relative;
        /* Ensures positioning context for child elements */
        padding: 0px;
        /* Adjust as needed */
    }

    .myprofile-section h4 {
        position: relative;
        display: block;
        padding-left: 0;
        font-size: 20px;
        line-height: 30px;
        font-weight: 500;
        margin-bottom: 25px;
    }

    .hamburger {
        display: none;
        position: fixed;
        top: 15px;
        left: 15px;
        font-size: 30px;
        background-color: transparent;
        border: none;
        cursor: pointer;
        z-index: 1100;
    }

    .txtbox {
        position: relative;
        display: block;
        width: 100%;
        height: 50px;
        max-width: 100%;
        line-height: 50px;
        border: 1px solid #0172bb !important;
        font-size: 14px;
        color: #0172bb;
        font-weight: 400;
        background: transparent;
        border-radius: 5px;
        padding: 0px 20px;
    }

    .col-form-label {
        font-weight: bold;
    }
    </style>

</head>

<body>

    <div class="boxed_wrapper">

        <header class="main-header">

            <div class="header-lower1">
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

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="../index.php"><img src="../assets/images/logo.png" alt=""></a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="sign-box">
                            <a href="../logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?php
    include('mobile-menu.php');
    ?>