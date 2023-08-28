<?php
// include your connection details
include "../config/config.php";

// fetch the values from POST
$title = $conn->real_escape_string($_POST['title']);
$message = $conn->real_escape_string($_POST['message']);

$sql = "INSERT INTO notifications (title, message) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $title, $message);
    $stmt->execute();
    echo "Notification issued successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
