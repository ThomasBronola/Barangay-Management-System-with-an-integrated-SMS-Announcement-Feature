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
    
    <!-- HEADER FILE -->
    <?php include '../HF/headerofficials.php';?>
    
    <!-- CHAIRMAN  -->
    <div class="container">   
        <br> <br> <br> <br> <br> 
        <div class="col-lg-12 text-center">
            <h2 class="text-uppercase">Official list</h2>
            <h3 class="text-muted section-subheading">Brgy. Chairman</h3>
        </div>
        <div class="row">
            <div class="col-sm-4 offset-md-4 offset-lg-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Brgy. Chairman</p>
                </div>
            </div>
        </div>
    </div>

    
    <!-- KAGAWAD  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad<br /></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad</p>
                </div>
            </div>
            <div class="col-sm-4 offset-md-4 offset-lg-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                    <h4>Jhon Bernie</h4>
                    <p class="text-muted">Kagawad</p>
                </div>
            </div>
        </div>
    </div>



    <!-- SECRETARY AND TREASURER -->
    <div class="container">
        <div class="col-lg-12 text-center">
            <h2 class="text-uppercase">SECREtary &amp; Treasurer</h2>
            <div class="row">
                <div class="col">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                        <h4>Jhon Bernie</h4>
                        <p class="text-muted">Secretary</p>
                    </div>
                </div>
                <div class="col">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                        <h4>Jhon Bernie</h4>
                        <p class="text-muted">Treasurer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <!-- BRGY ADMIN AND SK CHAIRPERSON -->
    <div class="container">
        <div class="col-lg-12 text-center">
            <h2 class="text-uppercase">Brgy. admin &amp; sk chairperson</h2>
            <div class="row">
                <div class="col">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                        <h4>Jhon Bernie</h4>
                        <p class="text-muted">Brgy. Administrator</p>
                    </div>
                </div>
                <div class="col">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="../assets/img/team/pakalu.jpg" />
                        <h4>Jhon Bernie</h4>
                        <p class="text-muted">SK Chairwoman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                                <form action="../includes/login.php" method="post">
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




</body>

    <!-- SCRIPT FOR NAVIGATION TAB/HEADER ANIMATION -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/agency.js"></script>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <!-- FOOTER FILE  -->
    <?php include '../HF/footer.php';?> 

</body>

</html>