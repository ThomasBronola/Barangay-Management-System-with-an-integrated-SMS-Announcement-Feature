<script src="../assets/js/main.js"></script>
<?php

require_once 'database.php';
use Twilio\Rest\Client;

// Cannot jump to certain pages without signing up
if(isset($_POST["registerButton"])){
        
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    $password2 = $_POST["confirm-password"];
    $usertype = $_POST["usertypeSELECT"];
    $contact = $_POST["user_contact"];
    $address = $_POST["address"];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $contactVerify = '+63';

    require_once 'functions.php'; //FOR ERROR FUNCTIONS

    if ($password !== $password2) {  
        echo '
        <script> 
            alert ("Passwords do not Match") 
            redirect_Page()
        </script>                
        ';
    }
    elseif (emailExist($conn, $email) == true) {
        echo '
        <script> 
            alert ("Email has been taken") 
            history.back();
        </script>';        
    }
    elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo '
        <script> 
        alert ("Password must contain atleast 8 characters with one number, special character, small and capital letters.") 
        history.back();
        </script>
        ';
    }
    elseif (empty($contact) || substr($contact, 0, 3 ) !== '+63' ) {
        echo '
        <script>
        alert ("Contact Number must begin with +63.")
        history.back();
        </script>
        ';    
    }
    elseif (empty($email) || empty($fullname) || empty($password) || empty($password2)) {
        echo '
        <script>
        alert ("Must Fill Up Empty Fields.")
        history.back();
        </script>
        ';    
    }

    elseif(empty($usertype)) {
        echo '
        <script>
        alert ("Invalid. Please select user type")
        history.back();
        </script>
        ';
    }
    else{
        
        // FOR ADDING A VERIFIED CALLER ID/CONTACT NUMBER FOR THE API
        
        
        // require_once '../twilio-php-main/twilio-php-main/src/Twilio/autoload.php';
        // $sid = "AC5d352da0c59845cffa191f075fe0bc92";
        // $token = "e6dd8c207e49f658e138d33ec09c9f23";
        // $twilio = new Client($sid, $token);     

        // $validation_request = $twilio->validationRequests
        //                             ->create($contact, // phoneNumber
        //                                     ["friendlyName" => $fullname]
        //                             );


        // THIS IS WHERE REGISTERING HAPPENS                  
        createUser($conn, $usertype, $email, $fullname, $password, $contact, $address); 
    }
    

}
else{
    echo '
    <script>
    alert ("WHY THE FUCK)
    history.back();
    </script>
    ';
}

