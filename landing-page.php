<?php 
    session_start(); 
    $_SESSION["user_type"] = "client";
    include_once 'includes/database.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Barangay Singko Tres</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/mstyles.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">

<!-- HEADER -->
<?php include 'HF/header.php';?> 

    <!-- MAIN LANDING BODY -->
    <header class="masthead" style="background-image:url('assets/img/header-bg.jpg');">
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
              <div>   <!-- class="container" -->
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
      }  
      else {
        echo 
        ' 
            <header class="masthead bg-dark" id="announcements">
                <div>   <!-- class="container" -->
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
    }
    ?>
    

    <!-- REPORT OR CONTACT -->
    <!-- <section id="contact" style="background-image:url('assets/img/map-image.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">SEND A REPORT</h2>
                    <h3 class="text-muted section-subheading">Need help? Send a report</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3"><input class="form-control" type="text" id="name" placeholder="Your Name *" required=""><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                                <div class="form-group mb-3"><input class="form-control" type="email" id="victim_email" placeholder="Your Email *" required=""><small class="form-text text-danger help-block lead"></small></div>
                                <div class="form-group mb-3"><input class="form-control" type="tel" placeholder="Your Phone *" required=""><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3"><textarea class="form-control" id="message" placeholder="Your Message *" required=""></textarea><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->


<!-- MODALS -->

    <!-- LOGIN MODAL -->
    <div class="modal fade text-center" role="dialog" tabindex="-1" id="modal-login">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <br> 
                                <div class="col">                              
                                <button class="btn btn-primary modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span></span></button></div>                                
                                <h2 class="text-uppercase modal-heading">login</h2>
                                <p class="item-intro" href="#modal-forgetpass" data-bs-toggle="modal" data-bs-dismiss="modal">forget password?</p> 

                                <form action="includes/login.php" method="post">
                                    <input type="email" required id="email" name="email" class="login" placeholder="Email">
                                    <div></div>
                                    <input type="password" required id="password" name="password" class="login" placeholder="Password">
                                    <div> <br> <br> </div>
                                    <button class="btn bg-info" type="submit" name="loginButton">Login</button>   
                                    <div> <br> </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORGET PASS MODAL -->
    <div class="modal fade text-center" role="dialog" tabindex="-1" id="modal-forgetpass">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <br> 
                                <div class="col"><button class="btn btn-primary modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span></span></button></div>                                
                                <h2 class="text-uppercase">FORGOT PASSWORD</h2>
                                <br>
                                <input type="email" id="login-email" class="login" placeholder="Email">
                                <div> <br> <br> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/agency.js"></script>


    <!-- FOOTER -->
    <?php 
    include_once 'HF/footer.php';
    ?> 

</body>
</html>