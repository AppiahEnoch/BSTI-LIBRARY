<?php
include "../config/config.php";

// Perform a query to get the maximum id from the shelf table
$sql = "SELECT Count(id) AS max_id FROM book";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$maxId = $row['max_id'];

// Add 1 to the maximum id
$newId = $maxId + 1;

// Echo the new id to JavaScript
echo $newId;

$conn->close();
?>
