<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
$user_id=0;
$_SESSION['user_id']=0;
require_once '../vendor/autoload.php';
include "../config/config.php";


$username ="";
$password="";
// check if username and password are set
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}
else{
   
    exit();
}



$userExist=0;


// check if username already exist  in database
$sql = "SELECT * FROM user0 WHERE user0_name=? and user0_password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$username,$password);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $user_id=0;
   $userExist=1;
}



$sql = "SELECT * FROM user1 WHERE user1_name=? and user1_password=?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$username,$password);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc())
{
    $user_id=$row["user1_id"];
    $userExist=2;
}



if(($userExist==1)||($userExist==2)){  
 
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['user_id']=$user_id;

}


echo $userExist;
exit();