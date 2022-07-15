<?php
$servername = "localhost";
$db_name = "brgy53";
$username = "root";
$password = "";

// NOTES
// open up a connection to a database
// procedual php (mysqli)
// mysqli functions

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn){
    die("connection failed: " . mysqli_connect_error());

}