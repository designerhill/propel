<?php
ob_start();
include("header.php"); 

$error="";
$msg="";
if(isset($_POST['insert']))
{
	$cid = $_GET['id'];
	
	$ustate=$_POST['ustate'];
	$ucity=$_POST['ucity'];
	if (empty($_POST['ucity'])) {
        $error= "<p class='alert alert-warning'>* Please enter city name</p>";
    } else
    if (! preg_match ("/^[a-zA-z]*$/", $ucity) ) {
        $error = "<p class='alert alert-warning'>* Please enter a valid city name</p>";
    }
	if (empty($_POST['ustate'])) {
        $error= "<p class='alert alert-warning'>* Please select state</p>";
    }
	
	if(!empty($ustate) && !empty($ucity))
	{
		$val="select * from city where cname='$city' and cid!='$cid'";
		$res=mysqli_query($con,$val) or die(mysqli_error($con));
		$num=mysqli_num_rows($res);
		if($num==0){
		$sql="UPDATE city SET cname = '{$ucity}' ,sid = '{$ustate}' WHERE cid = {$cid}";
		$result=mysqli_query($con,$sql);
		if($result)
			{
				$msg="<p class='alert alert-success'>City Updated</p>";
				header("Location:cityadd.php?msg=$msg");
			}
			else
			{
				$msg="<p class='alert alert-warning'>City Not Updated</p>";
				header("Location:cityadd.php?msg=$msg");
			}
	}
	else
			{
				$error="<p class='alert alert-warning'>* City Already Added</p>";
			}
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
                    <li class="breadcrumb-item active">Edit City</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Edit City</h1>
                        <?php echo $error;?>
                        <?php echo $msg;?>
                        <?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
                    </div>
                    <?php 
								$cid = $_GET['id'];
								$sql = "SELECT * FROM city where cid = {$cid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h5 class="card-title">City Details</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">State Name</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="ustate">
                                                <option value="">Select</option>
                                                <?php
																		$query1=mysqli_query($con,"select * from state");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
                                                <option value="<?php echo $row1['0']; ?>">
                                                    <?php echo $row1['1']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">City Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="ucity"
                                                value="<?php echo $row['1']; ?>">
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
                    <?php } ?>
                </div>
            </div>
        </div>
        <!----End City add section  --->

    </div>
</div>
<?php
include('footer.php');
?>