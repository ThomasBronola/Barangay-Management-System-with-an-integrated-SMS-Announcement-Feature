<script src="../assets/js/main.js"></script>
<?php

require_once 'database.php';

// Cannot jump to certain pages without signing up
if(isset($_POST["registerButton"])){
        
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    $password2 = $_POST["confirm-password"];
    $usertype = $_POST["usertypeSELECT"];
    $contact = $_POST["user_contact"];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

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
        // THIS IS WHERE REGISTERING HAPPENS   
        createUser($conn, $usertype, $email, $fullname, $password, $contact);    
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

