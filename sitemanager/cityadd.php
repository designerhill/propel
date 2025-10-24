<?php
include('header.php');
$error="";
$msg="";
$city='';
if(isset($_POST['insert']))
{
	$state=$_POST['state'];
	$city=$_POST['city'];

	if (empty($_POST['city'])) {
        $error= "<p class='alert alert-warning'>* Please enter city name</p>";
    } else
    if (! preg_match ("/^[a-zA-z]*$/", $city) ) {
        $error = "<p class='alert alert-warning'>* Please enter a valid city name</p>";
    }
	if (empty($_POST['state'])) {
        $error= "<p class='alert alert-warning'>* Please select state</p>";
    }
	
	if(!empty($state) && !empty($city)){
		$val="select * from city where cname='$city'";
		$res=mysqli_query($con,$val) or die(mysqli_error($con));
		$num=mysqli_num_rows($res);
		if($num==0){
		$sql="insert into city (cname,sid) values('$city','$state')";
		$result=mysqli_query($con,$sql);
		if($result)
			{
				$msg="<p class='alert alert-success'>City Inserted Successfully</p>";
				echo "<meta http-equiv='refresh' content='0'>";
						
			}
			else
			{
				$error="<p class='alert alert-warning'>* City Not Inserted</p>";
			}
	}
	else
			{
				$error="<p class='alert alert-warning'>* City Already Added</p>";
			}
		}
	
}

?>
<script>
function confirmDelete(disUrl) {
    if (confirm("Are you sure you want to delete this city?")) {
        document.location = disUrl;
    }
}
</script>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">City</li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Add City</h1>
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
                                    <h5 class="card-title">City Details</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">State Name</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="state" required>
                                                <option value="">Select</option>
                                                <?php
																		$query1=mysqli_query($con,"select * from state");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
                                                <option value="<?php echo $row1['0']; ?>" class="text-captalize">
                                                    <?php echo $row1['1']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">City Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="city" required
                                                placeholder="Enter City Name" value="<?php echo $city;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <input type="submit" class="btn btn-success btn-sm" value="Submit" name="insert"
                                    style="margin-left:200px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!----End City add section  --->
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-member">
                            <div class="table-responsive">
                                <table class="table table-xs">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>City</th>
                                            <!-- <th>State ID</th> -->
                                            <th>State</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
													
												$query=mysqli_query($con,"select city.*,state.sname from city,state where city.sid=state.sid");
												$cnt=1;
												while($row=mysqli_fetch_array($query))
													{
											?>
                                        <tr>

                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['1']; ?></td>
                                            <!-- <td><?php echo $row['2']; ?></td> -->
                                            <td><?php echo $row['sname']; ?></td>
                                            <td><a href="cityedit.php?id=<?php echo $row['0']; ?>"><button
                                                        class="btn btn-primary btn-sm">Edit</button></a>
                                                <a
                                                    href="javascript:confirmDelete('citydelete.php?id=<?php echo $row['0']; ?>')"><button
                                                        class="btn btn-danger btn-sm">Delete</button></a>
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>

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