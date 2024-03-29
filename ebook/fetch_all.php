<?php
require_once '../config/config.php';

$stmt = $conn->prepare("SELECT * FROM ebook ORDER BY id desc");
$stmt->execute();

$result = $stmt->get_result();

$data = array(); // Create an array to hold the data

// Fetch all rows into the array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Encode the array as JSON and output it
header('Content-Type: application/json');
echo json_encode($data);

?>
