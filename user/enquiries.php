<?php
     include('header.php');
     $uid=$_SESSION['user'];
     if (!isset($_SESSION['user'])) {
        // Redirect to login page if session is not set
        header("Location: ../login.php");
        exit();
    }
     $query2="SELECT e.*, p.* FROM enquiry e JOIN  property p  ON  e.project = p.pid  WHERE   p.userid = '$uid'";  
     $result2=mysqli_query($con,$query2) or die(mysqli_error($con));

     function maskMobileNumber($mobileNumber) {
        // Ensure the number is at least 10 digits (for example, a typical mobile number)
        if (strlen($mobileNumber) >= 10) {
            // Mask the first 6 digits and show the last 4 digits
            $masked = substr($mobileNumber, 0, -4); // Take all but the last 4 digits
            $masked = str_repeat('*', strlen($masked)) . substr($mobileNumber, -4); // Replace them with '*'
            return $masked;
        } else {
            // If the mobile number is shorter than expected, just return it as is
            return $mobileNumber;
        }
    }

    function maskEmail($email) {
        // Split the email into the local part and the domain part
        list($local, $domain) = explode('@', $email);
    
        // Mask the local part (keep the first character and replace the rest with asterisks)
        $maskedLocal = substr($local, 0, 1) . str_repeat('*', strlen($local) - 1);
    
        // Mask the domain part (keep the first character and replace the rest with asterisks)
        $domainParts = explode('.', $domain);
        $maskedDomain = substr($domainParts[0], 0, 1) . str_repeat('*', strlen($domainParts[0]) - 1);
        
        // Keep the rest of the domain intact (e.g., ".com")
        $maskedDomain .= '.' . implode('.', array_slice($domainParts, 1));
    
        // Return the masked email
        return $maskedLocal . '@' . $maskedDomain;
    }
     ?>
<section class="myprofile-section sec-pad">
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">

            <a href="profile.php">
                <li>Profile</li>
            </a>
            <a href="listings.php">
                <li>My Listings</li>
            </a>
            <a href="enquiries.php">
                <li>My Enquiries</li>
            </a>
            <a href="chat.php">
                <li>Communication
                </li>
            </a>
            <a href="../logout.php">
                <li>Logout</li>
            </a>
        </div>
        <div class="col-xl-8 col-lg-12 ">
            <?php
                while($row=mysqli_fetch_array($result2))
                {
                    ?>
            <div class="details-section">
                <div class="detail-row">
                    <span>Name:</span>
                    <span><?php echo $row['name'];?></span>
                </div>
                <div class="detail-row">
                    <span>Phone Number:</span>
                    <span><?php echo maskMobileNumber($row['phone']);?></span>
                </div>
                <div class="detail-row">
                    <span>Email:</span>
                    <span><?php echo maskEmail($row['email']);?></span>
                </div>

                <div class="detail-row">
                    <span>Date of Enquiry:</span>
                    <span><?php echo ($row['addedon']);?></span>
                </div>


            </div>
            <?php
                }
                ?>
        </div>
    </div>
    </div>
    <?php
    include('footer.php');
    ?>