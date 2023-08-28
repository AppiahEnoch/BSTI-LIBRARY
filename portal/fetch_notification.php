<?php
session_start();
include "../config/config.php";
$response = [];
// Fetch all notifications from the notifications table
$query1 = "SELECT * FROM notifications ORDER BY created_at DESC";
$stmt1 = $conn->prepare($query1);

if ($stmt1->execute()) {
    $result1 = $stmt1->get_result();
    $notifications = [];

    while ($row1 = $result1->fetch_assoc()) {
        $notifications[] = $row1;
    }

    $response['notifications'] = $notifications;
} else {
    $response['error'] = "Error fetching notifications: " . $conn->error;
}

// Fetch all records from the request table where user_id matches the session variable
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session
$query2 = "SELECT * FROM request WHERE user_id = ?";
$stmt2 = $conn->prepare($query2);
$stmt2->bind_param("i", $user_id);

if ($stmt2->execute()) {
    $result2 = $stmt2->get_result();
    $requests = [];

    while ($row2 = $result2->fetch_assoc()) {
        $requests[] = $row2;
    }

    $response['requests'] = $requests;
} else {
    $response['error'] = "Error fetching requests: " . $conn->error;
}

echo json_encode($response);
?>
