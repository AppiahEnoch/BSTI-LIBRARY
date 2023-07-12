<?php
include "../config/config.php";

// Start session
session_start();

// Form data
$material_number = $_POST['material_number'];
$material_type = $_POST['material_type'];
$shelfno = $_POST['shelfnumber'];
$uniqueid = $_POST['unique_id_type'] . "-" . $_POST['id_value']; // concat the id type and value
$title = $_POST['book_title'];
$author = $_POST['author_name'];
$description = $_POST['description'];
$cellnumber = $_POST['cellnumber'];
$materialdate = $_POST['publish_date'];

$image_url = uploadImageWithUniqueName('material_image');



// Insert into database
$sql = "INSERT INTO book (material_number, material_type, shelfno, uniqueid, title, author, description, image_url, cellnumber, materialdate) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssssss", $material_number, $material_type, $shelfno, $uniqueid, $title, $author, $description, $image_url, $cellnumber, $materialdate);

if ($stmt->execute()) {
    echo $materialdate; // Success response
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();



function uploadImageWithUniqueName($input_name, $target_dir = "../material_image/") {
    //$image_url = uploadImageWithUniqueName('material_image');

    if(isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0){
        // Generate a unique ID
        $unique_id = bin2hex(openssl_random_pseudo_bytes(16));

        // add  generateCode() to $unique_id
        $unique_id = $unique_id . generateCode();
    
        // Get the extension of the file
        $file_extension = pathinfo($_FILES[$input_name]["name"], PATHINFO_EXTENSION);
    
        // Create a new filename with the unique ID
        $new_filename = $unique_id . '.' . $file_extension;
    
        // Full path to the new file
        $new_file_path = $target_dir . $new_filename;
    
        // Move the uploaded file to the new location
        if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $new_file_path)) {
            // Return the relative path
            return $new_file_path;
        }
    }

    return false;
}




function generateCode() {
    $seed = md5(uniqid(mt_rand(), true));
    $characters = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $charIndex = hexdec(substr($seed, $i, 1)) % $charactersLength;
        $randomString .= $characters[$charIndex];
    }
    return $randomString;
  }