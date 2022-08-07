<?php
require_once 'functions.php';
require_once 'database.php';
session_start();

if(isset($_POST["updBtn"])){
        $id = $_POST['updUser'];
        $fname = $_POST["edit-fullname"];
        $user_password = $_POST["edit-password"];
        $confirm_password = $_POST["confirm-edit-password"];
        $contact = $_POST["edit-contact"];
        $u_type = $_POST["usertypeSELECT"];
        $address = $_POST["edit-address"];
        
        
        updateUser($conn, $id, $fname, $user_password, $confirm_password, $contact, $u_type, $address);
             
    }



?>