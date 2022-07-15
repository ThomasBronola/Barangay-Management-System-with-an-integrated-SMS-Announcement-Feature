<?php

if(isset($_POST["save-blotter"])){

    $report = $_POST["txtArea-blotter"];
    $complainant = $_POST["txtcomplainant"];
    $defendant = $_POST["txtdefendant"];
    $reportId = $_POST["reportId"];

    require_once 'database.php';
    require_once 'functions.php';

    updateBlotter($conn, $report, $complainant, $defendant, $reportId);
}
else{
    header("location: ../layouts/blotter.php");
    exit();
}

?>
