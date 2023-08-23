<?php
include "../config/config.php";

// Check for POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Start the session if it hasn't been started yet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Retrieve user_id from the session
    $userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;

    // Retrieving and sanitizing POST data
    $bookId = mysqli_real_escape_string($conn, $_POST['bookid']);
    $tableName = mysqli_real_escape_string($conn, $_POST['tableName']);
    $numberOfStars = mysqli_real_escape_string($conn, $_POST['numberOfStars']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Checking for an existing review
    $checkQuery = "SELECT review_id FROM `reviews` WHERE user_id = $userId AND resource_id = $bookId AND sourcetable = '$tableName'";
    $result = mysqli_query($conn, $checkQuery);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {  // Review exists, so update it
            $row = mysqli_fetch_assoc($result);
            $reviewId = $row['review_id'];

            $updateQuery = "UPDATE `reviews` SET review_text = '$message', rating = $numberOfStars WHERE review_id = $reviewId";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "Review updated successfully!";
            } else {
                echo "Error updating review: " . mysqli_error($conn);
            }

        } else {  // Review does not exist, so insert a new one
            $insertQuery = "INSERT INTO `reviews` (user_id, resource_id, sourcetable, review_text, rating) VALUES ($userId, $bookId, '$tableName', '$message', $numberOfStars)";
            $insertResult = mysqli_query($conn, $insertQuery);

            if ($insertResult) {
                echo "Review inserted successfully!";
            } else {
                echo "Error inserting review: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error checking for review: " . mysqli_error($conn);
    }
}
?>
