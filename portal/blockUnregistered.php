<?php
// Required files and session start
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";


function checkUserIDExists($user_id, $conn) {
  $query = "SELECT * FROM user_profile WHERE user_id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if($result->num_rows > 0) {
    return true;
  } else {
 echo 0;
    return false;
  }
}

$user_id = $_SESSION['user_id']; // Getting user_id from session


checkUserIDExists($user_id, $conn);
?>
