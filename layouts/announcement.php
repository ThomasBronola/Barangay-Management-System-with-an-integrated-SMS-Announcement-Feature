<?php 
    include_once '../includes/database.php';
    session_start();
    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] == "tanod"){
        header("location: ../index.php");
      exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Brgy53 Admin</title>
    <link rel="stylesheet" href="../adminAssets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../adminAssets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../adminAssets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../adminAssets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/mstyles.css">    


    
</head>

<body id="page-top">

<?php 
        require_once '../includes/functions.php';
        include_once '../HF/adminNavigations.php';
?>


<body id="page-top">
<div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <h1 id="header-announcement">Announcement</h1>
                <form action="../includes/save-announcement.php" method="post">
                    <textarea required autofocus rows="20" cols="100" id="txtArea-announcement" name="txtArea-announcement"></textarea>       
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>        
    </div>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#modal-message" data-bs-toggle="modal" id="save-announcement" name="save-announcement"><i class="fas fa-save fa-sm text-white-50"></i>  Save Announcement</a>

    <br><br><br><br><br>

    <!-- MESSAGE MODAL -->
    <div class="modal fade text-center" role="dialog" tabindex="-1" id="modal-message">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <br> 
                                <div class="col">                              
                                <h4 class="text-uppercase modal-heading fw-bold">Message!</h4>        
                                <br>            
                                <p class="item-intro text-dark fw-bold">This cannot be change later. Please double check your work before you continue.</p> 
                                    <div> <br> </div>
                                    <button class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" id="real-announcement" name="save-real-announcement"><i class="fas fa-save fa-sm text-white-50"></i>  Save Announcement</button>                    
                                    <button class="btn btn-primary btn-sm d-none d-sm-inline-block modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-solid fa-arrow-left"></i>  Back</button></div>                                
                                    <div> <br> </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../adminAssets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../adminAssets/js/chart.min.js"></script>
    <script src="../adminAssets/js/bs-init.js"></script>
    <script src="../adminAssets/js/theme.js"></script>

<?php 
    include_once '../HF/footer.php';
?>
</body>

</html>
