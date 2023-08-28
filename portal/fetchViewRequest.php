<?php
session_start();
include "../config/config.php";

$userID = $_SESSION['user_id']; // Assuming user_id is stored in session

// SQL query to join the 'request' table and 'resources' view based on 'id' and 'resource_id'
$sql = "SELECT 
            r.request_id, 
            r.resource_type,
            r.resource_id,
            res.title, 
            res.author, 
            res.description, 
            res.image_url, 
            res.material_type, 
            res.file_url
        FROM request AS r
        LEFT JOIN resources AS res ON r.resource_id = res.id
        WHERE r.user_id = ?";

// Initialize and prepare the statement
$stmt = $conn->prepare($sql);

// Bind the user ID parameter
$stmt->bind_param("i", $userID);

// Initialize an empty array to hold the user requests
$userRequests = [];

// Execute the query
if ($stmt->execute()) {
    $result = $stmt->get_result();

    // Fetch the results into an associative array
    while ($row = $result->fetch_assoc()) {
        // Check if image_url is not null
        if (is_null($row['image_url'])) {
            if (strpos($row['material_type'], 'word') !== false) {
                $row['image_url'] = "../devimage/word.png";
            } else {
                $row['image_url'] = "../devimage/pdf.png";
            }
        }
        $userRequests[] = $row;
    }
    

    // Output the results as JSON
    echo json_encode($userRequests);
} else {
    // Output an error message if the query failed to execute
    echo json_encode(['error' => $stmt->error]);
}

// Close the statement
$stmt->close();
?>
