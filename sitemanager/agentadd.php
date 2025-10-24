<?php
include('header.php');
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$name=$_POST['name'];

	$aimage=$_FILES['aimage']['name'];

	$temp_name  =$_FILES['aimage']['tmp_name'];
	
	
	if($temp_name)
	{
	move_uploaded_file($temp_name,"agent/$aimage");
	}

	
	
	
	$sql="INSERT INTO agent (name,image)
	VALUES('$name','$aimage')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Agent Inserted Successfully</p>";
					
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
                    <li class="breadcrumb-item active">Add Agent</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Agent Details</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">Agent Detail</h5>
                            <?php echo $error; ?>
                            <?php echo $msg; ?>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="name" required
                                                placeholder="Enter Agent Name">
                                        </div>
                                    </div>


                                </div>




                            </div>



                            <h4 class="card-title">Image</h4>
                            <div class="row">
                                <div class="col-xl-6">

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Image</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="aimage" type="file" required>
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

<?php
include('footer.php');
?>