<?php
     include('header.php');
     $uid=$_SESSION['user'];
     if (!isset($_SESSION['user'])) {
        header("Location: ../login.php");
        exit();
    }
     $query2="select * from user where userid='$uid'";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));
$row=mysqli_fetch_array($result2);
     ?>

<section class="myprofile-section sec-pad">
    <div class="container">
        <div class="main-content">
            <!-- Navigation Tabs -->
            <div class="tabs">
                <a href="profile.php" class="tab active">Profile</a>
                <a href="my-listing.php" class="tab">My Listings</a>
                <a href="communication.php" class="tab">Communication</a>
                <!-- <a href="refer-and-earn.php" class="tab">Refer & Earn</a> -->
            </div>

            <!-- Profile Content -->
            <div class="profile-details">
                <div class="cards">
                    <button class="tab active">Personal Details</button>
                    <a href="edit-profile.php" class="edit-profile">
                        <i data-feather="edit-2"></i>
                        <span>Edit Profile</span>
                    </a>
                </div>

                <div class="details-section">
                    <!-- Profile Image -->
                    <div class="detail-row profile-image-section">
                        <span>Profile Image</span>
                        <div class="profile-img-wrapper">
                            <?php
                            if($row['image']=='')
                            {
                            ?>
                            <img src="../assets/images/user.png" alt="Profile Image" class="profile-img">
                            <?php
                            }
                            else
                            {
                            ?>
                            <img src="userimg/<?php echo $row['image'];?>" alt="Profile Image" class="profile-img">
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="detail-row">
                        <span>Name</span>
                        <span><?php echo !empty($row['name']) ? htmlspecialchars($row['name']) : '—'; ?></span>
                    </div>

                    <!-- Phone Number -->
                    <div class="detail-row">
                        <span>Phone Number</span>
                        <span><?php echo !empty($row['mobile']) ? htmlspecialchars($row['mobile']) : '—'; ?></span>
                    </div>

                    <!-- Email -->
                    <div class="detail-row">
                        <span>Email</span>
                        <span><?php echo !empty($row['email']) ? htmlspecialchars($row['email']) : '—'; ?></span>
                    </div>

                    <!-- City -->
                    <div class="detail-row">
                        <span>City</span>
                        <span><?php echo !empty($row['city']) ? htmlspecialchars($row['city']) : '—'; ?></span>
                    </div>

                    <!-- Date of Birth -->
                    <div class="detail-row">
                        <span>Date of Birth</span>
                        <span><?php echo !empty($row['dob']) ? htmlspecialchars($row['dob']) : '—'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
    include('footer.php');
    ?>