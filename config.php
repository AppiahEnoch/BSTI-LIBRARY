<?php
// BUSINESS SETTINGS
$business_name = "BSTI library";
//require_once './env/env.php';

$email_sender="bstilibrary@gmail.com";
$email_password="dwzgtbmldfzejtbq";

$DBhostname = "localhost";
$DBusername = "bstilibrary";
$DBpassword = "Bstilibrary1@";
$database = "bstilibrary";
 



$conn ="";

//$remote_addr = $_SERVER['REMOTE_ADDR'];
// $remote_host = gethostbyaddr($remote_addr);

    try {
       $conn = mysqli_connect($DBhostname, $DBusername, $DBpassword, $database) or die("Database connection failed");
 
    } catch (Throwable $th) {
        //throw $th;
    }





// remote server





