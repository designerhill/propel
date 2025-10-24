<?php
include("config.php");
$sid = $_GET['id'];
$sql = "DELETE FROM admin WHERE aid = {$sid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Admin Deleted</p>";
	header("Location:cityadmin.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Admin Not Deleted</p>";
	header("Location:cityadmin.php?msg=$msg");
}
mysqli_close($con);
?>