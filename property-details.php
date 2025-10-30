<?php
include('config.php');
session_start();
$slug = isset($_GET['id']) ? $_GET['id'] : '';

if ($slug) {
error_reporting(0);
$query1="select * from property where slug='$slug' and isapproved=1";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$row1 = mysqli_fetch_array($result1);
if (!$row1) {
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><title>Property Not Found</title></head><body style="font-family:sans-serif;text-align:center;padding:50px;"><h1>Property Not Found</h1><p>The property you are looking for does not exist or is not approved.</p><a href="index.php" style="color:#007bff;text-decoration:underline;">Return to Home</a></body></html>';
    exit();
}
$id = $row1['pid'];
$city = $row1['city'];

$query2="select * from property where city='$city' and isapproved=1 limit 0,3";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));



$contactNameError='';
$contactEmailError='';
$contactNumberError='';


if(isset($_POST['submit'])){

$mcontactName = $_POST['name'];
$mcontactEmail = $_POST['email'];
$mcontactNumber = $_POST['mobile'];
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-Y h:i:s');



if (empty($_POST['name'])) {
$contactNameError = "Please enter name";
} else
if (preg_match("/([@%\$#\*]'+)/", $mcontactName)) {
$contactNameError = "Please enter a valid name";
}


if ($mcontactEmail && !filter_var($mcontactEmail, FILTER_VALIDATE_EMAIL)) {
$contactEmailError = "Please enter a valid email";
}

if (empty($_POST['mobile'])) {
$contactNumberError = "Please enter contact number";
} else {

if (!preg_match('/^[0-9]{10}+$/', $mcontactNumber) == true) {
$contactNumberError = "Please enter a valid mobile number";
}
}



if(!$contactNameError && !$contactEmailError && !$contactNumberError)
{
   
$sql = "insert into enquiry (name, email, phone, addedon,project)
    VALUES ('".$mcontactName."', '".$mcontactEmail."' , '".$mcontactNumber."', '".$date."','".$id."')";
$res=mysqli_query($con,$sql) or mysqli_die_error($con);
    

if($row1['projectId']!='')
{
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    $name = trim($mcontactName);
    $mobile = trim($mcontactNumber);
    $email = trim($mcontactEmail);
    $projectId=$row1['projectId'];
    $leadSource='Website';
    
     $apiEndpoint = 'https://capdealrealtycarepvtltd.my.salesforce-sites.com/services/apexrest/web/v1.0/create_lead';

      $fullUrl = $apiEndpoint . '?leadName=' . urlencode($name) . '&emailId=' . urlencode($email). '&mobileNumber=' . urlencode($mobile). '&projectId=' . urlencode($projectId). '&leadSource=' . urlencode($leadSource);
           $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $fullUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ''); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);
} 
   
echo "<script>
window.location.href='thankyou.html';
</script>";


}
}
}

if(isset($_POST['msg'])){

    $message = $_POST['message'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    
    $sender=$_SESSION['user'];
       
    $sql = "insert into message (sender, projectId, receiver, message, date)
        VALUES ('$sender', '".$row1['pid']."' , 'Agent', '".$message."','".$date."')";
    $res=mysqli_query($con,$sql) or mysqli_die_error($con);
    header('location:user/communication.php');
  
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title><?php echo $row1['meta_title'];?></title>
    <meta name="description" content="<?php echo $row1['description'];?>">
    <meta name="keywords" content="<?php echo $row1['keyword'];?>">

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link href="assets/css/timePicker.css" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
include('gtag.php');
?>
    <style>
    .error {
        color: red;
        display: none;


    }

    .input-error {
        border-color: red;

    }
    </style>
</head>


<!-- page wrapper -->

<body>
    <?php
include('tagmanager.php');
?>
    <div class="boxed_wrapper">
        <!-- main header -->
        <?php $header_style = 'inner'; include('header.php'); ?>

        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Property Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Property Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-details -->
        <section class="property-details property-details-one">
            <div class="auto-container">
                <!--<div class="top-details clearfix">
                    <div class="left-column pull-left clearfix">
                        <h3><?php echo $row1['title'];?></h3>

                    </div>

                </div>-->
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-details-content">
                            <div class="carousel-inner">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                    <figure class="image-box"><img
                                            src="sitemanager/property/<?php echo $row1['pimage'];?>" alt=""></figure>
                                    <figure class="image-box"><img
                                            src="sitemanager/property/<?php echo $row1['pimage1'];?>" alt=""></figure>
                                    <figure class="image-box"><img
                                            src="sitemanager/property/<?php echo $row1['pimage2'];?>" alt=""></figure>
                                </div>
                            </div>
                             
                            <div class="discription-box content-widget">
                            <div class="title-box">
                                    <h3><?php echo $row1['title'];?></h3>

                                </div>
                                <div class="">
                                    <h3>Property Description</h3>
                                </div>
                                <div class="text">
                                    <p><?php echo $row1['pcontent'];?></p>
                                </div>
                            </div>
                            <div class="details-box content-widget">
                                <div class="title-box">
                                    <h4>Property Details</h4>
                                </div>
                                <ul class="list clearfix">
                                    <!--<li>Property ID: <span>ZOP251C</span></li>-->
                                    <li>Bedrooms: <span><?php echo $row1['bedroom'];?></span></li>
                                    <li>Bathrooms: <span><?php echo $row1['bathroom'];?></span></li>
                                    <li>Balcony: <span><?php echo $row1['balcony'];?></span></li>
                                    <li>Super Builtup Area: <span><?php echo $row1['superbuiltuparea'];?> Sq Ft</span></li>
                                    
                                    <li>Property Price: <span>Rs. <?php echo $row1['price'];?></span></li>
                                    <li>Property Type: <span><?php echo $row1['type'];?></span></li>
                                    <li>Property Status: <span><?php echo $row1['stype'];?></span></li>
                                    <li>Property Size: <span><?php echo $row1['builtuparea'];?> Sq Ft</span></li>
                                    <li>Garage: <span><?php echo $row1['coveredparking'];?></span></li>
                                    <li>Age of Property: <span><?php echo $row1['ageofproperty'];?></span></li>
                                </ul>
                            </div>
                            <div class="amenities-box content-widget">
                                <div class="title-box">
                                    <h4>Amenities</h4>
                                </div>
                                <div class="row">
                                    <?php
                                $que="select * from property_amenities where pid='$id'";
                                $res=mysqli_query($con,$que) or die(mysqli_error($con));
                                while($ro=mysqli_fetch_array($res))
                                {
$aname=$ro['amenity'];
                                    $ques="select * from amenities where aname='$aname'";
                                $ress=mysqli_query($con,$ques) or die(mysqli_error($con));
                                $ros=mysqli_fetch_array($ress);
                                $icon=$ros['icon'];
                                ?>
                                    <div class="col-md-4 col-6 p-2">
                                        <img src="sitemanager/amenity/<?php echo $icon;?>" width="35px;"
                                            height="35px; ">&nbsp; <?php echo $ro['amenity'];?>
                                    </div>
                                    <?php
                                }
                                ?>

                                </div>
                            </div>

                            <div class="location-box content-widget">
                                <div class="title-box">
                                    <h4>Location</h4>
                                </div>
                                <ul class="info clearfix">
                                    <li><span>Address:</span> <?php echo $row1['address'];?></li>

                                    <li><span>State:</span> <?php echo $row1['state'];?></li>


                                    <li><span>City:</span> <?php echo $row1['city'];?></li>
                                </ul>
                                <div class="google-map-area">
                                    <iframe src="<?php echo $row1['map'];?>" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade" width="100%" height="400"></iframe>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="property-sidebar default-sidebar">
                            <div class="author-widget sidebar-widget">
                                <h2>Unlock the Best Property Deals with Propel Today!</h2>
                                <p>Connect with a professional for more details.</p>
                                <div class="author-box">

                                    <figure class="author-thumb"><img
                                            src="sitemanager/agent/<?php echo $row1['agentpic'];?>" alt="">
                                    </figure>
                                    <div class="inner">
                                        <h4><?php echo $row1['agentname'];?></h4>

                                        <div class="btn-box">
                                            <!-- <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                class="call-me mt-2"><img src="assets/images/chat.png"
                                                    style="height:25px;width:25px;" /></a>
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chat
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="modalForm" action="" method="post">

                                                                <div class="mb-3">
                                                                    <label for="message"
                                                                        class="form-label">Message</label>
                                                                    <textarea class="form-control" id="message"
                                                                        name="message" rows="3"
                                                                        placeholder="Enter your message"
                                                                        required></textarea>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="msg" class="btn btn-primary"
                                                                form="modalForm">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                    }
                  
                  else {
                        ?>
                                            <a href="login.php" class="call-me mt-2"><img src="assets/images/chat.png"
                                                    style="height:25px;width:25px;" /></span></a>
                                            <?php
                    }
                    ?> -->

                                            <a href="https://api.whatsapp.com/send?phone=919090331100&text=Hi"
                                                class="mt-2"><img src="assets/images/whatsapp.png"
                                                    style="height:25px;width:25px;" /></a>

                                            <a href="tel:7969451136"><img src="assets/images/call.png"
                                                    style="height:25px;width:25px;" /></a>

                                        </div>
                                        <p>Real Estate Consultant at propel typically responds in about 15 mins.</p>
                                    </div>
                                </div>
                                <div class="form-inner">
                                    <form action="" method="post" class="default-form" onsubmit="return validateForm()">
                                        <h3 class="title-box">Inquire Now</h3>
                                        <div class="form-group">
                                            <label>Name * </label>
                                            <input type="text" name="name" id="name" placeholder="Enter Your Name"
                                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');"
                                                required="">
                                            <span id="name-error" class="error">Invalid name</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number * </label>
                                            <input type="text" name="mobile" id="mobile"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);"
                                                placeholder="Enter Your Mobile Number" required="">

                                            <span id="mobile-error" class="error">Invalid mobile number format</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" id="email" placeholder="Enter Your Email">
                                            <span id="error-message" class="error">Invalid email format</span>
                                        </div>


                                        <div class="form-group message-btn">
                                            <button type="submit" name="submit" class="theme-btn btn-one">Send
                                                Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="similar-content">
                    <div class="title">
                        <h4>Similar Properties</h4>
                    </div>
                    <div class="row clearfix">
                        <?php
                                        while($row2=mysqli_fetch_array($result2))
                                        {
                                            ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <a href="property-details.php?id=<?php echo $row2['slug'];?>">
                                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                    data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="sitemanager/property/<?php echo $row2['pimage'];?>" alt="">
                                            </figure>

                                        </div>
                                        <div class="lower-content">
                                            <div class="author-info clearfix">
                                                <div class="author pull-left">
                                                    <figure class="author-thumb"><img
                                                            src="sitemanager/agent/<?php echo $row2['agentpic'];?>"
                                                            alt="">
                                                    </figure>
                                                    <h6><?php echo $row2['agentname'];?></h6>
                                                </div>
                                                <div class="buy-btn pull-right"><a
                                                        href="property-details.php?id=<?php echo $row2['slug'];?>">For
                                                        <?php echo $row2['stype'];?></a>
                                                </div>
                                            </div>
                                            <div class="title-text">
                                                <h4><a
                                                        href="property-details.php?id=<?php echo $row2['slug'];?>"><?php echo $row2['title'];?></a>
                                                </h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Starts From</h6>
                                                    <h4>Rs.<?php echo $row2['price'];?></h4>
                                                </div>

                                            </div>
                                            <p><?php echo strlen($row2['pcontent']) > 40 ? substr($row2['pcontent'], 0, 40) . '...' : $row2['pcontent'];?>
                                            </p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i><?php echo $row2['bedroom'];?> Beds</li>
                                                <li><i class="icon-15"></i><?php echo $row2['bathroom'];?> Baths</li>
                                                <li><i class="icon-16"></i><?php echo $row2['superbuiltuparea'];?> Sq Ft
                                                </li>
                                            </ul>
                                            <div class="btn-box"><a
                                                    href="property-details.php?id=<?php echo $row2['slug'];?>"
                                                    class="theme-btn btn-two">See Details</a></div>
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
            </div>
        </section>
        <!-- property-details end -->


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
                            <form action="#" method="post" class="subscribe-form">
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
        <script>
        document.getElementById('email').addEventListener('input', function() {
            var emailInput = this;
            var errorMessage = document.getElementById('error-message');
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(emailInput.value)) {
                emailInput.classList.add('input-error');
                errorMessage.style.display = 'inline';
            } else {
                emailInput.classList.remove('input-error');
                errorMessage.style.display = 'none';
            }
        });

        document.getElementById('mobile').addEventListener('input', function() {
            var mobileInput = this;
            var mobileError = document.getElementById('mobile-error');
            var mobilePattern = /^[6-9]\d{9}$/;

            if (!mobilePattern.test(mobileInput.value)) {
                mobileInput.classList.add('input-error');
                mobileError.style.display = 'inline';
            } else {
                mobileInput.classList.remove('input-error');
                mobileError.style.display = 'none';
            }
        });
        document.getElementById('name').addEventListener('input', function() {
            var nameInput = this;
            var nameError = document.getElementById('name-error');
            var namePattern = /^[A-Za-z\s]{3,}$/;

            if (!namePattern.test(nameInput.value)) {
                nameInput.classList.add('input-error');
                nameError.style.display = 'inline';
            } else {
                nameInput.classList.remove('input-error');
                nameError.style.display = 'none';
            }
        });

        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var mobile = document.getElementById('mobile').value;

            var namePattern = /^[A-Za-z\s]{3,}$/;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var mobilePattern = /^[6-9]\d{9}$/;

            if (!namePattern.test(name)) {
                alert('Please enter a valid name');
                return false;
            }
            if (email && !emailPattern.test(email)) {
                alert('Please enter a valid email');
                return false;
            }
            if (!mobilePattern.test(mobile)) {
                alert('Please enter a valid mobile number');
                return false;
            }

            return true;
        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <?php
include('footer.php');
?>