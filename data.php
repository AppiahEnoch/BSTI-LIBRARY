<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['materialData'])) {
  echo $_SESSION['materialData'];
} else {
  http_response_code(404);
  echo json_encode(['error' => 'Session data not found']);
}
