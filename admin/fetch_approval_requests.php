<?php
// Initialize an empty array to hold the records
$records = [];

// Include necessary files and setup database connection
include "../config/config.php";

// SQL query to join the request table with the resources view and user_profile
$sql = "SELECT r.id, r.request_id, r.request_status, r.approval_code, rs.title, rs.description, rs.file_url, rs.image_url, up.user_name, up.user_email, up.user_phone
        FROM request AS r
        JOIN resources AS rs ON r.resource_id = rs.id
        JOIN user_profile AS up ON r.user_id = up.user_id";

// Prepare the SQL statement for execution
$stmt = $conn->prepare($sql);

// Execute the statement
if ($stmt->execute()) {
    // Bind the results to variables
    $stmt->bind_result($id, $request_id, $request_status, $approval_code, $title, $description, $file_url, $image_url, $user_name, $user_email, $user_phone);

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

        // Prepare user description
        $user_details = "Requester Name: $user_name, Email: $user_email, Phone: $user_phone";

        // Add record along with user details to the array
        $records[] = [
            'request_id' => $request_id,
            'id' => $id,
            'request_status' => $request_status,
            'approval_code' => $approval_code,
            'title' => $title,
            'description' => $description,
            'file_url' => $file_url,
            'image_url' => $image_url,
            'user_details' => $user_details
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
