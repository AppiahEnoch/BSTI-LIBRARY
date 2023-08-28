<?php
include "../config/config.php";

$resource_id = $_POST['request_id'];

// Prepare your DELETE SQL query and execute it
$sql = "DELETE FROM request WHERE request_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $resource_id);

if ($stmt->execute()) {
    echo 1;
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}
?>
