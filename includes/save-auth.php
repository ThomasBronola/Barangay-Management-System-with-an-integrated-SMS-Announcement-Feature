<?php

if(isset($_POST["saveAuth"])){

    $Auth = $_POST["newAuth"];
    $Sid = $_POST["newSid"];
    $Phone = $_POST["newPhone"];

    require_once 'database.php';
    require_once 'functions.php';

    newAuth($conn, $Auth, $Sid, $Phone);
}
else{
    header("location: ../layouts/blotter.php");
    exit();
}

?>
