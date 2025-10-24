<?php
include('header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$name=$_POST['name'];
    $auser=$_POST['auser'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=sha1($_POST['password']);
    $city=$_POST['city'];

	
	$sql="INSERT INTO admin (role,name,auser,aemail,apass,aphone,city)
	VALUES(2,'$name','$auser','$email','$password','$mobile','$city')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Admin Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Something went wrong. Please try again</p>";
		}
}
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add City Admin</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add City Admin Details</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">City Admin Detail</h5>
                            <?php echo $error; ?>
                            <?php echo $msg; ?>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="name" required
                                                placeholder="Enter Admin Name">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="email" required
                                                placeholder="Enter Admin Email">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Mobile</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="mobile" required
                                                placeholder="Enter Admin Mobile">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Username</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="auser" required
                                                placeholder="Enter Username">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Password</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="password" required
                                                placeholder="Enter Password">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">City</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="city" required>
                                                <option value="">Select</option>
                                                <?php
																		$query1=mysqli_query($con,"select * from city");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
                                                <option value="<?php echo $row1['1']; ?>" class="text-captalize">
                                                    <?php echo $row1['1']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>


                            </div>


                            <input type="submit" value="Submit" class="btn btn-success btn-sm" name="add"
                                style="margin-left:200px;">

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>




<?php
include('footer.php');
?>