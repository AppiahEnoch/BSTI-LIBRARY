<?php
require_once '../config/config.php';

// Check if id is provided
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare a delete statement
    $stmt = $conn->prepare("DELETE FROM book WHERE id = ?");

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $id);

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Records deleted successfully. Redirect to landing page
        echo json_encode(array("statusCode"=>200));
    } else{
        echo json_encode(array("statusCode"=>201));
    }
} else {
    // No id provided
    echo json_encode(array("statusCode"=>999));
}

$stmt->close();

?>
