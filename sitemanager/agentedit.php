<?php
ob_start();
require("header.php");

$error="";
$msg="";
if(isset($_POST['add']))
{
    $id=$_REQUEST['id'];
	$name=$_POST['name'];

	$aimage=$_FILES['image']['name'];

	$temp_name  =$_FILES['image']['tmp_name'];
	

    if($temp_name)
	{
	move_uploaded_file($temp_name,"agent/$aimage");
	$sql1 = "UPDATE agent SET image='{$aimage}' WHERE id = {$id}";
	$result1=mysqli_query($con,$sql1);
	}
	
    $sql = "UPDATE agent SET name= '{$name}' WHERE id = {$id}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Agent Updated</p>";
		header("Location:agentview.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Agent Not Updated</p>";
		header("Location:agentview.php?msg=$msg");
	}
}
?>
<style>
.note-editable {
    background-color: #f5f5f5 !important;
    /* Set your desired background color */
}
</style>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Add Blog</li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Blog Details</h4>
                        <?php echo $error; ?>
                        <?php echo $msg; ?>
                    </div>
                    <form method="post" enctype="multipart/form-data">

                        <?php
									
									$id=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from agent where id='$id'");
									$row=mysqli_fetch_array($query);

								
								
								?>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="<?php echo $row['name'];?>"
                                                name="name" required placeholder="Enter Agent Name">
                                        </div>
                                    </div>


                                </div>




                            </div>



                            <div class="row">
                                <div class="col-xl-12">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Image</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="image" type="file">
                                            <img src="agent/<?php echo $row['image'];?>" alt="pimage" height="150"
                                                width="180">
                                        </div>
                                    </div>



                                </div>

                            </div>


                            <input type="submit" value="Submit" class="btn btn-primary" name="add"
                                style="margin-left:200px;">

                        </div>
                    </form>



                </div>
            </div>
        </div>

    </div>
</div>


<script>
$(document).ready(function() {
    $("#summernote").summernote({
        placeholder: 'Enter post content here...',
        height: 300,
        callbacks: {
            onImageUpload: function(files, editor, welEditable) {

                for (var i = files.length - 1; i >= 0; i--) {
                    sendFile(files[i], this);
                }
            }
        }
    });
});

function sendFile(file, el) {
    var form_data = new FormData();
    form_data.append('file', file);
    $.ajax({
        data: form_data,
        type: "POST",
        url: 'blog-upload.php',
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            $(el).summernote('editor.insertImage', url);
        }
    });
}
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<!-- Custom script -->
<script src="js/custom.min.js"></script>
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; <a href="#">Propel</a> 2024</p>
    </div>
</div>
<!-- #/ footer -->
</div>

<!-- Custom script -->
<script src="js/custom.min.js"></script>
<!-- Chartjs chart -->
<script src="assets/plugins/chartjs/Chart.bundle.js"></script>
<!-- Custom dashboard script -->
<script src="js/dashboard-1.js"></script>
</body>

</html>