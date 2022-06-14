<?php

if(isset($_POST["loginButton"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'database.php';

    if (emptyInputlogin($email,$password) !== false){
        echo "<script>
            alert 'Wrong or Non existing Email or Passowrd';
        </script>";
        exit();
    }

    loginUser($conn, $email, $password);
}
else{
    header("location: ../index.php");
    exit();
}



function emptyInputlogin($email,$password){
    $result;
    if (empty($email) || empty($password)) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  }
  




  function loginUser($conn, $email, $password){
    $emailExist = emailExist($conn, $email);
  

    // TO BE CHECKED 
    if ($emailExists === false) {
      header("location: ../landing-page.php?error=emailnotexist");
      exit();
    }
  
    $pwdHashed = $emailExist["user_password"];
    $checkPwd = password_verify($password, $pwdHashed);
  
    if ($checkPwd === false) {
      header("location: ../landing-page.php?error=wronglogin");
      exit();
    }
    // END OF TO BE CHECKED 

    elseif ($checkPwd === true) {
      session_start();
      $_SESSION["u_id"] = $emailExist["u_id"];
      $_SESSION["email"] = $emailExist["email"];
      $_SESSION["user_type"] = $emailExist["user_type"];
  
      
    //   EDIT HEADER TO WHICH LANDING PHP FILE THEY WILL GO DEPENDING ON THEIR USERTYPE
      if($_SESSION["user_type"] == "SystemAdmin"){
        header("location: ../.php");
        exit();
      }
      if($_SESSION["user_type"] == "Admin"){
        header("location: ../.php");
        exit();
      }
      if($_SESSION["user_type"] == "Officer"){
        header("location: ../.php");
        exit();
      }      
    }
  }