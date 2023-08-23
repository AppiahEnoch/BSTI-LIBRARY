<?php
include "../config/config.php";

// Check if the request contains an ID and a table name
if (!isset($_POST['id']) || !isset($_POST['table'])) {
    http_response_code(400);
    echo "Invalid request.";
    exit();
}

$id = $conn->real_escape_string($_POST['id']);
$tableName = $conn->real_escape_string($_POST['table']);

// Prepare the SQL statement based on the table name
if ($tableName === "book_shelf_view") {
    $stmt = $conn->prepare("SELECT * FROM book_shelf_view WHERE id = ?");
} else if ($tableName === "ebook") {
    $stmt = $conn->prepare("SELECT * FROM ebook WHERE id = ?");
} else {
    http_response_code(400);
    echo "Invalid table name.";
    exit();
}

// Bind the ID to the SQL statement and execute it
$stmt->bind_param("i", $id);
$stmt->execute();

// Fetch the results
$result = $stmt->get_result();
$data = $result->fetch_assoc();



// Check if we have data
if ($data) {
    // Generate description based on the table name
    $description = '';
    $bookDescriptions=null;
    $ebookDescriptions =null;

    if($tableName === "book_shelf_view") {
        $bookDescriptions = [
            "Immerse yourself in the enchanting world of literature with \"" . $data['title'] . "\", meticulously crafted by " . $data['author'] . ". This masterpiece, tucked away on our shelf number " . $data['shelfno'] . ", is uniquely recognized by " . $data['uniqueid'] . ". Explore its essence: " . $data['description'] . ". We were privileged to introduce this gem to our collection in " . (new DateTime($data['materialdate']))->format("Y") . ". A literary adventure awaits you!",
            "Experience the fascinating tale of \"" . $data['title'] . "\", masterfully penned by " . $data['author'] . ". Nestled on our shelf number " . $data['shelfno'] . ", its unique identity is " . $data['uniqueid'] . ". Briefly, the book unfolds as: " . $data['description'] . ". It was honorably added to our extensive collection in the year " . (new DateTime($data['materialdate']))->format("Y") . ". Embark on a mesmerizing journey of words!",
            "Step into the captivating world of \"" . $data['title'] . "\", a literary masterpiece by " . $data['author'] . ". Occupying a place of pride on our shelf number " . $data['shelfno'] . ", it can be identified uniquely by " . $data['uniqueid'] . ". Here's a brief glimpse into the book: " . $data['description'] . ". It became a part of our esteemed collection in the year " . (new DateTime($data['materialdate']))->format("Y") . ". Dive into this thrilling literary voyage!",
            "Discover the captivating narrative of \"" . $data['title'] . "\", artfully created by " . $data['author'] . ". This gem, residing on our shelf number " . $data['shelfno'] . ", is known by the unique identifier " . $data['uniqueid'] . ". Let's dive into a brief description: " . $data['description'] . ". It was catalogued in our database in the year " . (new DateTime($data['materialdate']))->format("Y") . ". Enjoy this fascinating journey into literature!",
            "Uncover the enchanting journey within \"" . $data['title'] . "\", carefully penned by " . $data['author'] . ". It sits gracefully on our shelf number " . $data['shelfno'] . ", known by its unique identifier " . $data['uniqueid'] . ". Here's a sneak peek: " . $data['description'] . ". It was recorded in our database in the year " . (new DateTime($data['materialdate']))->format("Y") . ". Get ready for a captivating literary exploration!"
            // Continue for more descriptions...
        ];
    }




if($tableName === "ebook") {
    $ebookDescriptions = [
        "Commence a digital journey with \"" . $data['title'] . "\", an engaging eBook authored by " . $data['author'] . ". Released in " . $data['year'] . ", it offers an enticing narrative that's both compelling and enlightening. Briefly, it goes like this: " . $data['description'] . ". It became part of our wide-ranging collection on " . date("F j, Y, g:i a", strtotime($data['recdate'])) . ". Get ready for a gripping digital reading experience!",
        "Step into the digital world of \"" . $data['title'] . "\", a captivating eBook penned by " . $data['author'] . ". Making its debut in " . $data['year'] . ", it tells an intriguing story. A quick summary: " . $data['description'] . ". It was added to our esteemed collection on " . date("F j, Y, g:i a", strtotime($data['recdate'])) . ". Prepare yourself for an enthralling digital journey!",
        "Explore the enticing narrative of \"" . $data['title'] . "\", an eBook finely crafted by " . $data['author'] . ". Published in " . $data['year'] . ", it narrates a tale that is both appealing and thought-provoking. A brief look at the plot: " . $data['description'] . ". It was incorporated into our prestigious collection on " . date("F j, Y, g:i a", strtotime($data['recdate'])) . ". Enjoy this fascinating digital literary voyage!",
        "Uncover the mesmerizing story of \"" . $data['title'] . "\", an eBook skillfully written by " . $data['author'] . ". Introduced to the digital world in " . $data['year'] . ", it unfolds an engaging narrative. A glimpse into the book: " . $data['description'] . ". It was catalogued in our collection on " . date("F j, Y, g:i a", strtotime($data['recdate'])) . ". Gear up for a captivating digital literary adventure!",
        "Immerse in the digital tale of \"" . $data['title'] . "\", an eBook artfully constructed by " . $data['author'] . ". Surfacing in the digital landscape in " . $data['year'] . ", it weaves an absorbing plot. Here's a peek into the storyline: " . $data['description'] . ". It was digitized and added to our collection on " . date("F j, Y, g:i a", strtotime($data['recdate'])) . ". Prepare for a delightful digital voyage!"
        // Continue for more descriptions...
    ];
}
    

    

    if ($tableName === "book_shelf_view") {
        $descriptionIndex = rand(0, count($bookDescriptions) - 1);
        $description = $bookDescriptions[$descriptionIndex];
    } else if ($tableName === "ebook") {
        $descriptionIndex = rand(0, count($ebookDescriptions) - 1);
        $description = $ebookDescriptions[$descriptionIndex];
    }
    

$filePath=null;

    if($tableName === "book_shelf_view") {
        $resultArray = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'imageUrl' => $data['image_url'],
            'description' => $description,
            'filePath' => $filePath
        );
    }


    if($tableName === "ebook") {
       $url=$data['file_url'];
       $filePath=$url;
// check if url contains 'word'
if (strpos($url, 'word') !== false) {
    $url="../devimage/word.png";

} else {
    $url="../devimage/pdf.png";

}

        $resultArray = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'imageUrl' => $url,
            'description' => $description,
            'filePath' => $filePath
        );
    }

    echo json_encode($resultArray);
} else {
    echo "No data found.";
}

$stmt->close();
$conn->close();

