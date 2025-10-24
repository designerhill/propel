<?php
include("config.php");
$pid = $_GET['id'];
$sql = "update property set isapproved=0 where  pid = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Disapproved</p>";
	header("Location:userpropertyview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Property Not Disapproved</p>";
	header("Location:userpropertyview.php?msg=$msg");
}
mysqli_close($con);
?>