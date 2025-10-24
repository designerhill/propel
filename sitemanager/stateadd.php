<?php
ob_start();
include('header.php');
$error="";
$state='';
$msg="";
if(isset($_POST['insert']))
{
	$state=$_POST['state'];

	if (empty($_POST['state'])) {
        $error= "<p class='alert alert-warning'>* Please enter state name</p>";
    } else
     if (! preg_match ("/^[a-zA-z]*$/", $state) ) {
        $error = "<p class='alert alert-warning'>* Please enter a valid state name</p>";
    }



	if(!$error){
		$val="select * from state where sname='$state'";
		$res=mysqli_query($con,$val) or die(mysqli_error($con));
		$num=mysqli_num_rows($res);
		if($num==0){
		$sql="insert into state (sname) values('$state')";
		$result=mysqli_query($con,$sql);
		if($result)
			{
				$msg="<p class='alert alert-success'>State Inserted Successfully</p>";
				echo "<meta http-equiv='refresh' content='0'>";
						
			}
			else
			{
				$error="<p class='alert alert-warning'>* State Not Inserted</p>";
			}
	}
	else
			{
				$error="<p class='alert alert-warning'>* State Already Added</p>";
			}
}

}
?>
<script>
function confirmDelete(disUrl) {
    if (confirm("Are you sure you want to delete this state?")) {
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
                    <li class="breadcrumb-item active">State</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Add State</h1>
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
                                    <h5 class="card-title">State Details</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">State Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="state" required
                                                placeholder="Enter State Name" value="<?php echo $state;?>">
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
                                            <th>State</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
													
												$query=mysqli_query($con,"select * from state");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                        <tr>

                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['1']; ?></td>
                                            <td><a href="stateedit.php?id=<?php echo $row['0']; ?>"><button
                                                        class="btn btn-primary btn-sm">Edit</button></a>
                                                <a
                                                    href="javascript:confirmDelete('statedelete.php?id=<?php echo $row['0']; ?>')"><button
                                                        class="btn btn-danger btn-sm">Delete</button></a>

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