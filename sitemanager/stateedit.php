<?php
ob_start();
include('header.php');
$error="";
$state='';
$msg="";
if(isset($_POST['insert']))
{
	$sid = $_GET['id'];
	$ustate=$_POST['ustate'];
	if (empty($_POST['ustate'])) {
        $error= "<p class='alert alert-warning'>* Please enter state name</p>";
    } else
     if (! preg_match ("/^[a-zA-z]*$/", $ustate) ) {
        $error = "<p class='alert alert-warning'>* Please enter a valid state name</p>";
    }



	if(!$error){
		$val="select * from state where sname='$ustate' and sid!='$sid'";
		$res=mysqli_query($con,$val) or die(mysqli_error($con));
		$num=mysqli_num_rows($res);
		if($num==0){
	$sql="UPDATE state SET sname = '{$ustate}'  WHERE sid = {$sid}";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>State Updated</p>";
			header("Location:stateadd.php?msg=$msg");
		}
		else
		{
			$msg="<p class='alert alert-warning'>State Not Updated</p>";
			header("Location:stateadd.php?msg=$msg");
		}	
	}
		else
			{
				$msg="<p class='alert alert-warning'>* State Already Added</p>";
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
                    <li class="breadcrumb-item active">State</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Edit State</h1>
                        <?php echo $error;?>
                        <?php echo $msg;?>
                        <?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
                    </div>
                    <?php 
								$sid = $_GET['id'];
								$sql = "SELECT * FROM state where sid = {$sid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h5 class="card-title">State Details</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">State Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="ustate"
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
        <!----End state add section  --->
    </div>
</div>
<?php
include('footer.php');
?>