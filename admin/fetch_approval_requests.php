<?php
include "../config/config.php";


// Initialize an empty array to hold the records
$records = [];

// SQL query to join the request table with the resources view
$sql = "SELECT r.id, r.request_id, r.request_status, r.approval_code, rs.title, rs.description, rs.file_url, rs.image_url 
        FROM request AS r
        JOIN resources AS rs ON r.resource_id = rs.id";

// Prepare the SQL statement for execution
$stmt = $conn->prepare($sql);

// Execute the statement
if ($stmt->execute()) {
    // Bind the results to variables
    $stmt->bind_result($id, $request_id, $request_status, $approval_code, $title, $description, $file_url, $image_url);
    
    // Fetch all the records
    while ($stmt->fetch()) {
        // Check if image_url is not null
        if (is_null($image_url)) {
            if (strpos($image_url, 'word') !== false) {
                $image_url = "../devimage/word.png";
            } else {
                $image_url = "../devimage/pdf.png";
            }
        }
    
        $records[] = [
            'request_id' => $request_id,
            'id' => $id,
            'request_status' => $request_status,
            'approval_code' => $approval_code,
            'title' => $title,
            'description' => $description,
            'file_url' => $file_url,
            'image_url' => $image_url
        ];
    }
    
    
    // Echo the records as a JSON object
    echo json_encode($records);
} else {
    // Output an error message if the SQL execution fails
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();
?>
