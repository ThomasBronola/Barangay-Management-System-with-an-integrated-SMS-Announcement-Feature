<?php

session_start();
require_once '../includes/database.php';
require_once 'functions.php'; //FOR ERROR FUNCTIONS
$user_id = $_POST['user_id'];

if(isset($_POST["uploadClearance"])){      
    $user_id = $_POST['user_id'];
    $filenum = "FILE1";
    $filename = $_FILES['FILE1']['name'];

    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    $file = $_FILES['FILE1']['tmp_name'];
    $size = $_FILES['FILE1']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        history.back();
        </script>
        
        ';
    }
    elseif($_FILES['FILE1']['size']>1000000){
        echo '
        <script>
        alert("File is too large");
        location.replace(document.referrer);
        </script>
        
        ';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_user_id'] == $user_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_user_id = '$user_id'";

                        if(mysqli_query($conn, $sql2)){
                            // echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                                alert("File Uploaded successfully")
                                history.back()
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_user_id,files_activity,files_name,files_size,files_downloads) VALUES ('$user_id','$filenum','$filename',$size,0)";

            if(mysqli_query($conn, $sql3)){
                // echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                    alert("File Uploaded successfully")
                    history.back()
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Uploaded Barangay Cleareance";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);
}

if(isset($_POST["uploadResidency"])){      
    $user_id = $_POST['user_id'];
    $filenum = "FILE2";
    $filename = $_FILES['FILE2']['name'];

    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    $file = $_FILES['FILE2']['tmp_name'];
    $size = $_FILES['FILE2']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        history.back();
        </script>
        
        ';
    }
    elseif($_FILES['FILE2']['size']>1000000){
        echo '
        <script>
        alert("File is too large");
        location.replace(document.referrer);
        </script>
        
        ';
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_user_id'] == $user_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_user_id = '$user_id'";

                        if(mysqli_query($conn, $sql2)){
                            // echo "file uploaded successfully";
                            echo'
                            <script type="text/javascript">
                                alert("File Uploaded successfully")
                                history.back()
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_user_id,files_activity,files_name,files_size,files_downloads) VALUES ('$user_id','$filenum','$filename',$size,0)";

            if(mysqli_query($conn, $sql3)){
                // echo "file uploaded successfully";
                echo'
                <script type="text/javascript">
                    alert("File Uploaded successfully")
                    history.back()
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Uploaded Certificate of Residency";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);
}

if(isset($_POST["uploadIndigency"])){      
    $user_id = $_POST['user_id'];
    $filenum = "FILE3";
    $filename = $_FILES['FILE3']['name'];
   
    $destination =  '../uploads/'.$filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    $file = $_FILES['FILE3']['tmp_name'];
    $size = $_FILES['FILE3']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg'])){
        echo '
        <script>
        alert("Your file extension must be .zip, .pdf, .jpg or .png");
        history.back();
        </script>
        
        ';
    }
    elseif($_FILES['FILE3']['size']>1000000){
        echo '
        <script>
        alert("File is too large");
        location.replace(document.referrer);
        </script>
        
        ';
    
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "SELECT * FROM files_db WHERE files_activity = '$filenum'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['files_user_id'] == $user_id){
                        $sql2 = "DELETE FROM files_db WHERE files_activity = '$filenum' AND  files_user_id = '$user_id'";

                        if(mysqli_query($conn, $sql2)){
                            echo'
                            <script type="text/javascript">
                                alert("File Uploaded successfully")
                                history.back()
                            </script>
                            ';
        
                        }else{
                            echo "Failed to upload AT IF";
                        }
        
                        // echo 'meron na pong file';
                    }
                }

                
            }
            
            $sql3 = "INSERT INTO files_db (files_user_id,files_activity,files_name,files_size,files_downloads) VALUES ('$user_id','$filenum','$filename',$size,0)";

            if(mysqli_query($conn, $sql3)){         
                echo'
                <script type="text/javascript">
                    alert("File Uploaded successfully")
                    history.back()
                </script>
                ';

            }else{
                echo "Failed to upload AT ELSE";
            }
            
        }
    }
    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Uploaded Certificate of Indigency";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);
}


elseif(isset($_POST["downloadClearance"])){
    
    $user_id = $_POST['user_id'];
    $filenum = 'FILE1';

    $sql = "SELECT * FROM files_db WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        $trail_user = $_SESSION["full_name"];
        $trail_utype = $_SESSION["user_type"];
        $trail_ip = $_SERVER['REMOTE_ADDR'];
        $trail_action = "Downloaded Barangay Cleareance";
        $trail_date = date('Y-m-d H:i:s');
        $trail_time = date("H:i:sa");
    
        recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}

elseif(isset($_POST["downloadResidency"])){
    
    $user_id = $_POST['user_id'];
    $filenum = 'FILE2';

    $sql = "SELECT * FROM files_db WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        $trail_user = $_SESSION["full_name"];
        $trail_utype = $_SESSION["user_type"];
        $trail_ip = $_SERVER['REMOTE_ADDR'];
        $trail_action = "Downloaded Certificate of Residency";
        $trail_date = date('Y-m-d H:i:s');
        $trail_time = date("H:i:sa");
    
        recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}


elseif(isset($_POST["downloadIndigency"])){
    
    $user_id = $_POST['user_id'];
    $filenum = 'FILE3';

    $sql = "SELECT * FROM files_db WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = '../uploads/'.$file['files_name'];

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // header('Content-Type: '. mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        // header('Content-Disposition: inline; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        // header('Content-Length: ' . filesize('../uploads/' . $file['files_name']));
        header('Content-Length:'.filesize($filepath));
        header('Content-Transfer-Encoding: binary');
        ob_clean();
        flush();
        readfile("../uploads/".$file['files_name']);

        $newCount = $file['files_downloads'] + 1;

        $updateQuery = "UPDATE files_db SET files_downloads=$newCount WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";

        mysqli_query($conn, $updateQuery);

        $trail_user = $_SESSION["full_name"];
        $trail_utype = $_SESSION["user_type"];
        $trail_ip = $_SERVER['REMOTE_ADDR'];
        $trail_action = "Downloaded Certificate of Indigency";
        $trail_date = date('Y-m-d H:i:s');
        $trail_time = date("H:i:sa");
    
        recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

        exit();

    }else{
        echo '<br>file does not exist';
    }
}

// ADD CONFIRMATION MESSAGE 
elseif(isset($_POST["deleteClearance"])){
    echo 'you\'re deleting huh?';

    $user_id = $_POST['user_id'];
    $filenum = "FILE1";

    $sql = "DELETE FROM files_db WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Deleted Barangay Clearance";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);
    
    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}

// ADD CONFIRMATION MESSAGE 
elseif(isset($_POST["deleteResidency"])){
    echo 'you\'re deleting huh?';

    $user_id = $_POST['user_id'];
    $filenum = "FILE2";

    $sql = "DELETE FROM files_db WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Deleted Certificate of Residency";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}

// ADD CONFIRMATION MESSAGE 
elseif(isset($_POST["deleteIndigency"])){
    echo 'you\'re deleting huh?';

    $user_id = $_POST['user_id'];
    $filenum = "FILE3";

    $sql = "DELETE FROM files_db WHERE files_user_id = '$user_id' AND files_activity = '$filenum'";
    mysqli_query($conn, $sql);

    $trail_user = $_SESSION["full_name"];
    $trail_utype = $_SESSION["user_type"];
    $trail_ip = $_SERVER['REMOTE_ADDR'];
    $trail_action = "Deleted Certificate of Indigency";
    $trail_date = date('Y-m-d H:i:s');
    $trail_time = date("H:i:sa");

    recordTrail($conn, $trail_user, $trail_utype, $trail_ip, $trail_action, $trail_date, $trail_time);

    echo'
    <script type="text/javascript">
    location.replace(document.referrer);
    </script>
    ';
    
    exit();
}


?>