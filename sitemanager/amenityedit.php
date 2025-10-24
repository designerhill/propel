<?php
ob_start();
require("header.php"); 

$error="";
$msg="";
if(isset($_POST['insert']))
{
	$sid = $_GET['id'];
	$category=$_POST['category'];

	$icon=$_FILES['aimage']['name'];
	$temp_name  =$_FILES['aimage']['tmp_name'];
	move_uploaded_file($temp_name,"amenity/$icon");
	if (empty($_POST['category'])) {
        $error= "<p class='alert alert-warning'>* Please enter amenity name</p>";
    } else
    if (! preg_match ("/^[a-zA-z]*$/", $category) ) {
        $error = "<p class='alert alert-warning'>* Please enter a valid amenity name</p>";
    }

	if(!empty($category)){
	$sql="UPDATE amenities SET aname = '{$category}',icon='$icon'  WHERE aid = {$sid}";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Amenity Updated</p>";
			header("Location:amenityadd.php?msg=$msg");
		}
		else
		{
			$msg="<p class='alert alert-warning'>Amenity Not Updated</p>";
			header("Location:amenityadd.php?msg=$msg");
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
                    <li class="breadcrumb-item active">Amenity</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Edit Amenity</h1>

                    </div>
                    <?php 
								$sid = $_GET['id'];
								$sql = "SELECT * FROM amenities where aid = {$sid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h5 class="card-title">Amenity Details</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Amenity Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="category"
                                                value="<?php echo $row['1']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Icon</label>
                                        <div class="col-lg-9">
                                            <img src="icon/<?php echo $row['2'];?>" class="img-fluid mb-2" />
                                            <input class="form-control" name="aimage" type="file">
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