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


    $aimage1=$_FILES['aimage1']['name'];
    $temp_name1 =$_FILES['aimage1']['tmp_name'];
    move_uploaded_file($temp_name1,"gallery/$aimage1");

	
	

		$sql="insert into gallery (image) values('$aimage1')";
		$result=mysqli_query($con,$sql);
		if($result)
			{
				$msg="<p class='alert alert-success'>Image Uploaded Successfully</p>";
				echo "<meta http-equiv='refresh' content='0'>";
						
			}
			else
			{
				$error="<p class='alert alert-warning'>* Image Not Uploaded</p>";
			}
	}
	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Propel - Gallery</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
    function confirmDelete(disUrl) {
        if (confirm("Are you sure you want to delete this image?")) {
            document.location = disUrl;
        }
    }
    </script>
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
                        <h3 class="page-title">Gallery</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
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
                            <h1 class="card-title">Add Gallery</h1>
                            <?php echo $error;?>
                            <?php echo $msg;?>
                            <?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
                        </div>
                        <form method="post" id="insert product" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h5 class="card-title">Gallery Image</h5>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage1" type="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <input type="submit" class="btn btn-primary" value="Submit" name="insert"
                                        style="margin-left:200px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!----End City add section  --->

            <!----view city  --->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gallery Image List</h4>

                        </div>
                        <div class="card-body">

                            <table id="basic-datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
													
												$query=mysqli_query($con,"select * from gallery");
												$cnt=1;
												while($row=mysqli_fetch_array($query))
													{
											?>
                                    <tr>

                                        <td><?php echo $cnt; ?></td>
                                        <td><img src="gallery/<?php echo $row['1']; ?>"
                                                style="height:80px; width:130px;"></td>

                                        <td>
                                            <a
                                                href="javascript:confirmDelete('gallerydelete.php?id=<?php echo $row['0']; ?>')"><button
                                                    class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php $cnt=$cnt+1; } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- view City -->
        </div>
    </div>
    <!-- /Main Wrapper -->
    <!---
			
			
			
			---->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/buttons.php5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>