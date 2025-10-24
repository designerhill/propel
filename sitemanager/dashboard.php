<?php
include('header.php');

// Fetch statistics
$queryBuy = "SELECT COUNT(*) as count FROM property WHERE stype = 'Buy'";
$resultBuy = mysqli_query($con, $queryBuy);
$buyCount = mysqli_fetch_assoc($resultBuy)['count'];

$queryRent = "SELECT COUNT(*) as count FROM property WHERE stype = 'Rent'";
$resultRent = mysqli_query($con, $queryRent);
$rentCount = mysqli_fetch_assoc($resultRent)['count'];

$queryBBSR = "SELECT COUNT(*) as count FROM property WHERE city = 'Bhubaneswar'";
$resultBBSR = mysqli_query($con, $queryBBSR);
$bbsrCount = mysqli_fetch_assoc($resultBBSR)['count'];

$queryRanchi = "SELECT COUNT(*) as count FROM property WHERE city = 'Ranchi'";
$resultRanchi = mysqli_query($con, $queryRanchi);
$ranchiCount = mysqli_fetch_assoc($resultRanchi)['count'];

$queryRaipur = "SELECT COUNT(*) as count FROM property WHERE city = 'Raipur'";
$resultRaipur = mysqli_query($con, $queryRaipur);
$raipurCount = mysqli_fetch_assoc($resultRaipur)['count'];

$queryTotalProp = "SELECT COUNT(*) as count FROM property";
$resultTotalProp = mysqli_query($con, $queryTotalProp);
$totalPropCount = mysqli_fetch_assoc($resultTotalProp)['count'];

$queryUsers = "SELECT COUNT(*) as count FROM user";
$resultUsers = mysqli_query($con, $queryUsers);
$usersCount = mysqli_fetch_assoc($resultUsers)['count'];

$queryEnquiries = "SELECT COUNT(*) as count FROM enquiry";
$resultEnquiries = mysqli_query($con, $queryEnquiries);
$enquiriesCount = mysqli_fetch_assoc($resultEnquiries)['count'];

$query1="select * from blog  order by pid desc limit 0,4";
$result1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query2="select * from property  order by pid desc limit 0,4";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));

$query3="select * from enquiry  order by cid desc limit 0,9";
$result3=mysqli_query($con,$query3) or die(mysqli_error($con));
?>
<!-- Dashboard Custom Styles -->
<link rel="stylesheet" href="css/dashboard.css">
<div class="content-body bg-white">
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h2>👋 Hello, <?php echo $name;?>!</h2>
            <p>Welcome back to your dashboard. Here's what's happening with your properties today.</p>
        </div>

        <!-- Statistics Cards - Row 1 -->
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Total Properties</div>
                                <div class="stat-number"><?php echo $totalPropCount; ?></div>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-building"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Property for Sale</div>
                                <div class="stat-number"><?php echo $buyCount; ?></div>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-home"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Property for Rent</div>
                                <div class="stat-number"><?php echo $rentCount; ?></div>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Total Enquiries</div>
                                <div class="stat-number"><?php echo $enquiriesCount; ?></div>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards - Row 2 (Cities) -->
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Bhubaneswar</div>
                                <div class="stat-number"><?php echo $bbsrCount; ?></div>
                                <small class="text-white-75">Properties</small>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-dark text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Ranchi</div>
                                <div class="stat-number"><?php echo $ranchiCount; ?></div>
                                <small class="text-white-75">Properties</small>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-secondary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Raipur</div>
                                <div class="stat-number"><?php echo $raipurCount; ?></div>
                                <small class="text-white-75">Properties</small>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card stat-card bg-gradient-light text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-label text-white-75">Total Users</div>
                                <div class="stat-number"><?php echo $usersCount; ?></div>
                                <small class="text-white-75">Registered</small>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="row recent-section">

            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">📝 Recent Blog Posts</h4>
                        <?php
while($row1=mysqli_fetch_array($result1))
{    
     $datetime = $row1['date'];

    // Create a DateTime object from the datetime string
    $date = new DateTime($datetime);
    $day = $date->format('d');
    $month = $date->format('M');
    $year = $date->format('Y');
    ?>

                        <div class="media p-t-15 p-b-15">
                            <img src="blog/<?php echo $row1['pimage'];?>" style="height:70px; width:70px;"
                                class="mr-3" alt="Blog">
                            <div class="media-body">

                                <p class="m-b-0 mt-3 font-weight-bold"><?php echo $row1['title'];?></p>
                            </div><span class="text-muted f-s-12"><i class="fa fa-calendar mr-1"></i><?php echo $day;?>
                                <?php echo $month;?>, <?php echo $year;?></span>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">🏠 Recent Properties Added</h4>

                        <?php
while($row2=mysqli_fetch_array($result2))
{    
    ?>
                        <div class="media p-t-15 p-b-15">
                            <img src="property/<?php echo $row2['pimage'];?>" style="height:70px;width:70px;"
                                class="mr-3" alt="Property">
                            <div class="media-body">

                                <p class="m-b-0 mt-3 font-weight-bold"><?php echo $row2['title'];?></p>
                            </div><span class="text-muted f-s-12"><i class="fa fa-map-marker mr-1"></i><?php echo $row2['city'];?></span>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Enquiries Table -->
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card" style="border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: 600; color: #333; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #667eea;">
                            📧 Recent Enquiries
                        </h4>
                        <div class="active-member">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                        <tr>

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row3=mysqli_fetch_array($result3))
                                        {
                                       ?>

                                        <tr>
                                            <td>
                                                <i class="fa fa-user-circle mr-2 text-primary"></i><?php echo $row3['name'];?>
                                            </td>
                                            <td><span><i class="fa fa-envelope mr-2 text-info"></i><?php echo $row3['email'];?></span>
                                            </td>
                                            <td><i class="fa fa-phone mr-2 text-success"></i><?php echo $row3['phone'];?></td>
                                            <td>
                                                <?php 
                                                $status = $row3['status'];
                                                $badgeClass = 'badge-secondary';
                                                if($status == 'Pending') {
                                                    $badgeClass = 'badge-warning';
                                                } elseif($status == 'Completed') {
                                                    $badgeClass = 'badge-success';
                                                } elseif($status == 'Processing') {
                                                    $badgeClass = 'badge-info';
                                                }
                                                ?>
                                                <span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span>
                                            </td>

                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #/ container -->
</div>
<?php
include('footer.php');
?>
<!-- Chartjs chart - Dashboard only -->
<script src="assets/plugins/chartjs/Chart.bundle.js"></script>
<!-- Custom dashboard script -->
<script src="js/dashboard-1.js"></script>