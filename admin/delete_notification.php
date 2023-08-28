// delete_notification.php
<?php
include "../config/config.php";

$id = $_POST['id'];

$sql = "DELETE FROM notifications WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Notification deleted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
