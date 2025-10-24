<?php
include('config.php');
session_start();
$query1="select * from blog order by pid desc";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query9="select * from blog limit 0,9";
$result9=mysqli_query($con,$query9) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Propel</title>

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
        <header class="main-header">
            <!-- header-top -->

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

                                        <li class="current"><a href="blog.php"><span>News & Updates</span></a></li>
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
        <section class="page-title centred" style="background-image: url(assets/images/banner/banner-breadcrum.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Blog List</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Blog List</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- sidebar-page-container -->
        <section class="blog-list sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php
                    while($row9=mysqli_fetch_array($result9))
                    {
                        
     $datetime = $row9['date'];

     // Create a DateTime object from the datetime string
     $date = new DateTime($datetime);
     
     // Get the day from the DateTime object
     $day = $date->format('d');
     $month = $date->format('M');
     $year = $date->format('Y');
                        ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-two wow fadeInLeft animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box align-items-center">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-details.php?id=<?php echo $row9['pid'];?>"><img
                                                src="sitemanager/blog/<?php echo $row9['pimage'];?>" alt=""></a>
                                    </figure>

                                </div>
                                <div class="content-box">
                                    <h4><a
                                            href="blog-details.php?id=<?php echo $row9['pid'];?>"><?php echo $row9['title'];?></a>
                                    </h4>
                                    <ul class="post-info clearfix">
                                         
                                        <li><?php echo $day;?>
                                            <?php echo $month;?>, <?php echo $year;?></li>
                                    </ul>

                                    <div class="btn-box">
                                        <a href="blog-details.php?id=<?php echo $row9['pid'];?>"
                                            class="theme-btn btn-two">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
}
?>
                </div>

            </div>
        </section>


        <?php
include('footer.php');
?>