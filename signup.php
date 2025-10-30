<?php 
include('config.php');
session_start();
	$error="";

$contactNameError='';
$contactPasswordError='';
$contactNumberError='';
$mcontactName = '';
$mcontactNumber = '';

if(isset($_POST['submit'])){
$mcontactName = $_POST['name'];
$mcontactPassword = $_POST['password'];
$mcontactNumber = $_POST['phone'];
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i:s');

if (empty($_POST['name'])) {
    $contactNameError = "Please enter name";
    } else
    if (preg_match("/([@%\$#\*]'+)/", $mcontactName)) {
    $contactNameError = "Please enter a valid name";
    }
    
    if (empty($_POST['password'])) {
        $contactNameError = "Please enter password";
        }
    
    if (empty($_POST['phone'])) {
    $contactNumberError = "Please enter contact number";
    } else {
    
    if (!preg_match('/^[0-9]{10}+$/', $mcontactNumber) == true) {
    $contactNumberError = "Please enter a valid mobile number";
    }
    }
		
		$pass= sha1($mcontactPassword);


        if(!$contactNameError && !$contactPasswordError && !$contactNumberError)
        {
          
            function generateUserID($con) {
                // Get the last user ID from the database
                $query = "SELECT userid FROM user ORDER BY uid DESC LIMIT 1";
                $result = $con->query($query);
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $lastUserID = $row['userid'];
            
                    // Extract the numeric part and increment it
                    $numericPart = (int)substr($lastUserID, 5); // Get the part after 'PRPUS'
                    $newNumericPart = str_pad($numericPart + 1, 5, '0', STR_PAD_LEFT); // Increment and pad with zeros
                } else {
                    $newNumericPart = '00001'; // If no users, start with 1
                }
            
                // Construct the new user ID
                return 'PRPUS' . $newNumericPart;
            }
            
			$query = "SELECT * FROM user WHERE mobile='$mcontactNumber' and status= 1 ";
			$result = mysqli_query($con,$query)or die(mysqli_error());
			$num_row = mysqli_num_rows($result);

            $otp = rand(100000, 999999);
			if( $num_row ==0 )
			{
                $newUserID = generateUserID($con);
                
                $sql = "insert into user (userid,name, mobile,password, addedon,otp,status,utype)
                VALUES ('$newUserID','".$mcontactName."',  '".$mcontactNumber."','$pass', '".$date."','".$otp."',0,'User')";
            $res=mysqli_query($con,$sql) or mysqli_die_error($con);
            
            $apiEndpoint = 'http://text2india.store/vb/apikey.php';

    $msg='Your OTP is '.$otp.'. Please use this code to verify your identity on our website. Do not share this code with anyone for security reasons. Thank you for choosing  CAPDEAL.';
    
     $fullUrl = $apiEndpoint . '?apikey=kS9FvToprgnCa0eC&senderid=CAPDRE&templateid=1107171534035391474'.'&number=' . urlencode($mcontactNumber). '&message=' . urlencode($msg). '';

    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $fullUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ''); // Empty string as we're sending data in the URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session
    $response = curl_exec($ch);


    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }


    curl_close($ch);
      $_SESSION['mobile'] = $mcontactNumber;
   header("location:verify_otp.php");
    exit();
    ob_flush();  
			}
			
		
        else{
            echo "<script>alert('Account already exists!');</script>";
		}
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



        <?php $header_style = 'inner'; include('header.php'); ?>

        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Sign Up</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Sign Up</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- ragister-section -->
        <section class="ragister-section centred sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">

                        <div class="tabs-box">


                            <div class="inner-box">
                                <h4>Sign up</h4>
                                <form action="" method="post" class="default-form" onsubmit="return validateForm()">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" required=""
                                            placeholder="Enter Your Name" maxlength="120"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');"
                                            value="<?php echo $mcontactName;?>">
                                        <span id="name-error" class="error">Invalid name</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="number"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);"
                                            name="phone" id="mobile" required="" value="<?php echo $mcontactNumber;?>"
                                            placeholder="Enyter Your Mobile Number">
                                        <span id="mobile-error" class="error">Invalid mobile number format</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" required=""
                                            placeholder="Enyter Your Password">
                                    </div>

                                    <div class="form-group message-btn">
                                        <button type="submit" name="submit" class="theme-btn btn-one">Sign up</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                    <p>Already have an account? <a href="login.php">Sign in</a></p>
                                </div>
                            </div>
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
            var mobile = document.getElementById('mobile').value;

            var namePattern = /^[A-Za-z\s]{3,}$/;
            var mobilePattern = /^[6-9]\d{9}$/;

            if (!namePattern.test(name)) {
                alert('Please enter a valid name');
                return false;
            }
            if (!emailPattern.test(email)) {
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

        <?php
     include('footer.php');
     ?>