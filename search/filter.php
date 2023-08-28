<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../config/config.php";

// Get POST data and sanitize it
$title = isset($_POST['title']) ? $conn->real_escape_string(trim($_POST['title'])) : null;
$author = isset($_POST['author']) ? $conn->real_escape_string(trim($_POST['author'])) : null;
$materialType = isset($_POST['material_type']) ? $conn->real_escape_string(trim($_POST['material_type'])) : null;

if($materialType=="none"){
$materialType=null;
}

$classification = isset($_POST['classification']) ? $conn->real_escape_string(trim($_POST['classification'])) : null;
$uniqueid = isset($_POST['uniqueId']) ? $conn->real_escape_string(trim($_POST['uniqueId'])) : null;

// Initialize base SQL queries
$sqlBook = "SELECT id, title, author, description, shelfno, uniqueid, image_url, recdate, class1 FROM  book_shelf_view WHERE 1=1";
$sqlEbook = "SELECT id, material_type, title, author, description, file_url as image_url, recdate FROM ebook WHERE 1=1";

// Add conditions to the SQL queries based on which filters the user provided
if ($materialType !== null) {
   // $sqlBook .= " AND material_type  LIKE '%$materialType%'";
    //$sqlEbook .= " AND material_type   LIKE '%$materialType%'";
}
if ($title !== null) {
    $sqlBook .= " AND title LIKE '%$title%'";
    $sqlEbook .= " AND title LIKE '%$title%'";
}
if ($author !== null) {
    $sqlBook .= " AND author LIKE '%$author%'";
    $sqlEbook .= " AND author LIKE '%$author%'";
}
if ($uniqueid !== null) {
    $sqlBook .= " AND uniqueid LIKE '%$uniqueid%'";
}

if (strcasecmp($classification,"none") == 0){
    $classification=null;
}

if ($classification !== null) {
    $sqlBook .= " AND class1 LIKE '%$classification%'";
}

// Execute queries and fetch results
$resultsBook = $conn->query($sqlBook);
$resultsEbook = $conn->query($sqlEbook);

// Initialize results array
$results = array();

// Check if queries are successful, if not, handle error
if ($resultsBook === false || $resultsEbook === false) {
    die("SQL Query Failed2: " . $conn->error);
}





// Process Book results




function assembleDescription($row, $type) {
    if ($type == "printed_book") {
        return "This book, authored by the talented " . $row['author'] . 
               ", is currently located at shelf number " . $row['shelfno'] . 
               ". The unique identifier for this book is " . $row['uniqueid'] . 
               ". Briefly, the book can be described as follows: " . $row['description'] . 
               ". The book was recorded in our database on " . date("F j, Y, g:i a", strtotime($row['recdate']));
    } elseif ($type == "e-book") {
        return "This e-book, authored by the talented " . $row['author'] . 
               ", is available in our electronic collection. The unique identifier for this e-book is " . 
               $row['id'] . ". Briefly, the e-book can be described as follows: " . 
               $row['description'] . ". This e-book was added to our collection on " . 
               date("F j, Y, g:i a", strtotime($row['recdate']));
    }
    return "";
}

function fetchResults($resultSet, $type, $classification, $uniqueid) {
    global $results;
    while ($row = $resultSet->fetch_assoc()) {
        $description = assembleDescription($row, $type);
        $reviewData = getReviews($row['id'], $type == "printed_book" ? "book_shelf_view" : "ebook");
        $latestReview = isset($reviewData['reviews'][0]) ? $reviewData['reviews'][0] : ["message" => "No reviews yet", "rating" => "No ratings yet"];
        $results[] = [
            'id' => $type == "e-book" ? $row['id'] . "_ebook" : $row['id'],
            'imageUrl' => $type == "e-book" ? (strpos($row['material_type'], 'word') !== false ? "../devimage/word.png" : "../devimage/pdf.png") : $row['image_url'],
            'title' => $row['title'],
            'description' => $description,
            'latestReviewMessage' => $latestReview['message'],
            'latestReviewRating' => $latestReview['rating'],
            'allReviews' => $reviewData['reviews'],
            'averageRating' => $reviewData['averageRating']
        ];
    }
}

if (empty($materialType) || $materialType == "printed_book") {
    fetchResults($resultsBook, "printed_book", null, null);
}

if (empty($materialType) || $materialType == "e-book") {
    if (empty($classification) && empty($uniqueid)) {
        fetchResults($resultsEbook, "e-book", $classification, $uniqueid);
    }
}

header('Content-Type: application/json');
echo json_encode($results);
$conn->close();







function getReviews($materialId, $type) {
    global $conn;

    // Decide the table based on type (book or ebook)
    $sourceTable = ($type == "ebook") ? "ebook" : "book";

    $reviewsQuery = "SELECT * FROM `reviews` WHERE resource_id = $materialId AND sourcetable = '$sourceTable'";
    $reviewResult = $conn->query($reviewsQuery);

    $reviews = [];
    $totalRating = 0;
    $reviewCount = 0;
    while ($reviewRow = $reviewResult->fetch_assoc()) {
        $reviews[] = [
            'message' => $reviewRow['review_text'],
            'rating' => $reviewRow['rating'],
            'source_table' => $reviewRow['sourcetable'],
            'reID' => $reviewRow['resource_id']
        ];
        $totalRating += $reviewRow['rating'];
        $reviewCount++;
    }

    $nn=3;

    // Compute the average rating
    $averageRating = ($reviewCount > 0) ? $totalRating / $reviewCount : 0;

    return ['reviews' => $reviews, 'averageRating' => $averageRating];
}
