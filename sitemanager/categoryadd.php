<?php
include('header.php');
$error="";
$msg="";
if(isset($_POST['insert']))
{
	$category=$_POST['category'];

	$icon=$_FILES['aimage']['name'];
	$temp_name  =$_FILES['aimage']['tmp_name'];
	move_uploaded_file($temp_name,"icon/$icon");
	
	if (empty($_POST['category'])) {
        $error= "<p class='alert alert-warning'>* Please enter category name</p>";
    } else
    if (! preg_match ("/^[a-zA-z]*$/", $category) ) {
        $error = "<p class='alert alert-warning'>* Please enter a valid category name</p>";
    }

	if(!empty($category)){
		$sql="insert into category (cname,icon) values('$category','$icon')";
		$result=mysqli_query($con,$sql);
		if($result)
			{
				$msg="<p class='alert alert-success'>Category Inserted Successfully</p>";
						
			}
			else
			{
				$error="<p class='alert alert-warning'>* Category Not Inserted</p>";
			}
	}
	else{
		$error = "<p class='alert alert-warning'>* Fill all the Fields</p>";
	}
	
}
?>
<script>
function confirmDelete(disUrl) {
    if (confirm("Are you sure you want to delete this category?")) {
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
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Add Category</h1>
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
                                    <h5 class="card-title">Category Details</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Category Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="category"
                                                placeholder="Enter Category Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Icon</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="aimage" type="file" required="">
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
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
													
												$query=mysqli_query($con,"select * from category");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                        <tr>

                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['1']; ?></td>
                                            <td><a href="categoryedit.php?id=<?php echo $row['0']; ?>"><button
                                                        class="btn btn-primary btn-sm">Edit</button></a>

                                                <a
                                                    href="javascript:confirmDelete('categorydelete.php?id=<?php echo $row['0']; ?>')"><button
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