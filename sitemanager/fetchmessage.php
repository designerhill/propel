<?php
session_start();
include('../config.php');



// Check if the parameters are set
if (!isset($_POST['pid']) || !isset($_POST['uid'])) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit();
}

// Get PID and UID from POST request
$pid = $_POST['pid'];
$userId = $_POST['uid'];

// Debugging: Log received parameters
error_log("Received PID: " . $pid);
error_log("Received UID: " . $userId);

// Database query to fetch messages
$query = "
   SELECT m.message, m.date, CASE WHEN m.sender = 'Agent' THEN 'Agent' ELSE u.name END AS sender FROM message m LEFT JOIN user u ON m.sender = u.userid WHERE m.projectId = '$pid' AND ( (m.sender = 'Agent' AND m.receiver = '$userId') OR (m.sender = '$userId' AND m.receiver = 'Agent') OR (m.sender = 'Agent' AND m.receiver = '$userId') ) ORDER BY m.date ASC
";

// Execute the query
$result = mysqli_query($con, $query);

// Check for query errors
if (!$result) {
    error_log("SQL Error: " . mysqli_error($con)); // Log SQL error
    echo json_encode(['success' => false, 'error' => 'Database query failed']);
    exit();
}

// Fetch the messages
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