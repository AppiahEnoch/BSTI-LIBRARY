<?php
// Include your database connection configuration
require_once '../config/config.php';

// Fetch the ID, column, and value from the request data
$id = $_POST['id'];
$columnIndex = $_POST['column'];
$newValue = $_POST['value'];

// The column names corresponding to the column indices
$columns = array(
    'material_type', 
    'title', 
    'author', 
    'year', 
    'description', 
    'file_url'
);

// Check if the column index is valid
if (!isset($columns[$columnIndex - 1])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid column index']);
    exit;
}

// Get the column name
$column = $columns[$columnIndex - 1];

// Prepare the SQL statement
$sql = "UPDATE ebook SET {$column} = ? WHERE id = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the new value and the ID to the SQL statement
$stmt->bind_param("si", $newValue, $id);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error updating data: ' . $stmt->error]);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
