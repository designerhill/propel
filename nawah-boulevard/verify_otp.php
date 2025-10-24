<?php
ob_start();
include('config.php');
$mobile = $_SESSION['mobile'];
if (isset($_POST['submit'])) {
    $otp = $_POST['otp'];
    $query3 = "select * from tbl_enquiry where mobile='$mobile' and otp='$otp'";
        $result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
        $row3=mysqli_fetch_array($result3);
        $contactName=$row3['name'];
        $contactNumber=$row3['mobile'];
        $contactEmail=$row3['email'];
        $rowcount = mysqli_num_rows($result3);
        if($rowcount==1)
        {
            $query = "update tbl_enquiry set otpverified=1 where mobile='$mobile' and otp='$otp' ";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        
        header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    $name = trim($contactName);
    $mobile = trim($contactNumber);
    $email = trim($contactEmail);
    $projectId='a0lIe000000g9XkIAI';
    $leadSource='Website';
    
     // API endpoint URL
     $apiEndpoint = 'https://capdealrealtycarepvtltd.my.salesforce-sites.com/services/apexrest/web/v1.0/create_lead';

    // // Create the full URL with parameters
      $fullUrl = $apiEndpoint . '?leadName=' . urlencode($name) . '&emailId=' . urlencode($email). '&mobileNumber=' . urlencode($mobile). '&projectId=' . urlencode($projectId). '&leadSource=' . urlencode($leadSource);
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

    // Close cURL session
    curl_close($ch);
    
    $_SESSION['mobile'] = $contactNumber;
   header("location:thank-you.html");
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> 7th Avenue </title>
    <!-- favicons Icons -->
    <meta name="description" content="7th Avenue landing page " />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #21568a;
            color: #333;
        }

        .otp-container {
            text-align: center;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .otp-container h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .otp-container p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .otp-container input {
            padding: 10px;
            font-size: 1rem;
            width: 80%;
            max-width: 300px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .otp-container button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #ff6f61;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .otp-container button:hover {
            background-color: #ff8a80;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div >
        <!--Contact Page Start-->
        <section>
            <div class="otp-container">
                <div class="text-center">
                    
                    <h2>Verify OTP</h2>
                    
                </div>
                <div class="contact-page__inner">
                    <form action="" method="post">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <input type="text" placeholder="Enter OTP" name="otp" required>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                     
                                    <div class="contact-page__btn-box">
                                        <button type="submit" name="submit" class="thm-btn contact-form__btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </section>
        <!--Contact Page End-->

    </div><!-- /.page-wrapper -->
</body>
</html>