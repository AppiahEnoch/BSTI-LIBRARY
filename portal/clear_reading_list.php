<?php
session_start();
include "../config/config.php";

$user_id = $_SESSION['user_id'];  // Assuming user_id is stored in session

if (isset($user_id)) {
  // SQL query to clear records
  $sql = "DELETE FROM reading_list WHERE user_id = ?";
  
  // Prepare statement
  $stmt = $conn->prepare($sql);
  
  // Bind parameter
  $stmt->bind_param("i", $user_id);
  
  // Execute statement
  if ($stmt->execute()) {
    echo "success";
  } else {
    echo "error";
  }

  // Close statement
  $stmt->close();
} else {
  echo "No user_id found in session";
}
?>
