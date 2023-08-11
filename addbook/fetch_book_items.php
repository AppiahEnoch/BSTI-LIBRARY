<?php
require_once '../config/config.php';

// Prepare the SELECT statement
$query = "SELECT * FROM book order by recdate DESC";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    // Fetch all records
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    // Encode data in JSON format and echo it
    echo json_encode($rows);
} else {
    echo json_encode(array("message" => "0 results"));
}

// Close the connection
$conn->close();
?>
