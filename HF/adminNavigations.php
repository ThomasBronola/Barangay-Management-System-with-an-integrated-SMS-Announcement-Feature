<?php 
    include_once '../includes/database.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Brgy53 Blotter Reports</title>
    <link rel="stylesheet" href="../adminAssets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../adminAssets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../adminAssets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../adminAssets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="adminAssets/css/mstyles.css">
</head>

<body id="page-top">
    <!-- SIDE NAV  -->
    <div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-dark p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="../index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink" href="../index.php"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brgy53</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">

                    <?php
        

                    // CODE HERE THE SESSION FOR USERTYPE TO SHOW SIDE NAVIGATION DEPENDING ON THE USER TYPE

                    if ($_SESSION["user_type"] == "systemadmin"){
                        echo '
                        <li class="nav-item"><a class="nav-link"><span>Hello '.$_SESSION["full_name"].'!</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="SystemAdmin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>User Profiles</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-table"></i><span>Activity Log</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="blotter.php"><i class="fa fa-folder-open"></i><span>Blotter Report</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="announcement.php"><i class="fa fa-bullhorn"></i><span>Announcements</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../includes/logout.php"><i class="fas fa-user"></i><span>Logout</span></a></li>';    

                    }
                    if ($_SESSION["user_type"] == "secretary"){
                        echo '
                        <li class="nav-item"><a class="nav-link"><span>Hello '.$_SESSION["full_name"].'!</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-table"></i><span>Activity Log</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="blotter.php"><i class="fa fa-folder-open"></i><span>Blotter Report</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="announcement.php"><i class="fa fa-bullhorn"></i><span>Announcements</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../includes/logout.php"><i class="fas fa-user"></i><span>Logout</span></a></li>';
                    }
                    if ($_SESSION["user_type"] == "captain"){
                        echo '
                        <li class="nav-item"><a class="nav-link"><span>Hello '.$_SESSION["full_name"].'!</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-table"></i><span>Activity Log</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="blotter.php"><i class="fa fa-folder-open"></i><span>Blotter Report</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="announcement.php"><i class="fa fa-bullhorn"></i><span>Announcements</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../includes/logout.php"><i class="fas fa-user"></i><span>Logout</span></a></li>';
                    }
                    elseif ($_SESSION["user_type"] == "admin"){
                        echo '
                        <li class="nav-item"><a class="nav-link"><span>Hello '.$_SESSION["full_name"].'!</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>User Profiles</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="blotter.php"><i class="fa fa-folder-open"></i><span>Blotter Report</span></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-bullhorn"></i><span>Announcements</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../includes/logout.php"><i class="fas fa-user"></i><span>Logout</span></a></li>';
                    }
                    elseif ($_SESSION["user_type"] == "tanod") {

                        echo '
                        <li class="nav-item"><a class="nav-link"><span>Hello '.$_SESSION["full_name"].'!</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="blotter.php"><i class="fa fa-folder-open"></i><span>Blotter Report</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../includes/logout.php"><i class="fas fa-user"></i><span>Logout</span></a></li>                                                
                        ';
                    }                                                        
                    ?>
                
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

        <!-- TOP NAV          -->
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <?php

                            // CODE HERE THE SESSION FOR USERTYPE TO REDIRECT WHICH LANDING PAGE THE USER WILL GO AFTER 
                            // CLICKING HOME AT HEADER

                            if ($_SESSION["user_type"] == "tanod") {
                                echo "<span> <a class='text-decoration-none text-dark fw-bold ' href='../layouts/Tanod.php'>  HOME  </a> </span>   ";
                            }
                        
                            elseif ($_SESSION["user_type"] == "systemadmin"){
                                echo "<span> <a class='text-decoration-none text-dark fw-bold ' href='../layouts/systemAdmin.php'>  HOME  </a> </span>   ";
                            }
                            elseif ($_SESSION["user_type"] == "admin" || $_SESSION["user_type"] == "captain" || $_SESSION["user_type"] == "secretary"){
                                echo "<span> <a class='text-decoration-none text-dark fw-bold ' href='../layouts/admin.php'>  HOME  </a> </span>   ";
                            }
                        ?>
                         
                    </div>
                </nav>

</body>