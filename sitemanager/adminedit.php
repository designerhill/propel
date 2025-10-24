<?php
ob_start();
include('header.php');
$error="";
$msg="";

$pid=$_REQUEST['id'];
$query=mysqli_query($con,"select * from admin where aid='$pid'");
$row=mysqli_fetch_array($query);
    
if(isset($_POST['add']))
{

	
	$sql = "UPDATE blog SET title= '{$title}', pcontent= '{$content}' WHERE pid = {$pid}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Details Updated</p>";
		header("Location:cityadmin.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Details Not Updated</p>";
		header("Location:cityadmin.php?msg=$msg");
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
                    <li class="breadcrumb-item active">Edit City Admin</li>
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
                                                placeholder="Enter Admin Name" value="<?php echo $row['name'];?>">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="email" required
                                                value="<?php echo $row['aemail'];?>" placeholder="Enter Admin Email">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Mobile</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="mobile" required
                                                value="<?php echo $row['aphone'];?>" placeholder="Enter Admin Mobile">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Username</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="auser" required
                                                placeholder="Enter Username" value="<?php echo $row['auser'];?>">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Password</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="password" required
                                                placeholder="Enter Password" value="<?php echo $row['apass'];?>">
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