<?php
// Include your database connection configuration
require_once '../config/config.php';

// Check if the necessary POST parameter is set
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM shelf WHERE id = ?");

    // Bind the parameter to the SQL statement
    $stmt->bind_param('i', $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Item deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting item: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: Missing ID']);
}

// Close the connection
$conn->close();
?>
