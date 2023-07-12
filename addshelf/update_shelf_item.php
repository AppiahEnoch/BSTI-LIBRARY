<?php
// Include your database connection configuration
require_once '../config/config.php';

// Check if the necessary POST parameters are set
if (isset($_POST['id']) && (isset($_POST['class1']) || isset($_POST['class2']) || isset($_POST['description']))) {
    $id = $_POST['id'];
    $class1 = $_POST['class1'] ?? null;
    $class2 = $_POST['class2'] ?? null;
    $description = $_POST['description'] ?? null;

    // Prepare the SQL statement
    $sql = "UPDATE shelf SET ";
    $params = [];
    $types = "";

    if ($class1 !== null) {
        $sql .= "class1 = ?, ";
        $params[] = $class1;
        $types .= "s";
    }

    if ($class2 !== null) {
        $sql .= "class2 = ?, ";
        $params[] = $class2;
        $types .= "s";
    }

    if ($description !== null) {
        $sql .= "description = ?, ";
        $params[] = $description;
        $types .= "s";
    }

    $sql = rtrim($sql, ", ");
    $sql .= " WHERE id = ?";
    $params[] = $id;
    $types .= "i";

    $stmt = $conn->prepare($sql);

    // Bind the parameters to the SQL statement
    $stmt->bind_param($types, ...$params);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Item updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating item: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: Missing ID or fields to update']);
}

// Close the connection
$conn->close();
?>
