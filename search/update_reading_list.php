<?php
session_start();
include "../config/config.php";

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user_id and resource_type from session variables
$user_id = $_SESSION['user_id'] ?? null;


// Get resourceID from AJAX POST request
$resource_id = $_POST['resourceID'] ?? null;
$resource_type = $_POST['tableName'] ?? null;

if ($user_id && $resource_id && $resource_type) {
    // Prepare SQL query to check if a record already exists
    $checkQuery = "SELECT * FROM reading_list WHERE user_id = ? AND resource_id = ?";
    $stmt = $conn->prepare($checkQuery);

    if ($stmt === false) {
        die("Failed to prepare statement: " . $conn->error);
    }
    
    $stmt->bind_param("ii", $user_id, $resource_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Record already exists, update the resource_type
        $updateQuery = "UPDATE reading_list SET resource_type = ? WHERE user_id = ? AND resource_id = ?";
        $stmt = $conn->prepare($updateQuery);
        
        if ($stmt === false) {
            die("Failed to prepare statement for update: " . $conn->error);
        }
        
        $stmt->bind_param("sii", $resource_type, $user_id, $resource_id);
        $stmt->execute();
        echo 2;
    } else {
        // Record does not exist, perform an INSERT
        $insertQuery = "INSERT INTO reading_list (user_id, resource_id, resource_type) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        
        if ($stmt === false) {
            die("Failed to prepare statement for insert: " . $conn->error);
        }

        $stmt->bind_param("iis", $user_id, $resource_id, $resource_type);
        $stmt->execute();
        echo 1;
    }
} else {
    echo "user_id, resourceID, or resource_type is missing.";
}
?>
