<?php
include "../config/config.php";

$sql = "SELECT * FROM notifications";
$result = $conn->query($sql);

$notifications = array();

while($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

echo json_encode($notifications);

$conn->close();
?>
