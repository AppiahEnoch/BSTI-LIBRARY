<?php
include "../config/config.php";

// Start session
session_start();

// Form data
$class1 = $_POST['classification'];
$class2 = $_POST['fiction_options'];
$shelfnumber = $_POST['shelfnumber'];
$capacity = $_POST['capacity'];
if ($class1 === "2") {
    $class2 = $_POST['non_fiction_option'];
}
$description = $_POST['description'];

// Insert into database
$sql = "INSERT INTO shelf (shelfnumber,capacity,class1, class2, description) VALUES (?, ?, ?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $shelfnumber,$capacity, $class1, $class2, $description);

if ($stmt->execute()) {
    echo 1; // Success response
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$stmt->close();
$conn->close();
?>
