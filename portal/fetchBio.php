<?php
session_start();

include "../config/config.php";
$user_id=$_SESSION['user_id'];

$query = "SELECT * FROM user_profile WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
echo json_encode($data);

?>
