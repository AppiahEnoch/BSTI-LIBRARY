<?php
include "../config/config.php";
$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE `request` SET request_status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $status, $id);

if ($stmt->execute()) {
    echo "Status updated successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
