<?php

if(isset($_POST["save-real-announcement"])){

    $announce = $_POST["txtArea-announcement"];

    require_once 'database.php';
    require_once 'functions.php';

    sendSms($conn, $announce);
}
else{
    header("location: ../layouts/announcement.php");
    exit();
}

?>
