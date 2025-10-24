<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM gallery WHERE id = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Image Deleted</p>";
	header("Location:addgallery.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Image Not Deleted</p>";
	header("Location:addgallery.php?msg=$msg");
}
mysqli_close($con);
?>