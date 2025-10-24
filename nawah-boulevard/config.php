<?php

session_start();

$host = "localhost"; /* Host name */
$user = "propel_dbuser"; /* User */
$password = "4USl?6k0?*"; /* Password */
$dbname = "propel_plusdb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}