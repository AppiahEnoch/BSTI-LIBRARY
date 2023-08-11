<?php
require_once '../config/config.php';
// Prepare the DELETE statement
$stmt = $conn->prepare("DELETE FROM user1");
$stmt->execute();
$stmt->close();
// Close the connection
$conn->close();
echo 1;
?>
