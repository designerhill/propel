<?php
include("config.php");
$sid = $_GET['id'];
$sql = "DELETE FROM blog WHERE pid = {$sid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Blog Deleted</p>";
	header("Location:blogview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Blog Not Deleted</p>";
	header("Location:blogview.php?msg=$msg");
}
mysqli_close($con);
?>