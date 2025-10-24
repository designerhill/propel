<?php
include("config.php");
$sid = $_GET['id'];
$sql = "DELETE FROM amenities WHERE aid = {$sid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Amenity Deleted</p>";
	header("Location:amenityadd.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Amenity Not Deleted</p>";
	header("Location:amenityadd.php?msg=$msg");
}
mysqli_close($con);
?>