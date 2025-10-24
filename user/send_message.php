<?php
session_start();
include('../config.php'); // Include the database connection

if (!isset($_SESSION['user'])) {
    // Redirect to login page if session is not set
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['pid']) && isset($_POST['message'])) {
    $pid = $_POST['pid'];
    $message = $_POST['message'];
    $sender = $_SESSION['user']; // Get the logged-in user's ID

    // Check for empty message or pid
    if (empty($pid) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Project ID (pid) or message cannot be empty']);
        exit();
    }

    $user_query = "SELECT name FROM user WHERE userid = '$sender'";
    $user_result = mysqli_query($con, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);

    if (!$user_row) {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
        exit();
    }

    $username = $user_row['name']; // Session user's name
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');

    // Prepare the SQL query to insert the message using prepared statements
    $stmt = $con->prepare("
        INSERT INTO message (projectId, sender, message, date, receiver) 
        VALUES (?, ?, ?, ?, 'Agent')
    ");
    $stmt->bind_param("ssss", $pid, $sender, $message, $date); // Bind the parameters to the query

    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Message sent successfully',
            'username' => $username, // Return the session user's name
            'date' => $date // Current timestamp
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
    }
} else {
    // If 'pid' or 'message' is not set, return an error
    echo json_encode(['status' => 'error', 'message' => 'pid or message not set']);
}
?>