<?php
require_once '../../vendor/autoload.php';
include "../../config/config.php";


$code ="PWReTUAH";
$mobile="0549833352";




try {
    $sql = "SELECT * FROM regCode WHERE code=? AND mobile=?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die ("Error: " . $conn->error);
    }
    
    $stmt->bind_param("ss", $code, $mobile);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo 1;
        exit();
    }
    
    
} catch (\Throwable $th) {
   echo $th->getMessage();
}
  
