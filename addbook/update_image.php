<?php
require_once '../config/config.php'; // Include your database config file

// Check if file and id were passed
if(isset($_FILES['file']['name']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $file = $_FILES['file'];

    // Select the image_url from the book where the id matches
    $stmt = $conn->prepare("SELECT image_url FROM book WHERE id = ?");
    $stmt->bind_param("i", $id); // Bind the id parameter, "i" means it's an integer
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // If the image_url was found, delete the file
    if($row['image_url']) {
        $oldFilePath = $row['image_url'];
        if(file_exists($oldFilePath)) {
            unlink($oldFilePath); // Delete the file
        }
    }

    $relativeFilePath = uploadImageWithUniqueName('file');

    // If the relative file path exists (i.e., the file was uploaded successfully)
    if($relativeFilePath) {
        // Prepare the update statement
        $updateStmt = $conn->prepare("UPDATE book SET image_url = ? WHERE id = ?");
        $updateStmt->bind_param("si", $relativeFilePath, $id);

        if($updateStmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No file or id received']);
}

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

