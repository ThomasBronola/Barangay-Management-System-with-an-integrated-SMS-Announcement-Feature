<?php

if(isset($_POST["loginButton"])){

    $email = $_POST["email"];
    $pass = $_POST["password"];

    require_once 'database.php';
    require_once 'functions.php';

    loginUser($conn, $email, $pass);
}
else{
    header("location: ../index.php");
    exit();
}

?>