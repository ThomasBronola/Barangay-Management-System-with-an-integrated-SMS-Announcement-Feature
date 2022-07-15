<?php     
    session_start();

    if($_SESSION["user_type"] == "captain" || $_SESSION["user_type"] == "secretary" || $_SESSION["user_type"] == "admin"){
      header("location: layouts/admin.php");
      exit();
    } 
    elseif($_SESSION["user_type"] == "client"){
      header("location: landing-page.php");
      exit();
    }
    elseif($_SESSION["user_type"] == "tanod"){
      header("location: layouts/tanod.php");
      exit();
    }
    elseif($_SESSION["user_type"] == "systemadmin"){
      header("location: layouts/SystemAdmin.php");
      exit();
    }
    elseif (empty($_SESSION["user_type"])){        
        header("location: landing-page.php");                
    }
?>

