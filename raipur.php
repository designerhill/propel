<?php
include('config.php');
session_start();
error_reporting(0);
$query2="select * from property where city='Raipur' and isapproved=1 limit 0,4";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));

$query1="select * from property where city='Raipur' and isapproved=1";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query10="select * from city";
$result10=mysqli_query($con,$query10) or die(mysqli_error($con));

$query11="select * from category";
$result11=mysqli_query($con,$query11) or die(mysqli_error($con));

$keyword='';
if (isset($_POST['submit'])) {
    $city = 'Raipur';
    $keyword = htmlspecialchars($_POST['keyword']);
    $ptype = $_POST['ptype'];
    $ftype = $_POST['ftype'];
    $posession = $_POST['posession'];
    $ownership = $_POST['ownership'];
    $posessionstatus=$_POST['posessionstatus'];
   
   
$query1 = "SELECT * FROM property WHERE 1=1 and isapproved=1";

// Add filters dynamically based on non-empty parameters
if ($city != '') {
    $query1 .= " AND city = '$city'";
}
if ($keyword != '') {
    $query1 .= " AND pcontent LIKE '%$keyword%'";
}
if ($ptype != '') {
    $query1 .= " AND type = '$ptype'";
}
// if ($stype != '') {
//     $query1 .= " AND stype = '$stype'";
// }
if ($ftype != '') {
    $query1 .= " AND ftype = '$ftype'";
}
if ($posession != '') {
    $query1 .= " AND posessiondate = '$posession'";
}
if ($ownership != '') {
    $query1 .= " AND ownership = '$ownership'";
}
if ($posessionstatus != '') {
    $query1 .= " AND posessionstatus = '$posessionstatus'";
}

// Execute the query
$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));


}
if (isset($_POST['reset'])) {
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to clear POST data
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Apartments in Raipur I Buy, Sell, or Rent Properties</title>
    <meta name="description"
        content="Explore top apartments in Raipur for sale and rent. Find your perfect property with experts guidance and easy to the best listing in the city.">


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
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Property List</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Property List</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-page-section -->
        <section class="property-page-section property-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Property</h5>
                                </div>
                                <div class="widget-content">
                                    <form action="" method="post">
                                        <div class="select-box">
                                            <select class="wide" name="city">
                                                <option value="">City</option>
                                                <?php
        while($row10 = mysqli_fetch_array($result10)) {
            $selected = (isset($_POST['city']) && $_POST['city'] == $row10['cname']) ? 'selected' : '';
            ?>
                                                <option value="<?php echo $row10['cname']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $row10['cname']; ?>
                                                </option>
                                                <?php
        }
        ?>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="ptype">
                                                <option value="">Property Type</option>
                                                <?php
        while($row11 = mysqli_fetch_array($result11)) {
            $selected = (isset($_POST['ptype']) && $_POST['ptype'] == $row11['cname']) ? 'selected' : '';
            ?>
                                                <option value="<?php echo $row11['cname']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $row11['cname']; ?>
                                                </option>
                                                <?php
        }
        ?>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="ftype">
                                                <option value="">Furnishing Type</option>
                                                <option value="Unfurnished"
                                                    <?php echo (isset($_POST['ftype']) && $_POST['ftype'] == 'Unfurnished') ? 'selected' : ''; ?>>
                                                    Unfurnished</option>
                                                <option value="Furnished"
                                                    <?php echo (isset($_POST['ftype']) && $_POST['ftype'] == 'Furnished') ? 'selected' : ''; ?>>
                                                    Furnished</option>
                                                <option value="Semi-Furnished"
                                                    <?php echo (isset($_POST['ftype']) && $_POST['ftype'] == 'Semi-Furnished') ? 'selected' : ''; ?>>
                                                    Semi-Furnished</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="posession">
                                                <option value="">Posession Year</option>
                                                <option value="2024"
                                                    <?php echo (isset($_POST['posession']) && $_POST['posession'] == '2024') ? 'selected' : ''; ?>>
                                                    2024</option>
                                                <option value="2025"
                                                    <?php echo (isset($_POST['posession']) && $_POST['posession'] == '2025') ? 'selected' : ''; ?>>
                                                    2025</option>
                                                <option value="2026"
                                                    <?php echo (isset($_POST['posession']) && $_POST['posession'] == '2026') ? 'selected' : ''; ?>>
                                                    2026</option>
                                                <option value="2027"
                                                    <?php echo (isset($_POST['posession']) && $_POST['posession'] == '2027') ? 'selected' : ''; ?>>
                                                    2027</option>
                                                <option value="2028"
                                                    <?php echo (isset($_POST['posession']) && $_POST['posession'] == '2028') ? 'selected' : ''; ?>>
                                                    2028</option>
                                                <option value="2029"
                                                    <?php echo (isset($_POST['posession']) && $_POST['posession'] == '2029') ? 'selected' : ''; ?>>
                                                    2029</option>

                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" style="display: none;" name="posessionstatus">
                                                <option value="">Posession Status</option>
                                                <option value="Ready To Move"
                                                    <?php echo (isset($_POST['posessionstatus']) && $_POST['posessionstatus'] == 'Ready To Move') ? 'selected' : ''; ?>>
                                                    Ready To Move</option>
                                                <option value="Under Construction"
                                                    <?php echo (isset($_POST['posessionstatus']) && $_POST['posessionstatus'] == 'Under Construction') ? 'selected' : ''; ?>>
                                                    Under Construction</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="ownership">
                                                <option value="">Ownership</option>
                                                <option value="Owner"
                                                    <?php echo (isset($_POST['ownership']) && $_POST['ownership'] == 'Owner') ? 'selected' : ''; ?>>
                                                    Owner</option>
                                                <option value="Agent"
                                                    <?php echo (isset($_POST['ownership']) && $_POST['ownership'] == 'Agent') ? 'selected' : ''; ?>>
                                                    Agent</option>
                                            </select>

                                        </div>
                                        <div class="select-box">
                                            <input type="text" style="  position: relative;
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
  padding: 0px 20px;" name="keyword" value="<?php echo $keyword;?>" placeholder="Keyword">


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <button type="submit" class="theme-btn btn-two"
                                                    name="reset">Clear</button>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <button type="submit" class="theme-btn btn-one"
                                                    name="submit">Search</button>
                                            </div>

                                        </div>
                                </div>
                                </form>
                            </div>



                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">

                            <div class="wrapper list">
                                <div class="deals-list-content list-item">

                                    <?php
                                    while($row1=mysqli_fetch_array($result1))
                                    {
                                        ?>
                                    <div class="deals-block-one">
                                        <a href="property-details.php?id=<?php echo $row1['slug'];?>">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img
                                                            src="sitemanager/property/<?php echo $row1['pimage'];?>"
                                                            alt="">
                                                    </figure>
                                                    <?php
                                                if($row1['isFeatured']==1)
                                                {
                                                    ?>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <?php
                                                }
                                                ?>
                                                    <!-- <span class="category">Featured</span> -->
                                                    <!-- <div class="buy-btn"><a
                                                        href="property-details.php?id=<?php echo $row1['slug'];?>">For
                                                        Buy</a></div> -->
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a
                                                                href="property-details.php?id=<?php echo $row1['slug'];?>"><?php echo $row1['title'];?>
                                                            </a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Starts From</h6>
                                                            <h4>Rs. <?php echo $row1['price'];?> </h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="sitemanager/agent/<?php echo $row1['agentpic'];?>"
                                                                    alt="">
                                                                <span><?php echo $row1['agentname'];?></span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p><?php echo strlen($row1['pcontent']) > 50 ? substr($row1['pcontent'], 0, 50) . '...' : $row1['pcontent'];?>
                                                    </p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i><?php echo $row1['bedroom'];?> Beds
                                                        </li>
                                                        <li><i class="icon-15"></i><?php echo $row1['bathroom'];?> Baths
                                                        </li>
                                                        <li><i
                                                                class="icon-16"></i><?php echo $row1['superbuiltuparea'];?>
                                                            Sq
                                                            Ft
                                                        </li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <!-- <div class="btn-box pull-left"><a
                                                                href="property-details.php?id=<?php echo $row1['slug'];?>"
                                                                class="theme-btn btn-two">See Details</a></div> -->
                                                        <!-- <ul class="other-option pull-right clearfix">
                                                        <li><a
                                                                href="property-details.php?id=<?php echo $row1['slug'];?>"><i
                                                                    class="icon-12"></i></a>
                                                        </li>
                                                        <li><a
                                                                href="property-details.php?id=<?php echo $row1['slug'];?>"><i
                                                                    class="icon-13"></i></a>
                                                        </li>
                                                    </ul> -->
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
                            <!-- <div class="pagination-wrapper">
                                <ul class="pagination clearfix">
                                    <li><a href="property-list.html" class="current">1</a></li>
                                    <li><a href="property-list.html">2</a></li>
                                    <li><a href="property-list.html">3</a></li>
                                    <li><a href="property-list.html"><i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- property-page-section end -->
        <!-- faq-page-section -->
        <section class="faq-page-section ">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="faq-content-side">
                            <div class="sec-title">
                                <h5>FAQ’S</h5>
                                <h2>Frequently Asked Questions.</h2>
                                <p> </p>
                            </div>
                            <ul class="accordion-box">
                                <li class="accordion block active-block">
                                    <div class="acc-btn active">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Find Your Ideal Home in Raipur</h5>
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content-box">
                                            <p> Raipur has become an exciting place for homebuyers and renters alike.
                                                Whether you're looking for a cozy apartment or a luxury home, we’ve got
                                                something for you. Our listings are trusted, and with our guidance,
                                                you’ll find the right place to suit your needs.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Why Raipur?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>Raipur is a fast-growing city with lots of potential. It’s got great
                                                infrastructure, business opportunities, and a friendly vibe that makes
                                                it an excellent place to settle down. The city’s modern amenities and
                                                family-friendly environment are perfect for anyone looking to enjoy a
                                                balanced lifestyle.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>What types of properties are available in Raipur?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>In Raipur, we offer everything from budget-friendly apartments to
                                                luxurious villas. Whatever your style and budget, you’ll find a home
                                                that’s right for you. </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Are there options for both renting and buying in Raipur?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>Yes! We provide both rental properties and homes for sale, catering to
                                                every need – whether you’re looking to rent temporarily or make a
                                                long-term investment.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>How do I get the best price for a property in Raipur?</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>We work closely with trusted sellers to ensure that you get the most
                                                competitive prices. If you find a better deal elsewhere, let us know,
                                                and we’ll do our best to beat it!</p>
                                        </div>
                                    </div>
                                </li>

                                <h4>Start your property search in Raipur today – we’ll help you find the perfect fit!
                                </h4>
                                <br></br>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="faq-sidebar">
                            <div class="question-inner">
                                <div class="sec-title">
                                    <h5>Submit Question</h5>
                                    <h3>Ask Your Valuable Questions</h3>
                                </div>
                                <div class="form-inner">
                                    <form action="faq.html" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Your message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-page-section end -->

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
                            <form method="post" class="subscribe-form">
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