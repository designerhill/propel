<?php
include("config.php");
$sid = $_GET['id'];
$sql = "DELETE FROM agent WHERE id = {$sid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Agent Deleted</p>";
	header("Location:agentview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Agent Not Deleted</p>";
	header("Location:agentview.php?msg=$msg");
}
mysqli_close($con);
?>