<?php 
    include_once '../includes/database.php';
    require_once '../includes/functions.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "tanod"){
        header("location: ../landing-page.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Barangay Singko Tres</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/mstyles.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">

<!-- HEADER -->
<?php 
    include '../HF/headertanod.php';
    $uname = strval($_SESSION['full_name']);

    $sql1 = "SELECT * FROM `users` WHERE full_name = ?;";
    $stmt1 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt1, $sql1);
    $test = "Thomas Broñola";
    mysqli_stmt_bind_param($stmt1, "s", $uname);
    mysqli_stmt_execute($stmt1);

    $resultData = mysqli_stmt_get_result($stmt1);
    $row1 = mysqli_fetch_assoc($resultData);
?> 

    <!-- MAIN LANDING BODY -->
    <header class="masthead" style="background-image:url('../assets/img/header-bg.jpg');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Welcome To Barangay Singko Tres</span></div>
                <div class="intro-heading text-uppercase"><span>HAVE A GREAT DAY!</span></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="#announcements">See Announcements</a>
            </div>            
        </div>
    </header>



    <!-- GETTING AND DISPLAYING THE LAST ANNOUNCEMENT SAVED IN THE DATABASE. -->

    <?php


$sql = "SELECT * FROM announcements ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo ' 
          <header class="masthead bg-dark" id="announcements">
              <div class="container">   <!-- class="container" -->
              <br> <br><br>
              <h1 class="intro-heading text-uppercase color-light tanod-announcement"  id="announcement-header"> ANNOUNCEMENT! </h1>  
                  <div class="intro-text">
                                             
                          <div>                    
                              <textarea readonly id="txtArea-announcements" rows="30" cols="90"> '.$row["announce"].'</textarea>
                          </div>
                       
                  </div>
              </div>  
          </header>
          '; 
        }
      }  else 
      echo ' 
      <header class="masthead bg-dark" id="announcements">
          <div class="container">   <!-- class="container" -->
          <br> <br><br>
          <h1 class="intro-heading text-uppercase color-light tanod-announcement"  id="announcement-header"> ANNOUNCEMENT! </h1>  
              <div class="intro-text">
                                         
                      <div>                    
                          <textarea readonly id="txtArea-announcements" rows="30" cols="90">No Announcements Made</textarea>
                      </div>
                   
              </div>
          </div>  
      </header>
      '; 

    ?>

<div id="documents">
                                                                    <h3 class="text-center text-dark mb-4" style="margin-top: 18px;"><strong>User Documents</strong></h3>
                                                                    <div class="row mb-3 text-center">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card shadow mb-3">
                                                                                        <div class="card-header py-3">                                                                                                                                                                                       
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <p class="form-label text-dark" for="first_name"><strong>Name: </strong> <?php echo $row1['full_name']; ?></label>
                                                                                                </div>
                                                                                                <div class="col">
                                                                                                    <p class="form-label text-dark" for="user_contact"><strong>Contact Number: </strong> <?php echo $row1['user_address']; ?></label>
                                                                                                </div>
                                                                                                <div class="col">
                                                                                                    <p class="form-label text-dark" for="user_contact"><strong>Contact Number: </strong> <?php echo $row1['user_contact']; ?></label>
                                                                                                </div>
                                                                                            </div>                                                                                       
                                                                                        </div>
                                                                                        
                                                                                        <div class="card-body">
                                                                                            <form action="../includes/upload-download.php" method="post" enctype="multipart/form-data">  

                                                                                                <input hidden name="user_id" value="<?php echo $row1['user_id']; ?>">                                                                                              
                                                                                                <div class="row">
                                                                                                    <div class="col" style="border-right:solid;">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label text-dark" for="first_name"><strong>Barangay Clearance</strong></label>
                                                                                                            <input type="file" class="form-control text-dark" hidden name="FILE1"/>
                                                                                                            <br>

                                                                                                            <?php
                                                                                                            $user_id = $row1['user_id'];
                                                                                                            $sqlfile = "SELECT * FROM files_db WHERE files_user_id = $user_id AND files_activity = 'FILE1'";
                                                                                                            $resultfile = mysqli_query($conn, $sqlfile);

                                                                                                                if(mysqli_num_rows($resultfile)>0){
                                                                                                                    $rowfile=mysqli_fetch_assoc($resultfile);
                                                                                                                    echo '<button class="btn btn-primary btn-sm text-light fw-bold" style="background-color:#040ed1;" name="downloadClearance" role="button" type="submit"><i class="fw-bold far fa-download fa-sm text-white-50"></i> Download Barangay Clearance</button>';
                                                                                                                }      
                                                                                                                else{
                                                                                                                    echo ' <small class=" text-center form-label text-dark text-sm">No File Available</small>';       
                                                                                                                }                                                                                                  
                                                                                                            ?>

                                                                                                            
                                                                                                        </div>
                                                                                                    </div>    
                                                                                                    
                                                                                                    
                                                                                                    <div class="col" style="border-right:solid;">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label text-dark" for="password"><strong>Certificate of Residency</strong></label>
                                                                                                            <input type="file" hidden class="form-control text-dark" name="FILE2"/>
                                                                                                            <br>

                                                                                                            <?php
                                                                                                            $user_id = $row1['user_id'];
                                                                                                            $sqlfile = "SELECT * FROM files_db WHERE files_user_id = $user_id AND files_activity = 'FILE2'";
                                                                                                            $resultfile = mysqli_query($conn, $sqlfile);

                                                                                                                if(mysqli_num_rows($resultfile)>0){
                                                                                                                    $rowfile=mysqli_fetch_assoc($resultfile);
                                                                                                                    echo '<button class="btn btn-primary btn-sm text-light fw-bold" style="background-color:#040ed1;" name="downloadResidency" role="button" type="submit"><i class="fw-bold far fa-download fa-sm text-white-50"></i> Download Certificate of Residency</button>';
                                                                                                                }                                                                                                          
                                                                                                                else{
                                                                                                                    echo ' <small class=" text-center form-label text-dark text-sm">No File Available</small>';       
                                                                                                                }
                                                                                                            ?>

                                                                                                        </div>
                                                                                                    </div>



                                                                                                    <div class="col">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label text-dark" for="first_name"><strong>Certificate of Indigency</strong></label>
                                                                                                            <input type="file" hidden class="form-control text-dark" name="FILE3"/>                                                                                                           
                                                                                                            <br>

                                                                                                            <?php
                                                                                                            $user_id = $row1['user_id'];
                                                                                                            $sqlfile = "SELECT * FROM files_db WHERE files_user_id = $user_id AND files_activity = 'FILE3'";
                                                                                                            $resultfile = mysqli_query($conn, $sqlfile);   
                                                                                                            
                                                                                                            if(mysqli_num_rows($resultfile)>0){
                                                                                                                $rowfile=mysqli_fetch_assoc($resultfile);
                                                                                                                echo '<button class="btn btn-sm text-light fw-bold" style="background-color:#040ed1;" name="downloadIndigency" role="button" type="submit"><i class="fw-bold far fa-download fa-sm text-white-50"></i> Download Certificate of Indigency</button> ';
                                                                                                            }
                                                                                                            else{
                                                                                                                echo ' <small class=" text-center form-label text-dark text-sm">No File Available</small>';       
                                                                                                            }
                                                                                                            ?>

                                                                                                                                                                                                                 
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>                                                                                                                                                                                                                                                                                                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card shadow"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card shadow mb-5"></div>
                                                                </div>


    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/agency.js"></script>

    <!-- FOOTER -->
    <?php include '../HF/footer.php';?> 

</body>