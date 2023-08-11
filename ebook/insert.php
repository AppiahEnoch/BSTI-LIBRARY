<?php
require_once '../config/config.php';

if(isset($_FILES['document'], $_POST['material_name'], $_POST['author_name'], $_POST['author_year'], $_POST['description'])) {
    $material_name = $_POST['material_name'];
    // convert to uppercase
    $material_name = strtoupper($material_name);
    $author_name = $_POST['author_name'];
    $author_year = $_POST['author_year'];
    $description = $_POST['description'];
    $file = $_FILES['document'];

    // Error checking and unique file name generation is done in uploadFileWithUniqueName function

    $file_path = uploadFileWithUniqueName("document");

    if ($file_path) {
        $stmt = $conn->prepare("INSERT INTO ebook (material_type, title, author, year, description, file_url) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        }

        // Bind variables to the prepared statement as parameters
        // Assuming 'material_type' corresponds to $file['type'] and 'file_url' to $file_path
        $stmt->bind_param("sssiss", $file['type'], $material_name, $author_name, $author_year, $description, $file_path);

        if($stmt->execute()){
            echo 1;
        } else{
            echo json_encode(array("statusCode"=>201));
        }

        $stmt->close();
    } else {
        echo json_encode(array("statusCode"=>202, "error" => "File upload failed."));
    }
} else {
    echo json_encode(array("statusCode"=>999));
}


function uploadFileWithUniqueName($input_name, $target_dir = "../efile/") {
    if(isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0){
        $file_extension = strtolower(pathinfo($_FILES[$input_name]["name"], PATHINFO_EXTENSION));
    
        if($file_extension == "pdf" || $file_extension == "docx") {
            $unique_id = bin2hex(openssl_random_pseudo_bytes(16));

            $unique_id = $unique_id . generateCode();
        
            $new_filename = $unique_id . '.' . $file_extension;
        
            $new_file_path = $target_dir . $new_filename;
        
            if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $new_file_path)) {
                return $new_file_path;
            }
        }
    }

    return false;
}


function generateCode() {
    $seed = md5(uniqid(mt_rand(), true));
    $characters = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 30; $i++) {
        $charIndex = hexdec(substr($seed, $i, 1)) % $charactersLength;
        $randomString .= $characters[$charIndex];
    }
    return $randomString;
}

