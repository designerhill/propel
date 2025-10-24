<?php
session_start();
include('../config.php');
if (!isset($_SESSION['user'])) {
    // Redirect to login page if session is not set
    header("Location: ../login.php");
    exit();
}
$uid=$_SESSION['user'];
if (!isset($_POST['pid'])) {
    echo json_encode(['success' => false, 'error' => "Missing 'pid' parameter"]);
    exit();
}

$pid = $_POST['pid'];

// Debugging: Log pid value
error_log("Received PID: " . $pid);

// Your database query to fetch messages
$query = "
      SELECT m.message, m.date, CASE WHEN m.sender = 'Agent' THEN 'Agent' ELSE u.name END AS sender FROM message m LEFT JOIN user u ON m.sender = u.userid WHERE m.projectId = '$pid' AND ( (m.sender = 'Agent' AND m.receiver = '$uid') OR (m.sender = '$uid' AND m.receiver = 'Agent') OR (m.sender = 'Agent' AND m.receiver = '$uid') ) ORDER BY m.date ASC
";

$result = mysqli_query($con, $query);

// Check for query errors
if (!$result) {
    echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
    exit();
}

// Fetch all messages
$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'sender' => $row['sender'],
        'message' => $row['message'],
        'date' => $row['date']
    ];
}

// Return messages as JSON
echo json_encode(['success' => true, 'messages' => $messages]);

?>