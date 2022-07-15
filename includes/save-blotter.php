<?php

if(isset($_POST["save-blotter"])){

    $report = $_POST["txtArea-blotter"];
    $complainant = $_POST["txtcomplainant"];
    $defendant = $_POST["txtdefendant"];

    require_once 'database.php';
    require_once 'functions.php';

    saveBlotter($conn, $report, $complainant, $defendant);
}
else{
    header("location: ../layouts/blotter.php");
    exit();
}

?>
