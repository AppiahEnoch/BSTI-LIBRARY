<?php
session_start();
require_once '../vendor/autoload.php';
include "../config/config.php";

$response = array("status" => "error", "count" => 0);

if ($conn) {
  $sql = "SELECT COUNT(*) as null_count FROM `request` WHERE `has_been_addressed` IS NULL";
  $result = $conn->query($sql);

  if ($result) {
    $row = $result->fetch_assoc();
    $null_count = $row['null_count'];
    $response = array("status" => "success", "count" => $null_count);
  } else {
    $response = array("status" => "error", "count" => 0);
  }

  echo json_encode($response);
}
