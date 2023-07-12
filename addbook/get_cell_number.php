<?php
include "../config/config.php";

$shelfnumber = $_POST['id'];

// Prepare and execute a query to get the maximum currentcell from the shelf table
$stmt = $conn->prepare("SELECT max(currentcell) AS currentcell FROM shelf WHERE shelfnumber = ?");
$stmt->bind_param("i", $shelfnumber);  // "i" indicates the variable type is integer

$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$currentcell = $row['currentcell'];


// Echo the new cell number to JavaScript
echo $currentcell;

$stmt->close();
$conn->close();
?>
