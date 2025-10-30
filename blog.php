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
        <?php $header_style = 'inner'; include('header.php'); ?>

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