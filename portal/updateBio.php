<?php
session_start();

include "../config/config.php";

$user_id = $_SESSION['user_id']; // Get user_id from session
$field_name = $_POST['field_name'];
$field_value = $_POST['field_value'];

// Try to update the record
$query = "UPDATE user_profile SET $field_name = ? WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('si', $field_value, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $response = ['status' => 'success'];
} else {
    // If update fails, insert a new record
    $query = "INSERT INTO user_profile (user_id, $field_name) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('is', $user_id, $field_value);
    $stmt->execute();

    $response = ['status' => $stmt->affected_rows > 0 ? 'success' : 'failed'];
}

echo json_encode($response);
?>
