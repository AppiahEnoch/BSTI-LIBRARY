<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include "../config/config.php";

$user_id=$_SESSION['user_id'] ;

// Call the uploadImageWithUniqueName function with the input name
$image_url = uploadImageWithUniqueName('passport_picture_file');




  $sql = "UPDATE user_profile SET passport_picture_url = ? WHERE user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $image_url, $user_id);

  if ($stmt->execute()) {
echo 1;
  } else {
    echo 0;
  }

  $stmt->close();














// You can now handle the uploaded file URL as needed
if ($image_url !== false) {
    // Success response, you may want to return or store the image URL
    //echo json_encode(['status' => 'success', 'url' => $image_url]);
} else {
    // Error response
   // echo json_encode(['status' => 'error', 'message' => 'Failed to upload image']);
}
















function uploadImageWithUniqueName($input_name, $target_dir = "../passport_picture/") {
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
?>
