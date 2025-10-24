<?php
ob_start();
session_start();
include('config.php');
if(!empty($_POST['name']))
{
    $contactName = $_POST['name'];
}

if(!empty($_POST['email']))
{
$contactEmail = $_POST['email'];

}

if(!empty($_POST['phone']))
{
$contactNumber = $_POST['phone'];

}

if(!empty($_POST['name_popup']))
{
    $contactName = $_POST['name_popup'];
}

if(!empty($_POST['email_popup']))
{
$contactEmail = $_POST['email_popup'];

}

if(!empty($_POST['phone_popup']))
{
$contactNumber = $_POST['phone_popup'];

}
       
$otp = rand(100000, 999999);
       	$sql = "insert into tbl_enquiry (name, email, mobile,otp)
				VALUES ('".$contactName."', '".$contactEmail."' , '".$contactNumber."', '".$otp."')";
$res=mysqli_query($con,$sql) or mysqli_die_error($con);

 $apiEndpoint = 'http://text2india.store/vb/apikey.php';

    $msg='Your OTP is '.$otp.'. Please use this code to verify your identity on our website. Do not share this code with anyone for security reasons. Thank you for choosing  Assotech.';
    
     $fullUrl = $apiEndpoint . '?apikey=kS9FvToprgnCa0eC&senderid=CAPDRE&templateid=1107173520302386969'.'&number=' . urlencode($contactNumber). '&message=' . urlencode($msg). '';

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
   header("location:verify_otp.php");
    exit();
    ob_flush();  
  
?> 