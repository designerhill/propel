<?php
include('config.php');
session_start();
error_reporting(0);

$query1="select * from property where stype='Rent' and isapproved=1";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query10="select * from city";
$result10=mysqli_query($con,$query10) or die(mysqli_error($con));

$query11="select * from category";
$result11=mysqli_query($con,$query11) or die(mysqli_error($con));

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$ptype = isset($_POST['ptype']) ? $_POST['ptype'] : '';
$ftype = isset($_POST['ftype']) ? $_POST['ftype'] : '';
$posession = isset($_POST['posession']) ? $_POST['posession'] : '';
$ownership = isset($_POST['ownership']) ? $_POST['ownership'] : '';
$posessionstatus = isset($_POST['posessionstatus']) ? $_POST['posessionstatus'] : '';

// Initial data loading (optional, for the first page)
$query1 = "SELECT * FROM property WHERE stype='Rent' and isapproved = 1 LIMIT 0,10";
$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Rent Apartment I Explore Properties for Lease</title>
    <meta name="description"
        content="Find the perfect apartment for rent with our curated listings. Explore properties available for lease and secure your ideal living space effortlessly.">




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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php
include('gtag.php');
?>
</head>

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
                    <p class="mt-3" style="font-size:16px;">Searching for a flat? Explore the best rental options in
                        your city at prices you can trust.<br> Start exploring now and find your perfect place today.
                    </p>
                </div>
            </div>
        </section>
        <!--End Page Title-->

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
                                    <form action="" method="post" id="filterForm">
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
                                                <?php while ($row11 = mysqli_fetch_array($result11)) { ?>
                                                <option value="<?php echo $row11['cname']; ?>">
                                                    <?php echo $row11['cname']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="ftype">
                                                <option value="">Furnishing Type</option>
                                                <option value="Unfurnished">Unfurnished</option>
                                                <option value="Furnished">Furnished</option>
                                                <option value="Semi-Furnished">Semi-Furnished</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="posession">
                                                <option value="">Posession Year</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="posessionstatus">
                                                <option value="">Posession Status</option>
                                                <option value="Ready To Move">Ready To Move</option>
                                                <option value="Under Construction">Under Construction</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="ownership">
                                                <option value="">Ownership</option>
                                                <option value="Owner">Owner</option>
                                                <option value="Agent">Agent</option>
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
                                                <button type="reset" class="theme-btn btn-two"
                                                    id="clearFilter">Clear</button>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <button type="button" class="theme-btn btn-one"
                                                    id="searchButton">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="wrapper list">
                                <div class="deals-list-content list-item"></div>
                            </div>
                            <!-- Loading Indicator -->
                            <div id="loading" style="display: none;">Loading...</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
        let page = 1; // Initial page
        let isLoading = false;

        // Function to load properties via AJAX
        function loadProperties(reset = false) {
            if (isLoading) return;
            if (reset) {
                page = 1; // Reset page number
                $('.deals-list-content').empty(); // Clear existing data
            }

            isLoading = true;
            $('#loading').show();

            // Get filter values
            const formData = $('#filterForm').serialize() + `&page=${page}`;

            $.ajax({
                url: 'rent_more.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    const data = JSON.parse(response);

                    if (data.length > 0) {
                        data.forEach(item => {
                            const propertyHTML = `
                                <div class="deals-block-one">
                                    <a href="property-details.php?id=${item.slug || item.pid}" target="_blank">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="sitemanager/property/${item.pimage}" alt=""></figure>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title-text">
                                                    <h4><a href="property-details.php?id=${item.slug || item.pid}" target="_blank">${item.title}</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Starts From</h6>
                                                        <h4>Rs. ${item.price}</h4>
                                                    </div>
                                                     <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="sitemanager/agent/${item.agentpic || 'default-agent.png'}"
                                                                    alt="">
                                                                <span>${item.agentname || 'Agent'}</span>
                                                            </figure>
                                                        </div>
                                                </div>
                                                <p>${item.pcontent.substring(0, 50)}...</p>
                                                <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>${item.bedroom} Beds
                                                        </li>
                                                        <li><i class="icon-15"></i>${item.bathroom} Baths
                                                        </li>
                                                        <li><i class="icon-16"></i>${item.superbuiltuparea} Sq
                                                            Ft
                                                        </li>
                                                    </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>`;
                            $('.deals-list-content').append(propertyHTML);
                        });
                        page++; // Increment page number
                    } else if (page === 1) {
                        $('.deals-list-content').html('<p>No properties found.</p>');
                    }

                    isLoading = false;
                    $('#loading').hide();
                },
                error: function() {
                    alert('Error loading properties.');
                    isLoading = false;
                    $('#loading').hide();
                }
            });
        }

        // Load properties on page load
        $(document).ready(function() {
            loadProperties();

            // Handle search button click
            $('#searchButton').on('click', function() {
                loadProperties(true); // Reset results on new search
            });

            // Clear filters
            $('#clearFilter').on('click', function() {
                $('#filterForm')[0].reset(); // Reset the form to default values
                loadProperties(true); // Reload properties with default filters
            });
        });

        // Load more properties on scroll
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                loadProperties();
            }
        });
        </script>


        <?php include('footer.php'); ?>