<?php
require_once '../vendor/autoload.php';
include "../config/config.php";


$code ="";
$mobile="";
if (isset($_POST['code'])) {
    $code = $_POST['code'];
    $mobile = $_POST['mobile'];
}
else{
   echo 78;
    exit();
}

$sql = "SELECT * FROM regcode WHERE code=? AND mobile=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $code, $mobile);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo 1;
    exit();
}

echo 0;

