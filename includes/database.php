<?php
$servername = "localhost";
$db_name = "brgy53";
// $db_name = "capstone";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>