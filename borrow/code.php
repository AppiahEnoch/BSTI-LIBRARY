<?php
include "../config/config.php";
session_start();
function generateRandomCode($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$unique = false;

while(!$unique) {
    // Generate an 8-character random string
    $randomCode = generateRandomCode();

    // Prepare the SQL query to check for the existence of this code
    $stmt = $conn->prepare("SELECT * FROM `request` WHERE `request_id` = ?");
    $stmt->bind_param("s", $randomCode);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // If the code doesn't exist in the table, break the loop
    if($result->num_rows == 0) {
        $unique = true;
    }
}

// Echo the unique code

$_SESSION['requestID']=$randomCode;
echo $randomCode;

// Close the statement and connection
$stmt->close();
$conn->close();
?>
