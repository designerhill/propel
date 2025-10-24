<?php
include("config.php");
$sid = $_GET['id'];
$sql = "DELETE FROM category WHERE cid = {$sid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Category Deleted</p>";
	header("Location:categoryadd.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Category Not Deleted</p>";
	header("Location:categoryadd.php?msg=$msg");
}
mysqli_close($con);
?>