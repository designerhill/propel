<?php
include('config.php');
session_start();
error_reporting(0);

// Get page number for pagination, default is 1
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$limit = 10; // Number of records per request
$offset = ($page - 1) * $limit; // Calculate the offset for pagination

// Filter parameters from AJAX
$stype = 'Buy';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$ptype = isset($_POST['ptype']) ? $_POST['ptype'] : '';
$ftype = isset($_POST['ftype']) ? $_POST['ftype'] : '';
$posession = isset($_POST['posession']) ? $_POST['posession'] : '';
$ownership = isset($_POST['ownership']) ? $_POST['ownership'] : '';
$posessionstatus = isset($_POST['posessionstatus']) ? $_POST['posessionstatus'] : '';

// Start building the query
$query1 = "SELECT * FROM property WHERE isapproved = 1";

// Add filters dynamically
if ($city != '') {
    $query1 .= " AND city = '$city'";
}
if ($keyword != '') {
    $query1 .= " AND pcontent LIKE '%$keyword%' or title LIKE '%$keyword%'";
}
if ($ptype != '') {
    $query1 .= " AND type = '$ptype'";
}
if ($ftype != '') {
    $query1 .= " AND ftype = '$ftype'";
}
if ($stype != '') {
    $query1 .= " AND stype = '$stype'";
}
if ($posession != '') {
    $query1 .= " AND posessiondate = '$posession'";
}
if ($ownership != '') {
    $query1 .= " AND ownership = '$ownership'";
}
if ($posessionstatus != '') {
    $query1 .= " AND posessionstatus = '$posessionstatus'";
}

// Add pagination to the query
$query1 .= " LIMIT $limit OFFSET $offset";

// Execute the query
$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));

// Fetch results
$data = [];
while ($row = mysqli_fetch_assoc($result1)) {
    $data[] = $row;
}

// Return results as JSON
echo json_encode($data);
?>