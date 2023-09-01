<?php
// Your required lines
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";


// Function to fetch records
function fetchRecordByRegCode($code) {
    global $conn;

    $sql = "SELECT mobile, email FROM regcode WHERE code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        return $result->fetch_assoc(); // returns associative array of fetched record
    } else {
        return null;
    }
}

// Receive POST data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST["code"] ?? "";

    // Call the function
    $result = fetchRecordByRegCode($code);

    // Handle the result
    if ($result !== null) {
        // Output the data as a JSON response
        echo json_encode($result);
    } else {
        // No record found for the code
        echo json_encode(['error' => 'Invalid registration code']);
    }
} else {
    // Invalid request method
    echo json_encode(['error' => 'Invalid request method']);
}
?>
