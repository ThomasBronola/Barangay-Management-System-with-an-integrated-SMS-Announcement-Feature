<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Barangay System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">

<!-- HEADER -->
<?php include 'HF/header.php';?> 

    <!-- MAIN LANDING BODY -->
    <header class="masthead" style="background-image:url('assets/img/header-bg.jpg');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Welcome To Barangay 53</span></div>
                <div class="intro-heading text-uppercase"><span>HAVE A GREAT DAY!</span></div>
            </div>
        </div>
    </header>

    <!-- STAFF -->
    <section class="bg-light" id="team">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/bernie1.jpg">
                        <h4>Bernie De Vega</h4>
                        <p class="text-muted">Brgy. Captain</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/pakalu.jpg">
                        <h4>Bernie De Vega II</h4>
                        <p class="text-muted">Tanod</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/bernie1.jpg">
                        <h4>Bernie De Vega III</h4>
                        <p class="text-muted">Tanod</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- REPORT OR CONTACT -->
    <section id="contact" style="background-image:url('assets/img/map-image.png');">
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
                                <div class="form-group mb-3"><input class="form-control" type="email" id="email" placeholder="Your Email *" required=""><small class="form-text text-danger help-block lead"></small></div>
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
    </section>


    <!-- TESTING 3:05 PM JULY 14, 2022 -->



<!-- MODALS -->

<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


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
                                <input type="email" id="login-email" class="login" placeholder="Email">
                                <div></div>
                                <input type="password" id="login-pass" class="login" placeholder="Password">
                                <div> <br> <br> </div>
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
    <?php include 'HF/footer.php';?> 
</body>
</html>