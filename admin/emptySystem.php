<?php
include "../config/config.php";

// Create connection


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tables = ['book', 'ebook', 'regcode', 'shelf', 'user0', 'user1'];

foreach($tables as $table) {
    try {
        $sql = "DELETE FROM $table";
        if ($conn->query($sql) === TRUE) {
           
        } else {
           
        }
    } catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}


$conn->close();



$dir ='../efile';
deleteFiles($dir);

$dir ='../material_image';
deleteFiles($dir);

echo 1;

function deleteFiles($dir) {
    $dir = rtrim($dir, '/') . "/";
    $files = glob($dir . "*");

    foreach ($files as $file) {
        if (is_file($file)) {
            if (!unlink($file)) {
                echo "Failed to delete $file\n";
            }
        }
    }
}





