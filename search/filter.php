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
    die("SQL Query Failed: " . $conn->error);
}





// Process Book results






    if($materialType=="printed_book"||$materialType == null){
        while ($row = $resultsBook->fetch_assoc()) {
            $description = "This book, authored by the talented " . $row['author'] . ", is currently located at shelf number " . $row['shelfno'] . ". The unique identifier for this book is " . $row['uniqueid'] . ". Briefly, the book can be described as follows: " . $row['description'] . ". The book was recorded in our database on " . date("F j, Y, g:i a", strtotime($row['recdate']));
            $results[] = array( 'id'=> $row['id'],'imageUrl' => $row['image_url'], 'title' => $row['title'], 'description' => $description);
        }
    
         }





    if (($materialType == "e-book"|| $materialType == null) && ( $classification ==null) &&($uniqueid==null)) {
        while ($row = $resultsEbook->fetch_assoc()) {

            $url= $row['material_type'];
            // check if url contains  'word'
            if (strpos($url, 'word') !== false) {
                $row['image_url'] = "../devimage/word.png";
            }
            else{
                $row['image_url'] = "../devimage/pdf.png"; 
            }



            $description = "This e-book, penned by the distinguished " . $row['author'] . ", can be summarized as follows: " . $row['description'] . ". This e-book was added to our collection on " . date("F j, Y, g:i a", strtotime($row['recdate']));
            $results[] = array('id'=> ($row['id'])."_ebook",'imageUrl' => $row['image_url'], 'title' => $row['title'], 'description' => $description);
        }
    }






header('Content-Type: application/json');
// Output results
echo json_encode($results);

$conn->close();
?>
