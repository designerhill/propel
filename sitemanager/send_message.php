<?php
session_start();
include('../config.php'); // Database connection

header('Content-Type: application/json'); // Ensure JSON response

if (isset($_POST['pid'], $_POST['message'], $_POST['username'])) {
    $pid = $_POST['pid'];
    $message = $_POST['message'];
    $receiver = $_POST['username'];
    $sender = 'Agent'; // Static sender value

    if (empty($pid) || empty($message) || empty($receiver)) {
        echo json_encode(['status' => 'error', 'message' => 'Project ID (pid), message, or receiver cannot be empty.']);
        exit();
    }

    // Debug input values
    error_log("PID: $pid, Message: $message, Receiver: $receiver");

    // Verify receiver exists
    $user_query = "SELECT userid FROM user WHERE name = ?";
    $stmt = $con->prepare($user_query);
    $stmt->bind_param("s", $receiver);
    $stmt->execute();

    // Use bind_result() to fetch data
    $stmt->bind_result($receiver_id);
    if (!$stmt->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'Receiver not found in the database.']);
        exit();
    }
    $stmt->close();

    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');

    // Insert message into database
    $insert_query = "
        INSERT INTO message (projectId, sender, message, date, receiver) 
        VALUES (?, ?, ?, ?, ?)
    ";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param("sssss", $pid, $sender, $message, $date, $receiver_id);

    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Message sent successfully.',
            'sender' => $sender,
            'receiver' => $receiver,
            'date' => $date
        ]);
    } else {
        // Log SQL error
        error_log("SQL Error: " . $stmt->error);
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Required fields are missing (pid, message, or username).']);
}
?>