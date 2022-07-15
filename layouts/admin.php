<?php 
    include_once '../includes/database.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] == "tanod" || $_SESSION["user_type"] == "client"){
        header("location: ../landing-page.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body id="page-top">

<?php 
        include_once '../HF/adminNavigations.php';
        
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
    
        $num_per_page = 10;
        $start_from = ($page-1)*10;
        $sql = "SELECT * FROM activity_log LIMIT $start_from,$num_per_page";
        $stmt = $conn->query($sql);        
?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Activity Log</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label">
                                        <input type="search" autofocus id="activity-log-search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0 table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>IP Address</th>
                                            <th>Activity</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border-bottom: 3px;">
                                    <?php                                            
                                            // START OF WHILE LOOP TO GET DATA FROM THE DATABASE INTO THE TABLE
                                            while ($row = $stmt->fetch_assoc()): ?>                                                 
                                                <tr>
                                                    <td><?php echo $row['trail_user']; ?></td>
                                                    <td><?php echo $row['trail_utype']; ?></td>
                                                    <td><?php echo $row['trail_ip']; ?></td>
                                                    <td><?php echo $row['trail_action']; ?></td>                                                                                                                                                                                                                      
                                                    <td><?php echo $row['trail_date']; ?></td> 
                                                    <td><?php echo $row['trail_time']; ?></td> 
                                                </tr>                                                    
                                            <!-- END OF WHILE LOOP -->
                                            <?php endwhile; ?>   

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>IP Address</strong></td>
                                            <td><strong>Activity</strong></td>
                                            <td><strong>Date</strong></td>
                                            <td><strong>Time</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>



                            <!-- PAGES -->
                            <div class="row">                                
                                <div class="col-md-6" style="margin-top:5px;">
                                    <?php
                                        $pr_query = "SELECT * FROM activity_log";
                                        $pr_result = mysqli_query($conn, $pr_query);
                                        $total_record = mysqli_num_rows($pr_result);
                                        $total_page = ceil($total_record/$num_per_page);
                                        echo "Displaying 10 records out of ".$total_record.' in '.$total_page.' pages.';
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php 
                                            //for prev button page
                                            if  ($page == 1){
                                                $prev = 1;
                                            }
                                            else{
                                                $prev = $page -1;
                                            }   
                                            
                                            //for next button page
                                            if ($total_page == 1){
                                                $next = 1;
                                            }
                                            else{
                                                $next = $page + 1; 
                                            }                                          
                                            $start = 1;                                            
                                            $i = $page;                                    
                                            echo "
                                            <li class='page-item'><a class='page-link' href='admin.php?page=".$start."' aria-label='First'><span aria-hidden='true'><<</span></a></li>
                                            <li class='page-item'><a class='page-link' href='admin.php?page=".$prev."' aria-label='Previous'><span aria-hidden='true'><</span></a></li>
                                            ";       
                                                $ctr=0;       
                                                $stopper = ceil($total_page/2);                                                                                                                  
                                                if($total_page>5 ){                                                    
                                                    for ($i; $ctr<5; $i++){
                                                        if ($i-1 == $total_page){
                                                            break;
                                                        }
                                                        else{
                                                            echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='admin.php?page=".$i."'>$i</a></li>";                                                                                                                                             
                                                            $ctr++;     
                                                        }
                                                    }
                                                }
                                                if($total_page<5 and $total_page != 1){                                                                                                      
                                                    for ($i; $ctr<$total_page; $i++){                                                          
                                                        if ($i-1 == $total_page){
                                                            break;
                                                        }
                                                        else{
                                                            echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='admin.php?page=".$i."'>$i</a></li>";                                                                                                                                             
                                                            $ctr++;     
                                                        }
                                                                                                   
                                                    }
                                                }
                                                if($total_page==1){                                                                                                      
                                                    echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='admin.php?page=".$start."'>$i</a></li>";                                                                                                                                                 
                                                }
                                            echo "
                                            <li class='page-item'><a class='page-link' href='admin.php?page=".$next."' aria-label='Next'><span aria-hidden='true'>></span></a></li>                                          
                                            <li class='page-item'><a class='page-link' href='admin.php?page=".$total_page."' aria-label='Last'><span aria-hidden='true'>>></span></a></li>
                                            ";
                                            ?>
                                        </ul>
                                    </nav>
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
    <script>
        $(document).ready(function(){
            $("#activity-log-search").keyup(function(){
                var input = $(this).val();
                
                if (input != ""){
                    $.ajax({
                        url: "../includes/livesearch/activity-log-livesearch.php",
                        method: "POST",
                        data:{input:input},

                        success:function(data){
                            $("#dataTable").html(data);
                        }
                    });
                } else{
                    location.replace("../layouts/admin.php")
                }
            })
        });
    </script>


<?php 
    include_once '../HF/footer.php';
?>
</body>

</html>