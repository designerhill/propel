<?php
ob_start();
session_start();
include('config.php');
$mobile = $_SESSION['mobile'];
if (isset($_POST['submit'])) {
       $otp = $_POST['otp'];
        $query3 = "select * from user where mobile='$mobile' and otp='$otp'";
        $result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
        $row3=mysqli_fetch_array($result3);
        
        $rowcount = mysqli_num_rows($result3);
        if($rowcount==1)
        {
            $query = "update user set status=1 where mobile='$mobile' and otp='$otp' ";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $contactName=$row3['name'];
        $contactNumber=$row3['mobile'];
        $contactEmail=$row3['email'];
        $userid=$row3['userid'];
        $_SESSION['user']=$userid;
   header("location:user/profile.php");
    exit();
    ob_flush();  
        }
        if (($rowcount == 0)) {
                   
                echo "<script>alert('Please enter a valid OTP');</script>";
                }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Properl</title>

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
    <?php
include('gtag.php');
?>
    <style>
    .signup-container {
        width: 100%;
        max-width: 400px;
        background-color: #fff;
        justify-content: center;
        align-items: center;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Form Styling */
    .form-wrapper {
        text-align: center;
        /* Centers the logo, h1, and form text */
    }

    .form-wrapper .logo {
        width: 120px;
        /* Adjust the width as needed */
        margin-bottom: 15px;
    }

    .form-wrapper h1 {
        margin-bottom: 10px;
        font-size: 24px;
        color: #333;
    }

    .form-wrapper p {
        color: #777;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
        text-align: left;
        /* Keep label aligned left */
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit-btn {
        width: 100%;
        background-color: #28a745;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #218838;
    }

    .login-link {
        text-align: center;
        margin-top: 15px;
        color: #555;
    }

    .login-link a {
        color: #007bff;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .signup-container {
            max-width: 90%;
        }
    }

    @media (max-width: 480px) {
        .form-wrapper h1 {
            font-size: 20px;
        }

        .submit-btn {
            font-size: 14px;
        }

        .input-group input {
            font-size: 14px;
        }

        /* Adjust logo size for smaller screens */
        .form-wrapper .logo {
            width: 100px;
        }
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

        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-4 col-md-12 col-sm-12 ">
                <div class="signup-container mb-3">
                    <div class="form-wrapper">
                        <!-- Logo added here -->

                        <h1>Verify OTP</h1>
                        <p>Please enter the OTP sent to <?php echo $mobile;?></p>
                        <form action="" method="post">



                            <div class="input-group">
                                <label for="password">OTP</label>
                                <input type="text" id="otp" placeholder="Enter OTP" name="otp" required>
                            </div>
                            <button type="submit" class="submit-btn" name="submit">Verify</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php
     include('footer.php');
     ?>