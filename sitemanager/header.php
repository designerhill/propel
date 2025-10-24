<?php
session_start();
include('config.php');
$uid=$_SESSION['auser'];
$query="select * from admin where auser='$uid'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
$city = isset($row['city']) ? $row['city'] : '';
$role = isset($row['role']) ? $row['role'] : 'admin';
$name = isset($row['name']) ? $row['name'] : $row['auser'];
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Propel Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body class="v-light vertical-nav fix-header fix-sidebar">
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
    <div id="">
        <!-- header -->
        <div class="header">
            <div class="nav-header">
                <div class="brand-logo"><a href="dashboard.php"><span class="brand-title"><img
                                src="../assets/images/logo.png" alt=""></span></a>
                </div>
                <div class="nav-control">
                    <div class="hamburger"><span class="line"></span> <span class="line"></span> <span
                            class="line"></span>
                    </div>
                </div>
            </div>
            <div class="header-content">
                <div class="header-left">
                    <ul>
                        <li class="icons position-relative"><a href="javascript:void(0)"><i
                                    class="icon-magnifier f-s-16"></i></a>
                            <div class="drop-down animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <div class="header-search" id="header-search">
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="icon-magnifier"></i></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <ul>

                        <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20"
                                    aria-hidden="true"></i></a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>

                                        <li><a href="#"><i class="mdi mdi-settings"></i> <span>Setting</span></a>
                                        </li>

                                        <li><a href="logout.php"><i class="icon-power"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #/ header -->
        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Main Menu</li>
                    <li class="mm-active"><a href="dashboard.php"><i class="mdi mdi-view-dashboard"></i> <span
                                class="nav-text">Dashboard</span></a>
                    </li>


                    <li class="nav-label"> Management</li>
                    

                    <?php
                   if($role==1)
                   {

                   ?>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-city"></i> <span
                                class="nav-text">State & City</span></a>
                        <ul aria-expanded="false">
                            <li><a href="stateadd.php">Manage States</a>
                            </li>
                            <li><a href="cityadd.php">Manage Cities</a>
                            </li>

                        </ul>
                    </li>
                    <?php
                   }
                   ?>
                    <?php
                   if($role==1)
                   {

                   ?>
                    <li><a href="categoryadd.php"><i class="mdi mdi-bulletin-board"></i> <span
                                class="nav-text">Categories</span></a>
                        <?php
                   }
                   ?>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-home-map-marker"></i>
                            <span class="nav-text">Properties</span></a>
                        <ul aria-expanded="false">
                            <li><a href="propertyadd.php">Add Property</a>
                            </li>
                            <li><a href="propertyview.php">All Properties</a>
                            </li>
                            <li><a href="userpropertyview.php">User Properties</a>
                            </li>

                        </ul>
                    </li>
                    <?php
                   if($role==1)
                   {

                   ?>
                    <li><a href="amenityadd.php"><i class="mdi mdi-cube-outline"></i> <span
                                class="nav-text">Amenities</span></a>
                    </li>
                    
                    <li class="nav-label">📬 Communications</li>
                    
                    <li><a href="enquiry.php"><i class="mdi mdi-email-open"></i> <span
                                class="nav-text">Enquiries</span></a>
                    </li>
                    <li><a href="message.php"><i class="mdi mdi-message-text"></i> <span
                                class="nav-text">Messages</span></a>
                    </li>
                    
                    <li class="nav-label">📝 Content</li>
                    
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-post"></i> <span
                                class="nav-text">Blog</span></a>
                        <ul aria-expanded="false">
                            <li><a href="blogadd.php">Add New Post</a>
                            </li>
                            <li><a href="blogview.php">All Posts</a>
                            </li>

                        </ul>
                    </li>
                    
                    <li class="nav-label">👥 Users</li>
                    
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-account-tie"></i>
                            <span class="nav-text">Agents</span></a>
                        <ul aria-expanded="false">
                            <li><a href="agentadd.php">Add Agent</a>
                            </li>
                            <li><a href="agentview.php">All Agents</a>
                            </li>

                        </ul>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-shield-account"></i>
                            <span class="nav-text">City Admins</span></a>
                        <ul aria-expanded="false">
                            <li><a href="addcityadmin.php">Add Admin</a>
                            </li>
                            <li><a href="cityadmin.php">All Admins</a>
                            </li>

                        </ul>
                    </li>
                    <?php
                   }
                   ?>

                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->
        <!-- content body -->