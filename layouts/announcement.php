<?php 
    include_once '../includes/database.php';
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
        include_once '../HF/adminNavigations.php';
?>


<body id="page-top">
<div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <h1 id="header-announcement">Announcements</h1>
                <textarea rows="20" cols="100" id="txtArea-announcement"></textarea>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        
    </div>
    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" id="save-announcement" name="save-announcement"><i class="fas fa-save fa-sm text-white-50"></i> Save Announcement</a>
    <script src="../adminAssets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../adminAssets/js/chart.min.js"></script>
    <script src="../adminAssets/js/bs-init.js"></script>
    <script src="../adminAssets/js/theme.js"></script>

<?php 
    include_once '../HF/footer.php';
?>
</body>

</html>
