<?php
use Twilio\Rest\Client;

if(isset($_POST["save-real-announcement"])){

    $announce = $_POST["txtArea-announcement"];
    $contactNumber = $_POST["Contact"];

    require_once 'database.php';
    require_once 'functions.php';

    session_start();
  
    $sql = "INSERT INTO sms_archive (`message`, `message_date`) VALUES (?,?);";
    if(!$stmt = $conn->prepare($sql)){
        echo '
        <script>
        alert("Something went wrong. Please try again.")
        history.back()
        </script>';
    }
  
    if(!$stmt = $conn->prepare($sql)){
        echo '
        <script>
        alert("Something went wrong. Please try again.")
        history.back()
        </script>';
    }
  
    $today = date("m/d/Y");
  
    $stmt->bind_param("ss", $announce, $today);
    $stmt->execute();
  
    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Sent an SMS";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");
  
    // RECORDING ACTIONS TO ACTIVITY LOG
    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);  
  
    $sql3 = "SELECT * FROM `sms`";
    $stmt3 = $conn->query($sql3);
    $row3 = $stmt3->fetch_assoc();
    $auth = $row3['auth'];
  
    //SMS API TESTING    
    require_once '../twilio-php-main/twilio-php-main/src/Twilio/autoload.php';
    $account_sid = 'ACd6c0d5cf6d9fb0166f4d8b927563a03d';
    $auth_token = $auth;
    $twilio_number = "+13082808881";
    $client = new Client($account_sid, $auth_token); 
  
  
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            $contactNumber,
            array(
                'from' => $twilio_number,
                'body' => $announce
            )
        );
      
      echo '
      <script>
      alert("Message Sent!") 
      location.replace("../layouts/sms.php")
      </script>';       
}
else{
    header("location: ../layouts/sms.php");
    exit();
}

?>
