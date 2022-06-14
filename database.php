<?php
$servername = "localhost";
$db_name = "brgy53";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $db_name, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>