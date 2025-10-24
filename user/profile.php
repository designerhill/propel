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
            <div class="tabs">
                <a href="profile.php" class="tab active">Profile</a>
                <a href="my-listing.php" class="tab">My Listings</a>
                <a href="communication.php" class="tab">Communication</a>
                <a href="refer-and-earn.php" class="tab">Refer & Earn</a>
            </div>

            <div class="profile-details">
                <div class="cards">
                    <button class="tab active">Personal Details</button>
                    <a href="edit-profile.php" class="mt-3 edit-profile"><i class=" fa fa-edit"></i> Edit Profile</a>
                </div>
                <div class="details-section">
                    <!-- Profile Image -->
                    <div class="detail-row">
                        <span>Profile Image</span>
                        <?php
                        if($row['image']=='')
                        {
                            echo'<img src="../assets/images/user.png" alt="Profile Image"
                        class="profile-img">';
                        }
                        else
                        {
                        ?>
                        <img src="userimg/<?php echo $row['image'];?>" alt="Profile Image" class="profile-img">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="detail-row">
                        <span>Name</span>
                        <span><?php echo $row['name'];?></span>
                    </div>
                    <div class="detail-row">
                        <span>Phone Number</span>
                        <span><?php echo $row['mobile'];?></span>
                    </div>
                    <div class="detail-row">
                        <span>Email</span>
                        <span><?php echo $row['email'];?></span>
                    </div>
                    <div class="detail-row">
                        <span>City</span>
                        <span><?php echo $row['city'];?></span>
                    </div>

                    <div class="detail-row">
                        <span>Date of Birth</span>
                        <span><?php echo $row['dob'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
    include('footer.php');
    ?>