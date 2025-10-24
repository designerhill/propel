<?php
include('config.php');
session_start();
error_reporting(0);

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Use query parameters to filter the data if provided
$city = isset($_POST['city']) ? mysqli_real_escape_string($con, $_POST['city']) : '';
$keyword = isset($_POST['keyword']) ? mysqli_real_escape_string($con, $_POST['keyword']) : '';
$ptype = isset($_POST['ptype']) ? mysqli_real_escape_string($con, $_POST['ptype']) : '';
$ftype = isset($_POST['ftype']) ? mysqli_real_escape_string($con, $_POST['ftype']) : '';
$posession = isset($_POST['posession']) ? mysqli_real_escape_string($con, $_POST['posession']) : '';
$ownership = isset($_POST['ownership']) ? mysqli_real_escape_string($con, $_POST['ownership']) : '';
$posessionstatus = isset($_POST['posessionstatus']) ? mysqli_real_escape_string($con, $_POST['posessionstatus']) : '';

$query = "SELECT * FROM property WHERE stype='Rent' AND isapproved=1";

// Apply filters to the query if set
if ($city) {
    $query .= " AND city = '$city'";
}
if ($keyword) {
    $query .= " AND title LIKE '%$keyword%'  or title LIKE '%$keyword%'";
}
if ($ptype) {
    $query .= " AND type = '$ptype'";
}
if ($ftype) {
    $query .= " AND ftype = '$ftype'";
}
if ($posession) {
    $query .= " AND posession = '$posession'";
}
if ($ownership) {
    $query .= " AND ownership = '$ownership'";
}
if ($posessionstatus) {
    $query .= " AND posessionstatus = '$posessionstatus'";
}

$query .= " LIMIT $offset, $limit";

$result = mysqli_query($con, $query);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>