<?php
require_once 'functions.php';
require_once 'database.php';


$ch = curl_init();

$sql = "SELECT * FROM announcements ORDER BY ID DESC LIMIT 1";
$stmt = $conn->query($sql);
$announcement = $stmt;

$sql1 = "SELECT `full_name`, `user_contact` FROM `users`";
$stmt1 = $conn->query($sql1);        


        while ($row = $stmt1->fetch_assoc()):                                                                                
            $number = $row['user_contact'];
            $name = $row['full_name'];        

            $parameters = array(
                'apikey' => 'e496683564f28d41f717b1744f976b89', //Your API KEY
                'number' => $number,
                'message' => $stmt,
                'sendername' => 'BARANGAY SINGKOTRES'
            );
            curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
            curl_setopt( $ch, CURLOPT_POST, 1 );
            
            //Send the parameters set above with the request
            curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
            
            // Receive response from server
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $output = curl_exec( $ch );
            curl_close ($ch);
            
            //Show the server response
            echo $output;

        endwhile;   







?>