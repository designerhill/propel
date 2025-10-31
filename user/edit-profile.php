<?php
     ob_start();
     include('header.php');
     $uid=$_SESSION['user'];
     if (!isset($_SESSION['user'])) {
        header("Location: ../login.php");
        exit();
    }
     $query2="select * from user where userid='$uid'";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));
$row=mysqli_fetch_array($result2);
if(isset($_POST['login']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $dob=$_POST['dob'];
    
    if (isset($_FILES['aimage']) && $_FILES['aimage']['error'] === UPLOAD_ERR_OK) {
        $aimage = $uid . $_FILES['aimage']['name'];
    }
    else
    $aimage='';
	$temp_name  =$_FILES['aimage']['tmp_name'];

	if($temp_name)
	{
	move_uploaded_file($temp_name,"userimg/$aimage");
	$sql1 = "UPDATE user SET image='$aimage' WHERE userid = '$uid'";
	$result1=mysqli_query($con,$sql1);
	}
    
    if(empty($dob))
    {
    $query="update user set name='$name', email='$email',city='$city' where userid='$uid'";
    }
    else
    $query="update user set name='$name', email='$email',city='$city',dob='$dob' where userid='$uid'";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    if($query)
    {
        echo "<script>alert('Profile updated successfully');</script>";
        header("location:profile.php");
    }
    else
    echo "<script>alert('Error');</script>";


}

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

            <!-- Edit Profile Content -->
            <div class="profile-details">
                <div class="cards">
                    <button class="tab active">Edit Personal Details</button>
                </div>

                <div class="details-section">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- Profile Image -->
                        <div class="detail-row">
                            <span>Profile Image</span>
                            <div style="flex: 1;">
                                <?php
                                if($row['image']!='')
                                {
                                ?>
                                <img src="userimg/<?php echo $row['image'];?>" alt="Profile Image" class="profile-img">
                                <?php
                                }
                                ?>
                                <input class="form-control" type="file" name="aimage" accept="image/*">
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="detail-row">
                            <span>Name</span>
                            <input type="text" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');"
                                class="form-control" value="<?php echo $row['name'];?>" placeholder="Enter your name"
                                name="name" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="detail-row">
                            <span>Phone Number</span>
                            <input type="number" class="form-control" value="<?php echo $row['mobile'];?>"
                                placeholder="Phone number" name="mobile" readonly>
                        </div>

                        <!-- Email -->
                        <div class="detail-row">
                            <span>Email</span>
                            <input type="email" oninput="this.value = this.value.replace(/[^a-zA-Z0-9@._-]/g, '');"
                                class="form-control" name="email" value="<?php echo $row['email'];?>"
                                placeholder="Enter your email">
                        </div>

                        <!-- City -->
                        <div class="detail-row">
                            <span>City</span>
                            <input type="text" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');"
                                class="form-control" name="city" value="<?php echo $row['city'];?>"
                                placeholder="Enter your city name">
                        </div>

                        <!-- Date of Birth -->
                        <div class="detail-row">
                            <span>Date of Birth</span>
                            <input type="date" id="birthdate" class="form-control" name="dob"
                                value="<?php echo $row['dob'];?>">
                        </div>

                        <!-- Save Button -->
                        <div class="detail-row">
                            <button class="theme-btn btn-one" type="submit" name="login">
                                <i data-feather="save"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


</div>
<script>
const today = new Date();

// Calculate the maximum (100 years ago) and minimum (18 years ago) dates
const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
const minDate = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());

// Format dates to YYYY-MM-DD
const formatDate = (date) => {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Add leading zero
    const day = String(date.getDate()).padStart(2, '0'); // Add leading zero
    return `${year}-${month}-${day}`;
};

// Set the min and max attributes on the date input
const dateInput = document.getElementById('birthdate');
dateInput.min = formatDate(minDate);
dateInput.max = formatDate(maxDate);
</script>
<?php
    include('footer.php');
    ?>