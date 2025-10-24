<?php
include('header.php');
$error="";
$msg="";
if(isset($_POST['add']))
{
	
    function slug($text)
    {

        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

	$title=$_POST['title'];
	$content=addslashes($_POST['content']);
	
	$meta_title=addslashes($_POST['meta_title']);
    $keyword=addslashes($_POST['keyword']);
    $description=addslashes($_POST['description']);
    $engpost = str_replace(array('\'', '"'), '', $title);
    $arr = explode(" ", $engpost);
    $slug = implode("-", $arr);
	$aimage=$title.$_FILES['aimage']['name'];

	$temp_name  =$_FILES['aimage']['tmp_name'];
	
	
	if($temp_name)
	{
	move_uploaded_file($temp_name,"blog/$aimage");
	}

	
	
	
    $sql="INSERT INTO blog (title,pcontent,pimage,meta_description, meta_title, meta_keyword, slug)
	VALUES('$title','$content','$aimage','$meta_title','$keyword','$description','$slug')";
	
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Blog Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Something went wrong. Please try again</p>";
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
                        <h4 class="card-title">Add Blog Details</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">SEO Data</h5>
                            <div class="row">
                                <div class="col-xl-12">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Title</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="meta_title" required
                                                placeholder="Enter Meta Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Keyword</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="keyword" required
                                                placeholder="Enter Meta Keyword"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Description</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="description" required
                                                placeholder="Enter Meta Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title">Blog Detail</h5>
                            <?php echo $error; ?>
                            <?php echo $msg; ?>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="title" required
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Content</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" id="summernote" name="content" rows="10" i
                                                cols="30" required></textarea>
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
        url: 'editor-upload.php',
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