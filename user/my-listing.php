<?php
     include('header.php');
     $uid=$_SESSION['user'];
     if (!isset($_SESSION['user'])) {
        header("Location: ../login.php");
        exit();
    }
$query2="select * from property where userid='$uid'";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));
     ?>


<section class="myprofile-section sec-pad">
    <div class="container">


        <div class="main-content">
            <div class="tabs">
                <a href="profile.php" class="tab ">Profile</a>
                <a href="my-listing.php" class="tab active">My Listings</a>

                <a href="communication.php" class="tab">Communication</a>


            </div>
            <div class="profile-details">
                <div class="cards">
                    <button class="tab active">
                        <i data-feather="list"></i>
                        My Listings
                    </button>
                    <a href="add-property.php" class="edit-profile">
                        <i data-feather="plus-circle"></i>
                        <span>Add Property</span>
                    </a>
                </div>


                <div class="row">
                    <?php
                                    while($row1=mysqli_fetch_array($result2))
                                    {
                                        ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 property-list-item">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <figure class="image">
                                    <a href="../property-details.php?id=<?php echo $row1['slug'];?>">
                                        <img src="../sitemanager/property/<?php echo $row1['pimage'];?>" alt="">
                                    </a>
                                </figure>

                            </div>
                            <div class="col-md-8 col-12">

                                <div class="lower-content">

                                    <div class="properties__title">
                                        <h4><a
                                                href="../property-details.php?id=<?php echo $row1['slug'];?>"><?php echo $row1['title'];?></a>
                                            &nbsp;
                                            <?php
if($row1['isapproved']==0)
{
    ?>
                                            <a href="editproperty.php?id=<?php echo $row1['pid'];?>"
                                                class="edit-property-btn">
                                                <i data-feather="edit-3"></i> Edit
                                            </a>
                                            <?php
}
?>
                                        </h4>

                                        <h6><?php echo $row1['location'];?></h6>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <i data-feather="moon"></i> <?php echo $row1['bedroom'];?> Beds
                                        </div>
                                        <div class="col-md-3">
                                            <i data-feather="droplet"></i> <?php echo $row1['bathroom'];?> Baths
                                        </div>
                                        <div class="col-md-3">
                                            <i data-feather="maximize"></i> <?php echo $row1['carpetarea'];?> Sq Ft
                                        </div>
                                    </div>
                                    <?php
if($row1['isapproved']==1)
{
    ?>
                                    <p class="mt-2 approved-badge">
                                        <i data-feather="check-circle"></i> Approved
                                    </p>
                                    <?php
}
?>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                                    }
                                    ?>
                    </div>

                </div>


            </div>
        </div>
    </div>
</section>

<?php
    include('footer.php');
    ?>