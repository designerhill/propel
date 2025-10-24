<?php
include('config.php');
$query1="select * from property and isapproved=1";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query2="select * from property and isapproved=1 limit 0,4";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));


$keyword='';
if(isset($_POST['submit']))
{
    $city = $_POST['city'];
    $keyword = htmlspecialchars($_POST['keyword']);
    $stype = $_POST['stype'];
    $ptype = $_POST['ptype'];
   
    
    if($keyword=='' && $ptype=='' && $stype=='' && $city=='')
    {
        $query1="select * from property ";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else
    if($keyword=='' && $ptype=='' && $stype=='' && $city!='')
    {
        $query1="select * from property where city='$city'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else
    if($keyword=='' && $ptype=='' && $stype!='' && $city=='')
    {
        $query1="select * from property where stype='$stype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else
    if($keyword=='' && $ptype=='' && $stype!='' && $city!='')
    {
        $query1="select * from property where city='$city' and stype='$stype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else
    if($keyword=='' && $ptype!='' && $stype=='' && $city=='')
    {
        $query1="select * from property where type='$ptype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
     else
if($keyword=='' && $ptype!='' && $stype=='' && $city!='')
{
    $query1="select * from property where city='$city' and type='$ptype'";
    $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
 }
else 
 if($keyword=='' && $ptype!='' && $stype!='' && $city=='')
 {
     $query1="select * from property where type='$ptype' and stype='$stype'";
     $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
  }
else 
  if($keyword=='' && $ptype!='' && $stype!='' && $city!='')
  {
      $query1="select * from property where city='$city' and type='$ptype' and stype='$stype'";
      $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
   }
else
   if($keyword!='' && $ptype=='' && $stype=='' && $city=='')
   {
       $query1="select * from property where pcontent like '%$keyword%'";
       $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
    }
else
    if($keyword!='' && $ptype=='' && $stype=='' && $city!='')
    {
        $query1="select * from property where city='$city' and  pcontent like '%$keyword%'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else
    if($keyword!='' && $ptype=='' && $stype!='' && $city=='')
    {
        $query1="select * from property where pcontent like '%$keyword%' and stype='$stype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else    
    if($keyword!='' && $ptype=='' && $stype!='' && $city!='')
    {
        $query1="select * from property where city='$city' and pcontent like '%$keyword%' and stype='$stype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else 
     if($keyword!='' && $ptype!='' && $stype=='' && $city=='')
     {
         $query1="select * from property where pcontent like '%$keyword%' and type='$ptype'";
         $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
      }
else      
    if($keyword!='' && $ptype!='' && $stype=='' && $city!='')
    {
        $query1="select * from property where city='$city' and pcontent like '%$keyword%' and type='$ptype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else   
    if($keyword!='' && $ptype!='' && $stype!='' && $city=='')
    {
        $query1="select * from property where pcontent like '%$keyword%' and type='$ptype' and stype='$stype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }
else   
    if($keyword!='' && $ptype!='' && $stype!='' && $city!='')
    {
        $query1="select * from property where city='$city' and pcontent like '%$keyword%' and type='$ptype' and stype='$stype'";
        $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
     }


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
    <link rel="icon" href="assets/images/icons/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/global.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/swiper.min.css" rel="stylesheet">
    <link href="assets/css/timePicker.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>
    <div class="boxed_wrapper">

        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader home-1">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="p" class="letters-loading">
                                p
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="p" class="letters-loading">
                                p
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
       include('header1.php');
       ?>

        <!-- page-title -->
        <section class="page__title p_relative">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 20}'
                style="background-image:url(assets/images/resource/page-title.png)">
            </div>
            <div class="container">
                <div class="content-box p_relative">
                    <h1 class="title">All Properties</h1>
                    <ul class="bread-crumb">
                        <li><a href="index.php"><span class="icon-icon-16"></span>Home</a></li>
                        <li><span class="icon-57"></span>Properties</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end-->

        <!-- propertiest-grid -->
        <section class="propertiest__section page propertiest__grid p_relative see__pad">
            <div class="container">
                <div class="propertiest__advanced__search">
                    <div class="property__form_two">
                        <form action="index.php" method="post" class="reserve-form">
                            <div class="advance__search">
                                <h5>Advanced Search</h5>
                                <ul class="advance__search__one">
                                    <li>
                                        <div class=" form-group clearfix">
                                            <div class="top__title clearfix">
                                                <div class="icon">
                                                    <span class="icon-icon-33"></span>
                                                </div>
                                                <label>Location</label>
                                            </div>
                                            <select class="wide" style="display: none;">
                                                <option data-display="What you are looking ?">What you are looking ?
                                                </option>
                                                <option value="New York">New York</option>
                                                <option value="California">California</option>
                                                <option value="London">London</option>
                                                <option value="Maxico">Maxico</option>
                                            </select>
                                            <div class="nice-select wide" tabindex="0">
                                                <span class="current">What you are looking ?</span>
                                                <ul class="list">
                                                    <li data-value="What you are looking ?"
                                                        data-display="What you are looking ?" class="option selected">
                                                        What you are looking ?</li>
                                                    <li data-value="New York" class="option">New York</li>
                                                    <li data-value="California" class="option">California</li>
                                                    <li data-value="London" class="option">London</li>
                                                    <li data-value="Maxico" class="option">Maxico</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class=" form-group clearfix">
                                            <div class="top__title">
                                                <div class="icon">
                                                    <span class="icon-icon-16"></span>
                                                </div>
                                                <label>Property Type</label>
                                            </div>
                                            <select class="wide" style="display: none;">
                                                <option data-display="Property Type">Property Type</option>
                                                <option value="Laxury">Laxury</option>
                                                <option value="Classic">Classic</option>
                                                <option value="Modern">Modern</option>
                                                <option value="New">New</option>
                                            </select>
                                            <div class="nice-select wide" tabindex="0">
                                                <span class="current">Property Type</span>
                                                <ul class="list">
                                                    <li data-value="Property Type" data-display="Property Type"
                                                        class="option selected">Property Type</li>
                                                    <li data-value="Laxury" class="option">Laxury</li>
                                                    <li data-value="Classic" class="option">Classic</li>
                                                    <li data-value="Modern" class="option">Modern</li>
                                                    <li data-value="New" class="option">New</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class=" form-group clearfix">
                                            <div class="top__title">
                                                <div class="icon">
                                                    <span class="icon-icon-36"></span>
                                                </div>
                                                <label>All Cities</label>
                                            </div>
                                            <select class="wide" style="display: none;">
                                                <option data-display="All Cities">All Cities</option>
                                                <option value="Haight Ashbury">Haight Ashbury</option>
                                                <option value="Hayes Valley">Hayes Valley</option>
                                                <option value="North Beach">North Beach</option>
                                                <option value="Outer Richmond">Outer Richmond</option>
                                            </select>
                                            <div class="nice-select wide" tabindex="0">
                                                <span class="current">All Cities</span>
                                                <ul class="list">
                                                    <li data-value="All Cities" data-display="All Cities"
                                                        class="option selected">All Cities</li>
                                                    <li data-value="Haight Ashbury" class="option">Haight Ashbury</li>
                                                    <li data-value="Hayes Valley" class="option">Hayes Valley</li>
                                                    <li data-value="North Beach" class="option">North Beach</li>
                                                    <li data-value="Outer Richmond" class="option">Outer Richmond</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class=" form-group clearfix">
                                            <div class="top__title slider">
                                                <div class="icon">
                                                    <span class="icon-icon-13"></span>
                                                </div>
                                                <label>Price</label>
                                            </div>
                                            <div class="range-slider clearfix">
                                                <div id="price-range">
                                                    <div class="section price">
                                                        <p id="price-value" class="price-value"> <span></span> </p>
                                                        <div class="price-slider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="propertiest__grid__contect pt-40">
                    <div class="row">
                        <div class="col-xl-4 col-lg-12">
                            <div class="blog__sidebar default__sidebar">
                                <div class="sidebar__widget post__widget">
                                    <div class="widget-title">
                                        <h4 class="title">Latest Listings</h4>
                                    </div>
                                    <div class="widget-content">
                                        <div class="post-inner">
                                            <?php
                                            while($row2=mysqli_fetch_array($result2))
                                            {
                                                ?>
                                            <div class="post">
                                                <figure class="post__thumb"><a
                                                        href="property-details.php?id=<?php echo $row2['slug'];?>"><img
                                                            src="sitemanager/property/<?php echo $row2['pimage'];?>"
                                                            alt=""></a></figure>
                                                <div class="re__post__content">
                                                    <h6><a
                                                            href="property-details.php?id=<?php echo $row2['slug'];?>"><?php echo $row2['title'];?></a>
                                                    </h6>
                                                    <div class="location">
                                                        <p><span
                                                                class="icon-icon-36"></span><?php echo $row2['location'];?>
                                                        </p>
                                                    </div>
                                                    <div class="price__post">
                                                        <p><?php echo $row2['price'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="sidebar__widget button__widget">
                                    <div class="image__box">
                                        <figure class="image">
                                            <img src="assets/images/news/blog-button.png" alt="">
                                        </figure>
                                        <div class="image__button">
                                            <a href="property.php"> Find Your Dream House <i
                                                    class="icon-icon-49"></i></a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12">
                            <div class="propertiest__contents">
                                <div class="row">
                                    <?php
                                    while($row1=mysqli_fetch_array($result1))
                                    {
                                        ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 pb-30">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <a href="property-details.php?id=<?php echo $row1['slug'];?>">
                                                        <img src="sitemanager/property/<?php echo $row1['pimage'];?>"
                                                            alt="">
                                                    </a>
                                                </figure>
                                                <!-- <div class="image__icon__box">
                                                    <ul class="image__icon clearfix">
                                                        <li> <a href="propertypropertyproperty.php"><span
                                                                    class="icon-icon-31"></span></a></li>
                                                        <li><a href="propertypropertyproperty.php"> <span
                                                                    class="icon-icon-02"></span></a></li>
                                                        <li><a href="compare-details.php"> <span
                                                                    class="icon-icon-24"></span></a></li>
                                                        <li><a href="assets/images/feature/features-1.png"
                                                                class="lightbox-image p_relative"
                                                                data-fancybox="gallery"><span
                                                                    class="icon-icon-47"></span></a></li>
                                                    </ul>
                                                </div> -->
                                                <div class="price__section">
                                                    <?php
if($row1['status']=='Available')
{
    ?>
                                                    <div class="img__count" style="background:green;">

                                                        <span><?php echo $row1['status'];?></span>
                                                    </div>
                                                    <?php
}
?>
                                                    <?php
                                                    
if($row1['status']=='Sold out')
{
    ?>
                                                    <div class="img__count" style="background:red;">

                                                        <span><?php echo $row1['status'];?></span>
                                                    </div>
                                                    <?php
}
?>
                                                </div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="review__section">
                                                    <?php
if($row1['status']=='Available')
{
    ?>
                                                    <div class="price">
                                                        <span><?php echo $row1['price'];?> </span>
                                                    </div>

                                                    <?php
}
?>
                                                    <div class="catagory">
                                                        <span><?php echo $row1['type'];?></span>
                                                    </div>
                                                </div>
                                                <div class="properties__title">
                                                    <h4> <a
                                                            href="property-details.php?id=<?php echo $row1['slug'];?>"><?php echo $row1['title'];?></a>
                                                    </h4>
                                                </div>
                                                <ul class="more__details">
                                                    <li><span
                                                            class="icon-icon-04"></span><?php echo $row1['bathroom'];?>
                                                    </li>
                                                    <li><span class="icon-icon-05"></span><?php echo $row1['bedroom'];?>
                                                    </li>
                                                    <li><span
                                                            class="icon-icon-42"></span><?php echo $row1['builtuparea'];?>
                                                    </li>
                                                    <!-- <li><span class="icon-icon-34"></span>2</li> -->
                                                </ul>
                                                <div class="author-info ">
                                                    <div class="author">
                                                        <!-- <figure class="author-thumb"><img src="assets/images/feature/author-1.png"
                                                    alt=""></figure> -->
                                                        <span><?php echo $row1['location'];?></span>
                                                    </div>
                                                    <div class="view__btn">
                                                        <a href="property-details.php?id=<?php echo $row1['slug'];?>">View
                                                            Details <span class="icon-57"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- <div class="pagination__wrapper centred">
                                    <ul class="pagination pt-20">
                                        <li><a href="blog.php" class="active">1</a></li>
                                        <li><a href="blog.php">2</a></li>
                                        <li><a href="blog.php">...</a></li>
                                        <li><a href="blog.php">5</a></li>
                                        <li><a href="blog.php"> <span class="icon-icon-39"></span> </a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- propertiest-grid end -->

        <!-- main-footer -->
        <footer class="main-footer p_relative">
            <div class="footer-top p_relative d_block">
                <div class="icon-layer" style="background-image:url(assets/images/shape/shape-03.png)"></div>
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget left">
                                <div class="logo-widget">
                                    <figure class="footer-logo"><a href="index.php"><img src="assets/images/logo.png"
                                                alt=""></a></figure>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li><span class="icon-icon-31"></span> Plot No: 108/3607, 1st Floor Opposite Pal
                                            Heights Gate No. 3, Jaydev Vihar, Bhubaneswar, Odisha 751013</li>
                                        <li><span class="icon-icon-35"></span> <a href="tel:+917969451150">+91
                                                7969451150</a></li>
                                        <li><span class="icon-60"></span> <a
                                                href="mailto:info@propel.plus">info@propel.plus</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_100">
                                <div class="widget-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.php">Homes for sale</a></li>
                                        <li><a href="index.php">Homes for rent</a></li>
                                        <li><a href="index.php">Apartment for sale</a></li>
                                        <li><a href="index.php">Apartment for rent</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Locations</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.php">Bhubaneswar</a></li>
                                        <li><a href="index.php">Ranchi</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Company</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.php">About us</a></li>
                                        <li><a href="index.php">Contact Us</a></li>
                                        <li><a href="index.php">Services</a></li>
                                        <li><a href="index.php">Properties</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column p-lg-0">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Our Gallery</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="footer__image">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-01.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-07.png"
                                                        class="lightbox-image" data-fancybox="gallery"><span
                                                            class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-02.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-08.png"
                                                        class="lightbox-image" data-fancybox="gallery"><span
                                                            class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-03.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-09.png"
                                                        class="lightbox-image" data-fancybox="gallery"><span
                                                            class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-04.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-10.png"
                                                        class="lightbox-image" data-fancybox="gallery"><span
                                                            class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-05.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-11.png"
                                                        class="lightbox-image" data-fancybox="gallery"><span
                                                            class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="assets/images/resource/footer-06.png" alt="">
                                            </figure>
                                            <div class="lower-content">
                                                <div class="view-btn"><a href="assets/images/resource/footer-12.png"
                                                        class="lightbox-image" data-fancybox="gallery"><span
                                                            class="icon-icon-38"></span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom p_relative">
                <div class="container">
                    <div class="bottom-inner p_relative">
                        <div class="copyright">
                            <p> Copyright © 2024 by <a href="index.php">propel</a>. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="icon-icon-49"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/timePicker.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/nav-tool.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>