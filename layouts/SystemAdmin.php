<?php 
    include_once '../includes/database.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "systemadmin"){
        header("location: ../landing-page.php");
      exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Brgy53 System Admin</title>
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
    $sql = "SELECT COUNT(*) as total FROM `users`";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    $sqlblotter = "SELECT COUNT(*) as total_blotter FROM `blotter`";
    $resultblotter = mysqli_query($conn, $sqlblotter);
    $datablotter = mysqli_fetch_assoc($resultblotter);

    // SQL FOR THE GRAPH DATA 
    $sqlJan = "SELECT count(*) as totalJan FROM blotter WHERE reported_date LIKE '01%'";
    $resultJan = mysqli_query($conn, $sqlJan);
    $dataJan = mysqli_fetch_assoc($resultJan);

    $sqlFeb = "SELECT count(*) as totalFeb FROM blotter WHERE reported_date LIKE '02%'";
    $resultFeb = mysqli_query($conn, $sqlFeb);
    $dataFeb = mysqli_fetch_assoc($resultFeb);

    $sqlMar = "SELECT count(*) as totalMar FROM blotter WHERE reported_date LIKE '03%'";
    $resultMar = mysqli_query($conn, $sqlMar);
    $dataMar = mysqli_fetch_assoc($resultMar);

    $sqlApr = "SELECT count(*) as totalApr FROM blotter WHERE reported_date LIKE '04%'";
    $resultApr = mysqli_query($conn, $sqlApr);
    $dataApr = mysqli_fetch_assoc($resultApr);

    $sqlMay = "SELECT count(*) as totalMay FROM blotter WHERE reported_date LIKE '05%'";
    $resultMay = mysqli_query($conn, $sqlMay);
    $dataMay = mysqli_fetch_assoc($resultMay);
    
    $sqlJun = "SELECT count(*) as totalJun FROM blotter WHERE reported_date LIKE '06%'";
    $resultJun = mysqli_query($conn, $sqlJun);
    $dataJun = mysqli_fetch_assoc($resultJun);

    $sqlJul = "SELECT count(*) as totalJul FROM blotter WHERE reported_date LIKE '07%'";
    $resultJul = mysqli_query($conn, $sqlJul);
    $dataJul = mysqli_fetch_assoc($resultJul);

    $sqlAug = "SELECT count(*) as totalAug FROM blotter WHERE reported_date LIKE '08%'";
    $resultAug = mysqli_query($conn, $sqlAug);
    $dataAug = mysqli_fetch_assoc($resultAug);
    
    $sqlSep = "SELECT count(*) as totalSep FROM blotter WHERE reported_date LIKE '09%'";
    $resultSep = mysqli_query($conn, $sqlSep);
    $dataSep = mysqli_fetch_assoc($resultSep);

    $sqlOct = "SELECT count(*) as totalOct FROM blotter WHERE reported_date LIKE '10%'";
    $resultOct = mysqli_query($conn, $sqlOct);
    $dataOct = mysqli_fetch_assoc($resultOct);

    $sqlNov = "SELECT count(*) as totalNov FROM blotter WHERE reported_date LIKE '11%'";
    $resultNov = mysqli_query($conn, $sqlNov);
    $dataNov = mysqli_fetch_assoc($resultNov);

    $sqlDec = "SELECT count(*) as totalDec FROM blotter WHERE reported_date LIKE '12%'";
    $resultDec = mysqli_query($conn, $sqlDec);
    $dataDec = mysqli_fetch_assoc($resultDec);
?>

        <!-- START OF MAIN CODE -->
                
                <!-- 3 CARD BODIES  -->
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>

                    <!-- 1ST CARD: RESIDENTS WITH ACCOUNT  -->
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>residents with account</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $data['total']; ?></span></div>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- 2ND CARD: CLEARANCE REVENUE  -->
                        <!-- <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>clearance revenue</span></div>
                                      <div class="text-dark fw-bold h5 mb-0"><span>$215,000</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <!-- 3RD CART: BLOTTER REPORTS  -->
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>BLOTTER REPORTS</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo $datablotter['total_blotter']; ?></span></div>
                                                </div>
                                                <div class="col">    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- CHART  -->
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0"><?php echo date("Y");?> BLOTTER REPORTS</h6>
                                    <!-- <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;Sep&quot;,&quot;Oct&quot;,&quot;Nov&quot;,&quot;Dec&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;<?php echo $dataJan['totalJan']; ?>&quot;,&quot;<?php echo $dataFeb['totalFeb']; ?>&quot;,&quot;<?php echo $dataMar['totalMar']; ?>&quot;,&quot;<?php echo $dataApr['totalApr']; ?>&quot;,&quot;<?php echo $dataMay['totalMay']; ?>&quot;,&quot;<?php echo $dataJun['totalJun']; ?>&quot;,&quot;<?php echo $dataJul['totalJul']; ?>&quot;,&quot;<?php echo $dataAug['totalAug']; ?>&quot;,&quot;<?php echo $dataSep['totalSep']; ?>&quot;,&quot;<?php echo $dataOct['totalOct']; ?>&quot;,&quot;<?php echo $dataNov['totalNov']; ?>&quot;, &quot;<?php echo $dataDec['totalDec']; ?>&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- STICKY BUTTON THAT SCROLLS THE PAGE UP -->
        <!-- <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a> -->


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