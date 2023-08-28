<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['materialData'])) {
  echo $_SESSION['materialData'];
} else {
echo 0;
}
