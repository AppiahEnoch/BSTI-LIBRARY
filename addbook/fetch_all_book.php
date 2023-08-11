<?php
// Include your database connection configuration
require_once '../config/config.php';

// Prepare the SQL statement
$sql = "SELECT * FROM book order by recdate desc";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Execute the statement
if ($stmt->execute()) {
    // Get the result
    $result = $stmt->get_result();

    // Fetch all data
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Return the data as JSON
    echo json_encode(['status' => 'success', 'data' => $data]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error fetching data: ' . $stmt->error]);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
