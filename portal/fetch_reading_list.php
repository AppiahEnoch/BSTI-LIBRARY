<?php
session_start();
include "../config/config.php";

// Initialize an array to hold the fetched records
$fetchedResources = [];

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user_id from session variable
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    // Fetch records from reading_list table
    $readingListQuery = "SELECT * FROM reading_list WHERE user_id = ?";
    $stmt = $conn->prepare($readingListQuery);

    if ($stmt === false) {
        die("Failed to prepare statement: " . $conn->error);
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Iterate through each record in the reading_list
    while ($row = $result->fetch_assoc()) {
        $resource_id = $row['resource_id'];
        $resourceDetails = [];

        // Query book table
        $bookQuery = "SELECT id, material_type, title, image_url, description FROM book WHERE id = ?";
        $bookStmt = $conn->prepare($bookQuery);
        $bookStmt->bind_param("i", $resource_id);
        $bookStmt->execute();
        $bookResult = $bookStmt->get_result();

        if ($bookResult->num_rows > 0) {
       
            // Fetch details from book table
            $bookDetails = $bookResult->fetch_assoc();
            $resourceDetails = [
                'resource_id' => $bookDetails['id'],
                'resource_type' => 'book',
                'title' => $bookDetails['title'],
                'url' => $bookDetails['image_url'],
                'description' => $bookDetails['description']
            ];
            $fetchedResources[] = $resourceDetails;
            continue;
        }

        // Query ebook table
        $ebookQuery = "SELECT id, material_type, title, file_url, description FROM ebook WHERE id = ?";
        $ebookStmt = $conn->prepare($ebookQuery);
        $ebookStmt->bind_param("i", $resource_id);
        $ebookStmt->execute();
        $ebookResult = $ebookStmt->get_result();
        if ($ebookResult->num_rows > 0) {
            // Fetch details from ebook table
            $ebookDetails = $ebookResult->fetch_assoc();
            
            // Determine the URL based on material_type
            $myUrl = $ebookDetails['file_url']; // Default to file_url
            if (!is_null($ebookDetails['material_type'])) {
                if (strpos($ebookDetails['material_type'], 'word') !== false) {
                    $myUrl = "../devimage/word.png";
                } else {
                    $myUrl = "../devimage/pdf.png";
                }
            }
        
            $resourceDetails = [
                'resource_id' => $ebookDetails['id'],
                'resource_type' => 'ebook',
                'material_type' => $ebookDetails['material_type'],
                'title' => $ebookDetails['title'],
                'url' => $myUrl,  // Use $myUrl here
                'description' => $ebookDetails['description']
            ];
            
            $fetchedResources[] = $resourceDetails;
        }
        
    }

    // Convert the fetched resources to JSON format
    echo json_encode($fetchedResources);

} else {
    echo "user_id is missing.";
}
?>
