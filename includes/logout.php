<?php

session_start();
include_once 'functions.php';
include_once 'database.php';

$trail_user = $_SESSION["full_name"];
$trail_utype = $_SESSION["user_type"];
$trail_ip = $_SERVER['REMOTE_ADDR'];
$trail_action = "Logged Out";
$trail_date = date('Y-m-d H:i:s');
$trail_time = date("H:i:sa");

recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

$_SESSION["user_type"] = "landing";
// session_unset();
// session_destroy();
header("location: ../index.php");
exit();

?>