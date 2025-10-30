<?php
include('config.php');
session_start();
$query1="select * from property where  isFeatured=1 and isapproved=1 limit 0,6";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query2="select * from property where  stype='Sell' and isapproved=1";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));

$query3="select * from property where  stype='Rent' and isapproved=1";
$result3=mysqli_query($con,$query3) or die(mysqli_error($con));

$query4="select * from property where  type='Apartment' and isapproved=1";
$result4=mysqli_query($con,$query4) or die(mysqli_error($con));

$query5="select * from property where  type='Villa' and isapproved=1";
$result5=mysqli_query($con,$query5) or die(mysqli_error($con));

$query6="select * from property where  type='House' and isapproved=1";
$result6=mysqli_query($con,$query6) or die(mysqli_error($con));

$query7="select * from property where  type='Land' and isapproved=1";
$result7=mysqli_query($con,$query7) or die(mysqli_error($con));

$query8="select * from property where  type='Duplex' and isapproved=1";
$result8=mysqli_query($con,$query8) or die(mysqli_error($con));

$query9="select * from blog limit 0,3";
$result9=mysqli_query($con,$query9) or die(mysqli_error($con));

$query10="select * from city";
$result10=mysqli_query($con,$query10) or die(mysqli_error($con));

$query11="select * from category";
$result11=mysqli_query($con,$query11) or die(mysqli_error($con));


$query12="select * from city";
$result12=mysqli_query($con,$query12) or die(mysqli_error($con));

$query13="select * from category";
$result13=mysqli_query($con,$query13) or die(mysqli_error($con));

$query14="select * from property  where  isapproved=1 order by pid desc limit 0,4";
$result14=mysqli_query($con,$query14) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Find Apartments for Sale & Rent I Explore Your New Home </title>
    <meta name="description" content="Discover the best options for apartments & rentals. Start your journey to a perfect to a perfect living space today.">
    <meta name="keyword" content="apartments for sale in bhubaneswar, apartments for rent in bhubaneswar, flats for sale in bhubaneswar, flats for rent in bhubaneswar and raipur, plots for lease in bhubaneswar">
    <link rel="canonical" href="https://propel.plus/" />
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
    <link href="assets/css/custom-home.css" rel="stylesheet">
    <?php
include('gtag.php');
?>
    <style>
    /* Style for the preloader container */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0172bb;

        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        /* Ensure it's on top */
    }

    #preloader image {
        height: 500px;
    }

    /* Hide the preloader once content loads */
    body.loaded #preloader {
        display: none;
    }
    </style>
    <script>
    // Wait for the page to fully load
    window.addEventListener('load', function() {
        // Set a delay to allow the GIF to complete one full cycle before hiding it
        setTimeout(function() {
            document.body.classList.add('loaded'); // Hide the preloader
            document.getElementById('content').style.display = 'block'; // Show the main content
        }, 4000); // Adjust this delay (in milliseconds) to the duration of your GIF cycle
    });
    </script>
    <link rel="canonical" href="https://propel.plus/" />
    
     


<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Propel - Experience Seamless Property Solution" />
<meta property="og:description" content="Find the perfect property with Propel Plus, your trusted partner in real estate. Explore a wide range of listings, expert advice, and market insights." />
<meta property="og:image" content="https://propel.plus/sitemanager/property/solitire-1.png" />
<meta property="og:url" content="https://propel.plus/" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Propel" />

 

<meta name="twitter:card" content="summary_large_image" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Propel Plus - Your Ultimate Real Estate Solution" />
<meta name="twitter:description" content="Find the perfect property with Propel Plus, your trusted partner in real estate. Explore a wide range of listings, expert advice, and market insights." />
<meta name="twitter:url" content="https://propel.plus/" />
</head>
<!-- page wrapper -->

<body>
    <?php include('tagmanager.php'); ?>
    <div class="boxed_wrapper">

        <!--
        <div id="preloader">
            <img src="assets/images/preloader.gif" alt="Loading...">
        </div>
         preloader end -->

        <?php include('header.php'); ?>

        <!-- banner-style-two -->
        <section class="banner-style-two centred" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 120px 0 80px;">
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="content-box text-left" style="padding-right: 30px;">
                            <h2 style="font-size: 48px; font-weight: 700; line-height: 1.2; color: #222; margin-bottom: 20px;">
                                Easy way to find<br>a perfect property
                            </h2>
                            <p style="font-size: 16px; color: #666; margin-bottom: 30px; line-height: 1.6;">
                                We provide a complete service for the sale, purchase or rental<br>
                                real estate. We have been operating since 10 years. Sales<br>
                                revenue of property has been increased to 85%.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="image-box">
                            <img src="assets/images/banner/banner-1.jpg" alt="Property" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-style-two end -->


        <!-- search-field-section -->
        <section class="search-field-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="search-field">
                        <form id="property-search-form" action="rent-flats-apartments-properties-near-you.php" method="post" class="search-form">
                            <div class="row clearfix align-items-end">
                                <div class="col-lg-2 col-md-6 col-sm-12 column">
                                    <div class="form-group">
                                        <label>Looking to</label>
                                        <div class="select-box">
                                            <i class="fas fa-exchange-alt"></i>
                                            <select class="wide" name="mode" id="search-mode">
                                                <option value="buy">Buy</option>
                                                <option value="rent" selected>Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 column">
                                    <div class="form-group">
                                        <label>Search Property</label>
                                        <div class="field-input">
                                            <i class="fas fa-search"></i>
                                            <input type="search" name="keyword" placeholder="Search by Property">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 column">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <div class="select-box">
                                            <i class="far fa-compass"></i>
                                            <!-- Visible City select populated via JS based on mode -->
                                            <select class="wide" name="city" id="city"></select>
                                            <!-- Templates for City options -->
                                            <select class="wide is-hidden template-select" id="tpl-city-buy">
                                                <option value="">City</option>
                                                <?php mysqli_data_seek($result10, 0); while($row10=mysqli_fetch_array($result10)) { ?>
                                                    <option><?php echo $row10['cname'];?></option>
                                                <?php } ?>
                                            </select>
                                            <select class="wide is-hidden template-select" id="tpl-city-rent">
                                                <option value="">City</option>
                                                <?php mysqli_data_seek($result12, 0); while($row12=mysqli_fetch_array($result12)) { ?>
                                                    <option><?php echo $row12['cname'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 column">
                                    <div class="form-group">
                                        <label>Property Type</label>
                                        <div class="select-box">
                                            <i class="far fa-building"></i>
                                            <!-- Visible Property Type select populated via JS based on mode -->
                                            <select class="wide" name="ptype" id="ptype"></select>
                                            <!-- Templates for Property Type options -->
                                            <select class="wide is-hidden template-select" id="tpl-ptype-buy">
                                                <option value="">Property Type</option>
                                                <?php mysqli_data_seek($result11, 0); while($row11=mysqli_fetch_array($result11)) { ?>
                                                    <option><?php echo $row11['cname'];?></option>
                                                <?php } ?>
                                            </select>
                                            <select class="wide is-hidden template-select" id="tpl-ptype-rent">
                                                <option value="">Property Type</option>
                                                <?php mysqli_data_seek($result13, 0); while($row13=mysqli_fetch_array($result13)) { ?>
                                                    <option><?php echo $row13['cname'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-12 col-sm-12 column">
                                    <div class="form-group">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- search-field-section end -->
        
    <!-- custom behavior for search mode -->
    <script src="assets/js/custom-home.js"></script>

        <!-- property-categories-section -->
        <section class="property-categories-section" style="padding: 60px 0; background: #fff;">
            <div class="auto-container">
                <div class="row clearfix justify-content-center">
                    <div class="col-lg-2 col-md-4 col-sm-6 category-block">
                        <a href="buy-flats-apartments-properties-near-you.php" style="text-decoration: none;">
                            <div class="category-item text-center" style="padding: 25px 15px; border-radius: 10px; transition: all 0.3s ease;">
                                <div class="icon-box" style="width: 70px; height: 70px; margin: 0 auto 15px; background: #fff3f4; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="icon-1" style="font-size: 32px; color: #ff5a5f;"></i>
                                </div>
                                <h6 style="font-size: 14px; font-weight: 600; color: #222; margin: 0;">Houses</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 category-block">
                        <a href="buy-flats-apartments-properties-near-you.php" style="text-decoration: none;">
                            <div class="category-item text-center" style="padding: 25px 15px; border-radius: 10px; transition: all 0.3s ease;">
                                <div class="icon-box" style="width: 70px; height: 70px; margin: 0 auto 15px; background: #fff3f4; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="icon-2" style="font-size: 32px; color: #ff5a5f;"></i>
                                </div>
                                <h6 style="font-size: 14px; font-weight: 600; color: #222; margin: 0;">Apartments</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 category-block">
                        <a href="buy-flats-apartments-properties-near-you.php" style="text-decoration: none;">
                            <div class="category-item text-center" style="padding: 25px 15px; border-radius: 10px; transition: all 0.3s ease;">
                                <div class="icon-box" style="width: 70px; height: 70px; margin: 0 auto 15px; background: #fff3f4; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="icon-3" style="font-size: 32px; color: #ff5a5f;"></i>
                                </div>
                                <h6 style="font-size: 14px; font-weight: 600; color: #222; margin: 0;">Commercial</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 category-block">
                        <a href="rent-flats-apartments-properties-near-you.php" style="text-decoration: none;">
                            <div class="category-item text-center" style="padding: 25px 15px; border-radius: 10px; transition: all 0.3s ease;">
                                <div class="icon-box" style="width: 70px; height: 70px; margin: 0 auto 15px; background: #fff3f4; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="icon-4" style="font-size: 32px; color: #ff5a5f;"></i>
                                </div>
                                <h6 style="font-size: 14px; font-weight: 600; color: #222; margin: 0;">Daily rental</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 category-block">
                        <a href="buy-flats-apartments-properties-near-you.php" style="text-decoration: none;">
                            <div class="category-item text-center" style="padding: 25px 15px; border-radius: 10px; transition: all 0.3s ease;">
                                <div class="icon-box" style="width: 70px; height: 70px; margin: 0 auto 15px; background: #fff3f4; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="icon-5" style="font-size: 32px; color: #ff5a5f;"></i>
                                </div>
                                <h6 style="font-size: 14px; font-weight: 600; color: #222; margin: 0;">New buildings</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 category-block">
                        <a href="buy-flats-apartments-properties-near-you.php" style="text-decoration: none;">
                            <div class="category-item text-center" style="padding: 25px 15px; border-radius: 10px; transition: all 0.3s ease;">
                                <div class="icon-box" style="width: 70px; height: 70px; margin: 0 auto 15px; background: #fff3f4; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-ellipsis-h" style="font-size: 32px; color: #ff5a5f;"></i>
                                </div>
                                <h6 style="font-size: 14px; font-weight: 600; color: #222; margin: 0;">More</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-categories-section end -->

        <!-- buy-sell-rent-section -->
        <section class="buy-sell-rent-section" style="padding: 80px 0; background: #f8f9fa;">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 action-block">
                        <div class="action-box text-center" style="background: #fff; padding: 50px 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%; transition: all 0.3s ease;">
                            <div class="icon-wrapper" style="width: 120px; height: 120px; margin: 0 auto 25px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: relative;">
                                <div style="width: 100px; height: 100px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                                    <i class="icon-24" style="font-size: 42px; color: #ff5a5f;"></i>
                                </div>
                                <span style="position: absolute; top: 10px; right: 10px; width: 30px; height: 30px; background: #ff5a5f; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-plus" style="font-size: 14px; color: #fff;"></i>
                                </span>
                            </div>
                            <h4 style="font-size: 22px; font-weight: 700; color: #222; margin-bottom: 15px;">Buy a property</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 25px;">
                                Let our experienced agent guide you through the buying process. Vast range of property options available.
                            </p>
                            <a href="buy-flats-apartments-properties-near-you.php" style="display: inline-block; padding: 12px 35px; background: #fff; border: 2px solid #ff5a5f; color: #ff5a5f; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">Find a home</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 action-block">
                        <div class="action-box text-center" style="background: #fff; padding: 50px 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%; transition: all 0.3s ease;">
                            <div class="icon-wrapper" style="width: 120px; height: 120px; margin: 0 auto 25px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: relative;">
                                <div style="width: 100px; height: 100px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                                    <i class="icon-25" style="font-size: 42px; color: #ff5a5f;"></i>
                                </div>
                                <span style="position: absolute; top: 10px; right: 10px; width: 30px; height: 30px; background: #4CAF50; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-dollar-sign" style="font-size: 14px; color: #fff;"></i>
                                </span>
                            </div>
                            <h4 style="font-size: 22px; font-weight: 700; color: #222; margin-bottom: 15px;">Sell a property</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 25px;">
                                Sell with joy! Let our seasoned agents help you set the right price and negotiate a good deal.
                            </p>
                            <a href="property-selling-assistance.php" style="display: inline-block; padding: 12px 35px; background: #fff; border: 2px solid #ff5a5f; color: #ff5a5f; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">Place an ad</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 action-block">
                        <div class="action-box text-center" style="background: #fff; padding: 50px 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%; transition: all 0.3s ease;">
                            <div class="icon-wrapper" style="width: 120px; height: 120px; margin: 0 auto 25px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: relative;">
                                <div style="width: 100px; height: 100px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                                    <i class="icon-26" style="font-size: 42px; color: #ff5a5f;"></i>
                                </div>
                                <span style="position: absolute; top: 10px; right: 10px; width: 30px; height: 30px; background: #2196F3; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-search" style="font-size: 14px; color: #fff;"></i>
                                </span>
                            </div>
                            <h4 style="font-size: 22px; font-weight: 700; color: #222; margin-bottom: 15px;">Rent a property</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 25px;">
                                You can rent your property and also explore endless rental options curated to match your lifestyle.
                            </p>
                            <a href="rent-flats-apartments-properties-near-you.php" style="display: inline-block; padding: 12px 35px; background: #fff; border: 2px solid #ff5a5f; color: #ff5a5f; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">Find a rental</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- buy-sell-rent-section end -->


        <!-- feature-style-two -->
        <section class="feature-style-two sec-pad" style="background: #fff; padding: 80px 0;">
            <div class="auto-container">
                <div class="sec-title" style="margin-bottom: 50px;">
                    <h5 style="color: #ff5a5f; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Top offers</h5>
                    <h2 style="font-size: 36px; font-weight: 700; color: #222;">Hot Off the Market: Explore Fresh Listings!</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                    <?php
                    mysqli_data_seek($result1, 0);
                    while($row1=mysqli_fetch_array($result1))
                    {
                        $propertyId = !empty($row1['slug']) ? $row1['slug'] : $row1['pid'];
                        ?>

                    <div class="feature-block-one">
                        <a href="property-details.php?id=<?php echo $propertyId;?>" style="text-decoration: none;">
                            <div class="inner-box" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); background: #fff; transition: all 0.3s ease;">
                                <div class="image-box" style="position: relative; overflow: hidden;">
                                    <figure class="image" style="margin: 0; overflow: hidden; height: 260px;">
                                        <img src="sitemanager/property/<?php echo $row1['pimage'];?>" alt="" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                    </figure>
                                    <div class="batch" style="position: absolute; top: 15px; left: 15px; background: #ff5a5f; color: #fff; padding: 6px 15px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                        <i class="icon-11"></i> Hot offer
                                    </div>
                                    <div class="price-tag" style="position: absolute; bottom: 15px; left: 15px; background: rgba(255,255,255,0.95); padding: 8px 18px; border-radius: 25px; font-weight: 700; color: #222;">
                                        Rs. <?php echo $row1['price'];?>
                                    </div>
                                </div>
                                <div class="lower-content" style="padding: 25px;">
                                    <div class="author-info clearfix" style="margin-bottom: 15px; display: flex; align-items: center; justify-content: space-between;">
                                        <div class="author" style="display: flex; align-items: center;">
                                            <figure class="author-thumb" style="width: 35px; height: 35px; border-radius: 50%; overflow: hidden; margin: 0 10px 0 0;">
                                                <img src="sitemanager/agent/<?php echo $row1['agentpic'];?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                            </figure>
                                            <h6 style="margin: 0; font-size: 13px; color: #666; font-weight: 500;"><?php echo $row1['agentname'];?></h6>
                                        </div>
                                        <div class="buy-btn">
                                            <span style="background: #e8f5e9; color: #4CAF50; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">For <?php echo $row1['stype'];?></span>
                                        </div>
                                    </div>
                                    <div class="title-text" style="margin-bottom: 15px;">
                                        <h4 style="font-size: 18px; font-weight: 700; color: #222; margin: 0; line-height: 1.4;">
                                            <?php echo $row1['title'];?>
                                        </h4>
                                    </div>
                                    <ul class="more-details clearfix" style="list-style: none; padding: 0; margin: 0; display: flex; gap: 15px;">
                                        <li style="font-size: 13px; color: #666; display: flex; align-items: center;">
                                            <i class="icon-14" style="margin-right: 5px; color: #ff5a5f;"></i><?php echo $row1['bedroom'];?> Beds
                                        </li>
                                        <li style="font-size: 13px; color: #666; display: flex; align-items: center;">
                                            <i class="icon-15" style="margin-right: 5px; color: #ff5a5f;"></i><?php echo $row1['bathroom'];?> Baths
                                        </li>
                                        <li style="font-size: 13px; color: #666; display: flex; align-items: center;">
                                            <i class="icon-16" style="margin-right: 5px; color: #ff5a5f;"></i><?php echo $row1['superbuiltuparea'];?> Sq Ft
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                   }
                   ?>
                </div>
            </div>
        </section>
        <!-- feature-style-two end -->

        <!-- cta-section -->
        <section class="cta-section alternate-2 centred"
            style="background-image: url(assets/images/background/cta-1.jpg);">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text">
                        <h2>Refer, Earn, Repeat – It’s That Simple! </h2>
                        <p style="color: #fff;">Turn Referrals into Rewards – Earn Cash Today!</p>
                    </div>
                    <div class="btn-box">
                        <a href="signup.php" class="theme-btn btn-three">Signup Now</a>

                    </div>
                </div>
            </div>
        </section>
        <!-- cta-section end -->

        <!-- funfact-section -->
        <section class="funfact-section centred">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="120">0</span>
                                    </div>
                                    <p>Total Professionals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="4350">0</span>
                                    </div>
                                    <p>Total Property Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="5540">0</span>
                                    </div>
                                    <p>Total Property Rent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="10270">0</span>
                                    </div>
                                    <p>Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->


        <!-- feature-style-three -->
        <section class="feature-style-three service-page centred">
            <div class="sec-title">
                <h5>Services</h5>
                <h2>Find. Buy. Sell. Rent. We Make Real Estate Simple!</h2>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-24"></i></div>
                                <h4>Property Buying Assistance</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-25"></i></div>
                                <h4>Property Selling Assistance</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-26"></i></div>
                                <h4>Rental & Leasing Services</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-25"></i></div>
                                <h4>Property Management</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-27"></i></div>
                                <h4>DSA Services</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-28"></i></div>
                                <h4>Rent Properties</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-29"></i></div>
                                <h4>Sale Properties</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-24"></i></div>
                                <h4>Loan Services</h4>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- feature-style-three end -->


        <!-- chooseus-section -->
        <section class="chooseus-section alternate-2 bg-color-1">
            <div class="auto-container">
                <div class="upper-box clearfix">
                    <div class="sec-title">
                        <h2>Why Choose Us?</h2>
                         
                    </div>
                    <!-- <div class="btn-box">
                        <a href="categories.html" class="theme-btn btn-one">All Categories</a>
                    </div> -->
                </div>
                <div class="lower-box">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-19"></i></div>
                                    <h4>Excellent Reputation</h4>
                                    <p>We’re known for our commitment to quality and reliability, consistently earning
                                        the trust of our clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h4>Best Local Agents</h4>
                                    <p>Our team of expert agents offers unmatched local insights, connecting you with
                                        properties that perfectly suit your needs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Personalized Service</h4>
                                    <p>We provide tailored support throughout your journey, ensuring a seamless,
                                        enjoyable experience from start to finish.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-section end -->


        <!-- deals-style-two -->
        <section class="deals-style-two sec-pad" style="background: #f8f9fa; padding: 80px 0;">
            <div class="auto-container">
                <div class="sec-title centred" style="margin-bottom: 50px;">
                    <h5 style="color: #ff5a5f; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Added today</h5>
                    <h2 style="font-size: 36px; font-weight: 700; color: #222;">Our Best Deals</h2>
                </div>
                <div class="deals-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                    <?php
                    mysqli_data_seek($result14, 0);
                    while($row14=mysqli_fetch_array($result14))
                    {
                        $propertyId14 = !empty($row14['slug']) ? $row14['slug'] : $row14['pid'];
                    ?>
                    <div class="single-item">
                        <a href="property-details.php?id=<?php echo $propertyId14;?>" style="text-decoration: none;">
                            <div class="deals-card" style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                                <div class="row clearfix" style="margin: 0;">
                                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block" style="padding: 0;">
                                        <div class="image-box" style="position: relative; height: 100%; min-height: 350px;">
                                            <figure class="image" style="margin: 0; height: 100%;">
                                                <img src="sitemanager/property/<?php echo $row14['pimage'];?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                            </figure>
                                            <div class="buy-btn" style="position: absolute; top: 20px; left: 20px;">
                                                <span style="background: rgba(255,255,255,0.95); color: #4CAF50; padding: 8px 20px; border-radius: 20px; font-size: 13px; font-weight: 600;">For <?php echo $row14['stype'];?></span>
                                            </div>
                                            <?php if($row14['stype'] == 'Sell'): ?>
                                            <div style="position: absolute; top: 20px; right: 20px; background: #ff5a5f; color: #fff; padding: 6px 15px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                                Featured
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block" style="padding: 0;">
                                        <div class="deals-block-one">
                                            <div class="inner-box" style="padding: 40px;">
                                                <div class="lower-content">
                                                    <div class="title-text" style="margin-bottom: 20px;">
                                                        <h4 style="font-size: 22px; font-weight: 700; color: #222; line-height: 1.4; margin: 0;">
                                                            <?php echo $row14['title'];?>
                                                        </h4>
                                                    </div>
                                                    <div class="price-box clearfix" style="margin-bottom: 20px;">
                                                        <div class="price-info pull-left">
                                                            <h6 style="font-size: 13px; color: #999; margin-bottom: 5px;">Start From</h6>
                                                            <h4 style="font-size: 28px; font-weight: 700; color: #ff5a5f; margin: 0;">Rs. <?php echo $row14['price'];?></h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb" style="text-align: center;">
                                                                <img src="sitemanager/agent/<?php echo $row14['agentpic'];?>" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-bottom: 5px;">
                                                                <span style="display: block; font-size: 12px; color: #666;"><?php echo $row14['agentname'];?></span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <ul class="more-details clearfix" style="list-style: none; padding: 0; margin: 0 0 25px 0; display: flex; gap: 20px; flex-wrap: wrap;">
                                                        <li style="font-size: 14px; color: #666; display: flex; align-items: center;">
                                                            <i class="icon-14" style="margin-right: 8px; color: #ff5a5f;"></i><?php echo $row14['bedroom'];?> Beds
                                                        </li>
                                                        <li style="font-size: 14px; color: #666; display: flex; align-items: center;">
                                                            <i class="icon-15" style="margin-right: 8px; color: #ff5a5f;"></i><?php echo $row14['bathroom'];?> Baths
                                                        </li>
                                                        <li style="font-size: 14px; color: #666; display: flex; align-items: center;">
                                                            <i class="icon-16" style="margin-right: 8px; color: #ff5a5f;"></i><?php echo $row14['superbuiltuparea'];?> Sq Ft
                                                        </li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box">
                                                            <button style="background: #ff5a5f; border: none; color: #fff; padding: 12px 35px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                                                                See Details
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                 }
                 ?>
                </div>
            </div>
        </section>
        <!-- deals-style-two end -->




        <!-- testimonial-style-four -->
        <section class="testimonial-style-four centred" style="background: #fff; padding: 80px 0;">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="sec-title" style="margin-bottom: 50px;">
                        <h5 style="color: #ff5a5f; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Top real estate agents</h5>
                        <h2 style="font-size: 36px; font-weight: 700; color: #222;">What They Say About Us</h2>
                        <p style="color: #666; font-size: 16px; margin-top: 15px;"> </p>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="agent-profile" style="background: #f8f9fa; border-radius: 15px; padding: 60px 40px; text-align: left; height: 100%;">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="agent-image" style="text-align: center;">
                                            <img src="assets/images/resource/testimonial-1.jpg" alt="Agent" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; border: 5px solid #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="agent-info" style="padding-left: 20px;">
                                            <h4 style="font-size: 24px; font-weight: 700; color: #222; margin-bottom: 15px;">Royal Miles</h4>
                                            <p style="font-size: 14px; color: #666; line-height: 1.8;">Real Estate Broker</p>
                                            <div class="rating" style="margin: 15px 0;">
                                                <i class="fas fa-star" style="color: #ffc107; font-size: 14px;"></i>
                                                <i class="fas fa-star" style="color: #ffc107; font-size: 14px;"></i>
                                                <i class="fas fa-star" style="color: #ffc107; font-size: 14px;"></i>
                                                <i class="fas fa-star" style="color: #ffc107; font-size: 14px;"></i>
                                                <i class="fas fa-star" style="color: #ffc107; font-size: 14px;"></i>
                                            </div>
                                            <div class="social-links" style="margin-top: 20px;">
                                                <a href="#" style="display: inline-block; width: 35px; height: 35px; background: #fff; border-radius: 50%; text-align: center; line-height: 35px; margin-right: 8px; color: #666; transition: all 0.3s ease;">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="#" style="display: inline-block; width: 35px; height: 35px; background: #fff; border-radius: 50%; text-align: center; line-height: 35px; margin-right: 8px; color: #666; transition: all 0.3s ease;">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="#" style="display: inline-block; width: 35px; height: 35px; background: #fff; border-radius: 50%; text-align: center; line-height: 35px; margin-right: 8px; color: #666; transition: all 0.3s ease;">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="testimonial-content" style="background: #fff; border-radius: 15px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); text-align: left; height: 100%; position: relative;">
                                <div class="quote-icon" style="position: absolute; top: 30px; right: 30px;">
                                    <i class="fas fa-quote-right" style="font-size: 60px; color: #ff5a5f; opacity: 0.1;"></i>
                                </div>
                                <h4 style="font-size: 20px; font-weight: 700; color: #222; margin-bottom: 20px; position: relative; z-index: 1;">"I will select the best accommodation for you"</h4>
                                <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 25px;">
                                    A sed lorem felis, pulvinar pharetra. At tempus, vel sed faucibus amet sit elementum sed erat. Id nunc blandit pharetra facilisis. Pulvinar lobortis, facilisis quis. Conse aliquam lectus risus et at vitae feugiat. Vulputate nulla iaculis amet non vulputate.
                                </p>
                                <div class="author-details" style="display: flex; align-items: center; padding-top: 20px; border-top: 1px solid #e5e5e5;">
                                    <h5 style="margin: 0; font-size: 16px; font-weight: 600; color: #222;">Royal Miles</h5>
                                    <span style="margin-left: auto; font-size: 13px; color: #999;">Real Estate Broker</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-carousel" style="margin-top: 50px;">
                        <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                            <div class="testimonial-block-three">
                                <div class="inner-box" style="background: #f8f9fa; padding: 35px 30px; border-radius: 15px; transition: all 0.3s ease;">
                                    <div class="icon-box" style="margin-bottom: 20px;"><i class="icon-18" style="font-size: 32px; color: #ff5a5f;"></i></div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 15px;">"A Trustworthy Experience!"</h4>
                                    <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 20px;">propel took the stress out of my property search. Their transparency and genuine
                                        support made me feel valued as a customer. I found the perfect rental property.</p>
                                    <h5 style="font-size: 15px; font-weight: 600; color: #222; margin: 0;">Rajesh Malhotra</h5>
                                </div>
                            </div>
                            <div class="testimonial-block-three">
                                <div class="inner-box" style="background: #f8f9fa; padding: 35px 30px; border-radius: 15px; transition: all 0.3s ease;">
                                    <div class="icon-box" style="margin-bottom: 20px;"><i class="icon-18" style="font-size: 32px; color: #ff5a5f;"></i></div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 15px;">"Smooth and Hassle-Free Process"</h4>
                                    <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 20px;">The platform is easy to use, and the local agents were very knowledgeable, helping me
                                        find a home that fits my budget and lifestyle perfectly.</p>
                                    <h5 style="font-size: 15px; font-weight: 600; color: #222; margin: 0;">Pooja Singh</h5>
                                </div>
                            </div>
                            <div class="testimonial-block-three">
                                <div class="inner-box" style="background: #f8f9fa; padding: 35px 30px; border-radius: 15px; transition: all 0.3s ease;">
                                    <div class="icon-box" style="margin-bottom: 20px;"><i class="icon-18" style="font-size: 32px; color: #ff5a5f;"></i></div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 15px;">"Exceeded My Expectations!"</h4>
                                    <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 20px;">propel has set a new standard for real estate portals. From clear listings to
                                        personalized support, I felt guided throughout the entire process.</p>
                                    <h5 style="font-size: 15px; font-weight: 600; color: #222; margin: 0;">Ankit Mohanty</h5>
                                </div>
                            </div>
                            <div class="testimonial-block-three">
                                <div class="inner-box" style="background: #f8f9fa; padding: 35px 30px; border-radius: 15px; transition: all 0.3s ease;">
                                    <div class="icon-box" style="margin-bottom: 20px;"><i class="icon-18" style="font-size: 32px; color: #ff5a5f;"></i></div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 15px;">"A Trustworthy Experience!"</h4>
                                    <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 20px;">propel took the stress out of my property search. Their transparency and genuine
                                        support made me feel valued as a customer. I found the perfect rental property.</p>
                                    <h5 style="font-size: 15px; font-weight: 600; color: #222; margin: 0;">Rajesh Malhotra</h5>
                                </div>
                            </div>
                            <div class="testimonial-block-three">
                                <div class="inner-box" style="background: #f8f9fa; padding: 35px 30px; border-radius: 15px; transition: all 0.3s ease;">
                                    <div class="icon-box" style="margin-bottom: 20px;"><i class="icon-18" style="font-size: 32px; color: #ff5a5f;"></i></div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 15px;">"Smooth and Hassle-Free Process"</h4>
                                    <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 20px;">The platform is easy to use, and the local agents were very knowledgeable, helping me
                                        find a home that fits my budget and lifestyle perfectly.</p>
                                    <h5 style="font-size: 15px; font-weight: 600; color: #222; margin: 0;">Pooja Singh</h5>
                                </div>
                            </div>
                            <div class="testimonial-block-three">
                                <div class="inner-box" style="background: #f8f9fa; padding: 35px 30px; border-radius: 15px; transition: all 0.3s ease;">
                                    <div class="icon-box" style="margin-bottom: 20px;"><i class="icon-18" style="font-size: 32px; color: #ff5a5f;"></i></div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: #222; margin-bottom: 15px;">"Exceeded My Expectations!"</h4>
                                    <p style="font-size: 14px; color: #666; line-height: 1.8; margin-bottom: 20px;">propel has set a new standard for real estate portals. From clear listings to
                                        personalized support, I felt guided throughout the entire process.</p>
                                    <h5 style="font-size: 15px; font-weight: 600; color: #222; margin: 0;">Ankit Mohanty</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-four end -->


        <!-- news-section -->
        <section class="news-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h5>News and Article</h5>
                    <h2>Stay Update With Propel</h2>

                </div>
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
                        <a href="blog-details.php?id=<?php echo $row9['pid'];?>">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a
                                                href="blog-details.php?id=<?php echo $row9['pid'];?>"><img
                                                    src="sitemanager/blog/<?php echo $row9['pimage'];?>" alt=""></a>
                                        </figure>
                                        <!-- <span class="category">Featured</span> -->
                                    </div>
                                    <div class="lower-content">
                                        <h4><a
                                                href="blog-details.php?id=<?php echo $row9['pid'];?>"><?php echo $row9['title'];?></a>
                                        </h4>
                                        <!-- <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="assets/images/news/author-1.jpg"
                                                    alt=""></figure>
                                            <h5><a href="blog-details.php?id=<?php echo $row9['pid'];?>">Admin</a></h5>
                                        </li>
                                        <li><?php echo $day;?>
                                            <?php echo $month;?>, <?php echo $year;?></li>
                                    </ul> -->
                                        <div class="text">
                                            <p><?php echo strlen($row9['pcontent']) > 20 ? substr($row9['pcontent'], 0, 20) . '...' : $row9['pcontent'];?>
                                            </p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="blog-details.php?id=<?php echo $row9['pid'];?>"
                                                class="theme-btn btn-two">See Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                   }
                   ?>
                </div>
            </div>
        </section>
        <!-- news-section end -->


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