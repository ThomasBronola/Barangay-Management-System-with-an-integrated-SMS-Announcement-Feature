<?php
require_once '../includes/database.php';
//----------------------SIGN UP / REGISTER NEW USER FUNCTIONS ---------------------------------------//

function createUser($conn, $usertype, $email, $fullname, $password, $contact, $address){
    session_start();
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user_type, email, full_name, user_password, user_contact, user_address) VALUES (?,?,?,?,?,?);";
    if(!$stmt = $conn->prepare($sql)){
        echo '
        <script>
        alert("Something went wrong. Please try again.")
        </script>';
    }

    $stmt->bind_param("ssssss", $usertype, $email, $fullname, $hashedPwd, $contact, $address);
    $stmt->execute();

    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Created new account";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

    echo '
    <script>
    alert("Successful Sign Up")
    location.replace("../layouts/register.php")
    </script>';
    
}


function emailExist($conn, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo '
            <script>
            alert("Email Exists")
            history.back()
            </script>
            ';
    }
  
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
  
    if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
    }
    else {
      $result = false;
      return $result;
    }

    mysqli_stmt_close($stmt);

}


function passwordCheckcer($user_pass){
    $uppercase = preg_match('@[A-Z]@', $user_pass);
    $lowercase = preg_match('@[a-z]@', $user_pass);
    $number    = preg_match('@[0-9]@', $user_pass);
    $specialChars = preg_match('@[^\w]@', $user_pass);


    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($user_pass) < 8) {
      return false;
    } 
    else{
      return true;
    }

}


//----------------------------------------LOGIN FUNCTIONS---------------------------------------------//


function loginUser($conn, $email, $password){
    $emailExists = emailExist($conn, $email);

    if ($emailExists === false) {
      echo '
              <script>
              alert("Email Doesnt Exists")
              history.back()
              </script>
              ';
    }

    $pwdHashed = $emailExists['user_password'];
    $checkPwd = password_verify($password, $pwdHashed);    

    if ($checkPwd === false) {
      echo '
              <script>
              alert("Password does not match to any existing email.")         
              history.back();
              </script>
              ';
    }
    elseif ($checkPwd === true) {
      session_start();
      $_SESSION["user_id"] = $emailExists["user_id"];
      $_SESSION["full_name"] = $emailExists["full_name"];
      $_SESSION["email"] = $emailExists["email"];
      $_SESSION["user_type"] = $emailExists["user_type"];

      $trail_user = $_SESSION["full_name"];
      $trail_utype = $_SESSION["user_type"];
      $trail_ip = $_SERVER['REMOTE_ADDR'];
      $trail_action = "Logged In";
      $trail_date = date('Y-m-d H:i:s');
      $trail_time = date("H:i:sa");

      recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

      if($_SESSION["user_type"] == "captain" || $_SESSION["user_type"] == "secretary" || $_SESSION["user_type"] == "admin"){
        header("location: ../layouts/admin.php");
        exit();
      }
      if($_SESSION["user_type"] == "client"){
        header("location: ../index.php");
        exit();
      }
      if($_SESSION["user_type"] == "tanod"){
        header("location: ../layouts/tanod.php");
        exit();
      }
      if($_SESSION["user_type"] == "systemadmin"){
        header("location: ../layouts/SystemAdmin.php");
        exit();
      }
      
    }
}


//---------------------------------------------------------------ANNOUNCEMENTS--------------------------------------------------------------// 

// saving announcement in the database
use Twilio\Rest\Client;

function sendSms($conn, $announce){
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

  $sql2 = "SELECT `full_name`, `user_contact` FROM `users`";
  $stmt2 = $conn->query($sql2);

  $sql3 = "SELECT * FROM `sms`";
  $stmt3 = $conn->query($sql3);
  $row3 = $stmt3->fetch_assoc();
  $auth = $row3['auth'];

  //SMS API TESTING    
  require_once '../twilio-php-main/twilio-php-main/src/Twilio/autoload.php';
  $account_sid = $row3['sid'];
  $auth_token = $auth;
  $twilio_number = $row3['phone'];
  $client = new Client($account_sid, $auth_token); 

    while ($row2 = $stmt2->fetch_assoc()):    
      $user = $row2['full_name'];
      $userNumber = $row2['user_contact'];
      // $send = "Good Day Ma'am/Sir ".$user.' -- '.$announcement;

      $client->messages->create(
          // Where to send a text message (your cell phone?)
          $userNumber,
          array(
              'from' => $twilio_number,
              'body' => $announce
          )
      );
    endwhile; 
    
    echo '
    <script>
    alert("Message Sent!") 
    location.replace("../layouts/sms.php")
    </script>';       
}


function realAnnounce($conn, $announce){
  session_start();
  $sql = "INSERT INTO announcements (announce, announcement_date) VALUES (?,?);";
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
  $trail_action = "Sent an Announcement";
  $trail_date = date('Y-m-d H:i:s');
  $trail_time = date("H:i:sa");

  // RECORDING ACTIONS TO ACTIVITY LOG
  recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);  

  $sql1 = "SELECT * FROM announcements ORDER BY ID DESC LIMIT 1";
  $stmt1 = $conn->query($sql1); 
  $row1 = $stmt1->fetch_assoc();
  $announcement = $row1['announce'];

  $sql2 = "SELECT `full_name`, `user_contact` FROM `users`";
  $stmt2 = $conn->query($sql2);

  $sql3 = "SELECT * FROM `sms`";
  $stmt3 = $conn->query($sql3);
  $row3 = $stmt3->fetch_assoc();
  $auth = $row3['auth'];



  //SMS API TESTING    
  // require_once '../twilio-php-main/twilio-php-main/src/Twilio/autoload.php';
  // $account_sid = 'ACd6c0d5cf6d9fb0166f4d8b927563a03d';
  // $auth_token = $auth;
  // $twilio_number = "+13082808881";
  // $client = new Client($account_sid, $auth_token); 

  //   while ($row2 = $stmt2->fetch_assoc()):    
  //     $user = $row2['full_name'];
  //     $userNumber = $row2['user_contact'];
  //     // $send = "Good Day Ma'am/Sir ".$user.' -- '.$announcement;

  //     $client->messages->create(
  //         // Where to send a text message (your cell phone?)
  //         $userNumber,
  //         array(
  //             'from' => $twilio_number,
  //             'body' => $announcement
  //         )
  //     );
  // endwhile; 
    
    echo '
    <script>
    alert("Announcement Sent!") 
    location.replace("../layouts/announcement.php")
    </script>';       

}




function smsApi($conn){

  $curl = curl_init();  
  
  $sql = "SELECT * FROM announcements ORDER BY ID DESC LIMIT 1";
  $stmt = $conn->query($sql);
  $row = $stmt->fetch_assoc();
  $announcement = $row['announce'];
                 
 
  $sql1 = "SELECT `user_contact` FROM `users`";
  $stmt1 = $conn->query($sql1);        
  
  
          while ($row = $stmt1->fetch_assoc()):                                                                                
              $number = $row['user_contact'];     

              curl_setopt_array($curl, [
                CURLOPT_URL => "https://sms.8x8.com/api/v1/subaccounts/SingkoTres_6qQ2D_hq/messages",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"encoding\":\"AUTO\",\"track\":\"None\",\"source\":\"SingkoTres\",\"destination\":\"09475892286 \",\"text\":\"announcement test\",\"clientMessageId\":\"1234\"}",
                CURLOPT_HTTPHEADER => [
                  "Accept: application/json",
                  "Authorization: Bearer SingkoTres_6qQ2D_hq",
                  "Content-Type: application/json"
                ],
              ]);

              $response = curl_exec($curl);
          endwhile;   
            
  curl_close($curl);
  }

//-----------------------------------------------------------------BLOTTER FUNCTIONS----------------------------------------------------------------------------------//
function saveBlotter($conn, $report, $complainant, $defendant) {
    session_start();
    $sql = "INSERT INTO blotter ( reported_date, complainant, defendant, report, official_incharge) VALUES (?,?,?,?,?);";
    if(!$stmt = $conn->prepare($sql)){
        echo '
        <script>
        alert("Something went wrong. Please try again.")
        history.back()
        </script>';
    }

    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Saved a Blotter Report";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");
    
    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

    $today = date("m/d/Y");
    $official = $_SESSION["full_name"];

    $stmt->bind_param("sssss", $today, $complainant, $defendant , $report, $official);
    $stmt->execute();

      echo '
      <script>
      alert("Report Saved!") 
      location.replace("../layouts/blotter.php")
      </script>';  
}


function updateBlotter($conn, $report, $complainant, $defendant, $reportId) {
  session_start();
  $sql = "UPDATE `blotter` SET `reported_date` = ? , `complainant` = ?, `defendant` = ?, `report` = ?, `official_incharge` = ?  WHERE  `blotter`.`id` = ?";
  if(!$stmt = $conn->prepare($sql)){
      echo '
      <script>
      alert("Something went wrong. Please try again.")
      history.back()
      </script>';
  }

  $trail_user = $_SESSION["full_name"];
  $trail_utype = $_SESSION["user_type"];
  $trail_ip = $_SERVER['REMOTE_ADDR'];
  $trail_action = "Saved a Blotter Report";
  $trail_date = date('Y-m-d H:i:s');
  $trail_time = date("H:i:sa");
  
  recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

  $today = date("m/d/Y");
  $official = $_SESSION["full_name"];

  $stmt->bind_param("ssssss", $today, $complainant, $defendant , $report, $official, $reportId);
  $stmt->execute();

    echo '
    <script>
    alert("Report Updated!") 
    location.replace("../layouts/blotter.php")
    </script>';  
}

// DELETING REPORT 
if(isset($_GET["delReport"])){
  session_start();
  // if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin" && $_SESSION["user_type"] !== "systemadmin"){
  //     header("location: ../index.php");
  //     exit();
  // }

  $id = $_GET['delReport'];
  $sql = "DELETE FROM blotter WHERE `id` = $id";
  $stmt = $conn->query($sql);

  $trail_user = $_SESSION["full_name"];
  $trail_utype = $_SESSION["user_type"];
  $trail_ip = $_SERVER['REMOTE_ADDR'];
  $trail_action = "Deleted Blotter Report";
  $trail_date = date('Y-m-d H:i:s');
  $trail_time = date("H:i:sa");

  recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

  echo '
  <script>
  alert("User Deleted") 
  location.replace("../layouts/blotter.php")
  </script>'; 
}
//------------------------------------------------------------------------------EDIT/DELETE USERS------------------------------------------------------------------//




// UPDATING USER 
function updateUser($conn, $id, $fname, $user_password, $confirm_password, $contact, $u_type, $address){
  
  if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin" && $_SESSION["user_type"] !== "systemadmin"){
      header("location: ../index.php");
      exit();
  }

  $hashedPwd = password_hash($user_password, PASSWORD_DEFAULT);
  $sql = "UPDATE `users` SET `full_name` = ? , `user_password` = ?, `user_contact` = ?, `user_type` = ?, `user_address` = ? WHERE  `users`.`user_id` = ?";
  // $stmt = $conn->query($sql);

  if(!$stmt = $conn->prepare($sql)){
    echo '
    <script>
    alert("Something went wrong. Please try again.")
    location.replace("../layouts/profile.php")
    </script>';
    mysqli_stmt_close($stmt);
  } 

  if ($user_password !== $confirm_password){
    echo '
    <script>
    alert("Passwords do not match")
    location.replace("../layouts/profile.php")
    </script>'; 
    mysqli_stmt_close($stmt);
  }  

  if(!passwordCheckcer($user_password)){
    echo '
    <script> 
    alert ("Password must contain atleast 8 characters with one number, special character, small and capital letters.") 
    location.replace("../layouts/profile.php")
    </script>
    ';
    mysqli_stmt_close($stmt);
  }

  
    $stmt->bind_param("ssssss", $fname, $hashedPwd, $contact, $u_type, $address, $id );
    $stmt->execute();  

    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Updated a user profile";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");
    
    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

    echo '
    <script>
    alert("User Updated") 
    location.replace("../layouts/profile.php")
    </script>'; 


}

// DELETING USER 
if(isset($_GET["delUser"])){
  session_start();
  // if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin" && $_SESSION["user_type"] !== "systemadmin"){
  //     header("location: ../index.php");
  //     exit();
  // }

  $id = $_GET['delUser'];
  $sql = "DELETE FROM users WHERE `user_id` = $id";
  $stmt = $conn->query($sql);

  $trail_user = $_SESSION["full_name"];
  $trail_utype = $_SESSION["user_type"];
  $trail_ip = $_SERVER['REMOTE_ADDR'];
  $trail_action = "Deleted a user profile";
  $trail_date = date('Y-m-d H:i:s');
  $trail_time = date("H:i:sa");

  recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

  echo '
  <script>
  alert("User Deleted") 
  location.replace("../layouts/profile.php")
  </script>'; 
}


//--------------------------------------------------------------FOR ACTIVITY LOG-----------------------------------------------------------------------------------//
function recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time){
  $sql = "INSERT INTO activity_log (trail_user, trail_utype, trail_ip , trail_action, trail_date, trail_time) VALUES (?, ?, ?, ?, ?, ?);";
  // $stmt = mysqli_stmt_init($conn);

  if(!$stmt = $conn->prepare($sql)){
    echo '
    <script>
    alert("Something went wrong with recording the activity log. Please try again.")
    </script>';    
  }

  $stmt->bind_param("ssssss", $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);
  $stmt->execute();
  mysqli_stmt_close($stmt);
}


// NEW AUTH TOKEN FOR SMS

function newAuth($conn, $Auth, $Sid, $Phone){

  session_start();
  $sql = "UPDATE `sms` SET `auth` = ?, `sid` = ?, `phone` = ? WHERE `sms`.`id` = ?";
  if(!$stmt = $conn->prepare($sql)){
      echo '
      <script>
      alert("Something went wrong. Please try again.")
      history.back()
      </script>';
  }

  // $newauth = strval($Auth);
  $authId = 1;
  $stmt->bind_param("ssss", $Auth, $Sid, $Phone, $authId);
  $stmt->execute();



  $trail_user = $_SESSION["full_name"];
  $trail_utype = $_SESSION["user_type"];
  $trail_ip = $_SERVER['REMOTE_ADDR'];
  $trail_action = "Updated Sms Api Tokens";
  $trail_date = date('Y-m-d H:i:s');
  $trail_time = date("H:i:sa");
  
  recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

    echo '
    <script>
    alert("Api Tokens Updated!") 
    location.replace("../layouts/sms-auth.php")
    </script>';  
}


?>