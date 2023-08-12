<?php
// Include your database connection configuration
require_once '../config/config.php';

// The current shelf number you want to select
$currentNumber = $_POST['id']; // You need to set this valueumber'];// You need to set this value

// Prepare the SQL statement
$sql = "SELECT * FROM shelf WHERE shelfnumber = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the shelf number to the SQL statement
$stmt->bind_param("i", $currentNumber);

// Execute the statement
if ($stmt->execute()) {
    // Get the result
    $result = $stmt->get_result();

    // Fetch all data
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Prepare the description
    foreach($data as $index => $row) {
        $description = "Shelf number {$row['shelfnumber']} has a capacity of {$row['capacity']}. cells and 20 books for each  Cell";
        $description .= "Currently, it contains {$row['currentcell']} Material(s). ";
        $description .= "It has a Class of  {$row['class1']} and  {$row['class2']}. ";
        $description .= "Additional description: {$row['description']}. ";
        $description .= "This shelf was created on {$row['recdate']}.";
        $data[$index]['description'] = $description;
    }

    // Return the data as JSON
    echo json_encode(['status' => 'success', 'data' => $data]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error fetching data: ' . $stmt->error]);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
