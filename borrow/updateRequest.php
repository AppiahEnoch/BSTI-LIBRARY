<?php
session_start();
include "../config/config.php";

$resource_id = $_POST['id']; // This corresponds to 'resource_id' in the table
$tableName = $_POST['tableName'];
$requestID = $_SESSION['requestID']; // Retrieve the request ID from the session variable
$userID = $_SESSION['user_id']; // Assuming user_id is stored in session

// Check if the record already exists
$check_sql = "SELECT * FROM request WHERE user_id = ? AND resource_id = ? AND resource_type = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("iis", $userID, $resource_id, $tableName);

$check_stmt->execute();
$check_result = $check_stmt->get_result();
$check_stmt->close();

if ($check_result->num_rows > 0) {
    // Update the existing record
    $update_sql = "UPDATE request SET request_id = ? WHERE user_id = ? AND resource_id = ? AND resource_type = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("siis", $requestID, $userID, $resource_id, $tableName);
    
    if ($update_stmt->execute()) {
        echo "Data updated successfully";
    } else {
        echo "Error: " . $update_stmt->error;
    }

    $update_stmt->close();
} else {
    // Insert a new record, 'id' is auto-incremented so we don't need to provide it
    $insert_sql = "INSERT INTO request (user_id, resource_id, resource_type, request_id) VALUES (?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("iiss", $userID, $resource_id, $tableName, $requestID);
    
    if ($insert_stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $insert_stmt->error;
    }

    $insert_stmt->close();
}
?>
