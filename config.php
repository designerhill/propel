<?php

	$con = mysqli_connect("localhost","root","","propel");
	// $con = mysqli_connect("localhost","propel_dbuser","4USl?6k0?*","propel_plusdb");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>