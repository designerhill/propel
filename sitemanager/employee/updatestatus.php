<?php
session_start();
include("config.php"); 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
///code
$error="";
$msg="";
if(isset($_POST['insert']))
{
	$cid = $_GET['id'];
	
	$ustate=$_POST['ustate'];
    $date=date('Y-m-d');
	
	if (empty($_POST['ustate'])) {
        $error= "<p class='alert alert-warning'>* Please select status</p>";
    }
	
	if(!empty($ustate))
	{
	
		$sql="insert into leadstatus (leadid,date,status) values('$cid','$date','{$ustate}')";
		$result=mysqli_query($con,$sql);

        $sqls="UPDATE enquiry SET status='{$ustate}' WHERE cid = {$cid}";
        $results=mysqli_query($con,$sqls);
		if($result)
			{
				$msg="<p class='alert alert-success'>Lead Status Updated</p>";
				header("Location:assignedleads.php?msg=$msg");
			}
			else
			{
				$msg="<p class='alert alert-warning'>Lead Status Not Updated</p>";
				header("Location:assignedleads.php?msg=$msg");
			}
	}

		}
	
	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Propel - Update Status</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="../assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables/select.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables/buttons.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--[if lt IE 9]>
			<script src="../assets/js/html5shiv.min.js"></script>
			<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->


    <!-- Header -->
    <?php include("header.php");?>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper mt-5">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Update Enquiry</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Enquiry</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- city add section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Update Enquiry</h1>
                            <?php echo $error;?>
                            <?php echo $msg;?>
                            <?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
                        </div>
                        <?php 
								$cid = $_GET['id'];
								$sql = "SELECT * FROM enquiry where cid = {$cid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
                        <form method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Status</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="ustate">
                                                    <option value="">Select</option>

                                                    <option value="Interested">Interested</option>
                                                    <option value="Not Interested">Not Interested</option>
                                                    <option value="Follow Up">Follow Up</option>


                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-left">
                                    <input type="submit" class="btn btn-primary" value="Assign" name="insert"
                                        style="margin-left:200px;">
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!----End City add section  --->

        </div>
    </div>
    <!-- /Main Wrapper -->
    <!---
			
			
			
			---->

    <!-- jQuery -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <!-- Datatables JS -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script src="../assets/plugins/datatables/dataTables.select.min.js"></script>

    <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatables/buttons.php5.min.js"></script>
    <script src="../assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="../assets/plugins/datatables/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>

</body>

</html>