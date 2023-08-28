<?php
include "../config/config.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userid = $_SESSION['user_id'];

$sourcetable = $conn->real_escape_string($_POST['sourcetable']);
$resource_id = (int)$_POST['resource_id'];

$sql = "SELECT review_id, review_text, rating FROM `reviews` WHERE sourcetable = ? AND resource_id = ? AND user_id=?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('sii', $sourcetable, $resource_id, $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $reviews = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    } else {
        // If no records found, initialize the review array with default values
        $reviews[] = array(
            "review_id" => 0,
            "review_text" => "",
            "rating" => 0
        );
    }

    echo json_encode($reviews);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
