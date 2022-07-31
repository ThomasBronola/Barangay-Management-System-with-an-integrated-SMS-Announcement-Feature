<?php 
    require_once '../includes/database.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] == "captain" || $_SESSION["user_type"] == "tanod"){
        header("location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Brgy53 Profile</title>
    <link rel="stylesheet" href="../adminAssets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../adminAssets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../adminAssets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../adminAssets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/mstyles.css">
</head>

<?php 
include_once '../HF/adminNavigations.php';
?>

<body class="bg-gradient-primary">   
                <div class="container">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-flex">
                                    <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;../assets/img/dogs/image2.jpeg&quot;);"></div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Create an Account!</h4>
                                        </div>

                                        <form class="user" action="../includes/signup.php" method="post">
                                            <div class="row mb-3">
                                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" required autofocus type="text" id="full_name" placeholder="Full Name" name="fullname"></div>
                                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" required type="tel" placeholder="Contact Number (+63xxxxxxxxxX)" minlength="13" maxlength = "13" name="user_contact"></div>
                                            </div>
                                            <div class="mb-3"><input class="form-control form-control-user" required type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                            <div class="mb-3">
                                                    <select class="text-center form-control form-control-user" name="usertypeSELECT" required>
                                                        <option disabled selected>--Select Usertype--</option>
                                                        <option value="captain">Captain</option>
                                                        <option value="secretary">Secretary</option>
                                                        <option value="tanod" >Tanod</option>
                                                        <option value="client">Client</option>
                                                        <option value="systemadmin">System Admin</option>
                                                        <option value="admin">Admin</option>                                                                                                             
                                                </select>
                                                </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" required type="password" id="password" placeholder="Password" name="password"></div>
                                                <div class="col-sm-6"><input class="form-control form-control-user" required type="password" id="confirm-password" placeholder="Repeat Password" name="confirm-password"></div>
                                            </div>
                                            <button class="btn btn-primary d-block btn-user w-100" type="submit" name="registerButton">Register Account</button>
                                            <hr>
                                            <hr>
                                        </form>


                                        <div class="text-center"></div>
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="../adminAssets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../adminAssets/js/chart.min.js"></script>
    <script src="../adminAssets/js/bs-init.js"></script>
    <script src="../adminAssets/js/theme.js"></script>


    
<div class="bg-white">
<?php 
    include_once '../HF/footer.php';
?>
</div>

</body>

</html>