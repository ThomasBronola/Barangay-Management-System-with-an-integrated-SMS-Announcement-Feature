<?php 
    include_once '../includes/database.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] == "client"){
        header("location: ../index.php");
        exit();
    }
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
    <link rel="stylesheet" href="../assets/css/mstyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
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
        $sql = "SELECT * FROM `blotter` LIMIT $start_from,$num_per_page";
        $stmt = $conn->query($sql);       
    ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-1">BLOTTER REPORTS</h3>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#modal-blotter" data-bs-toggle="modal"><i class="fas fa-plus fa-sm text-white-50"></i>  Add Blotter Report</a>
                            </div>

                            <div class="col-md-6">
                                <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label">                                    
                                    <input type="search" autofocus id="blotter-search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label>                                                                        
                                </div>                                                                
                            </div>                                                                                
                        </div>
                        
                        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0 table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Complainant</th>
                                        <th>Defendant</th>
                                        <th>Official Incharge</th>                                                                              
                                        <th colspan="2" class="text-center" >Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 3px;">
                                    <?php                                            
                                            // START OF WHILE LOOP TO GET DATA FROM THE DATABASE INTO THE TABLE
                                            while ($row = $stmt->fetch_assoc()): ?>                                                 
                                                <tr>
                                                    <td><?php echo $row['reported_date']; ?></td>
                                                    <td><?php echo $row['complainant']; ?></td>
                                                    <td><?php echo $row['defendant']; ?></td>
                                                    <td><?php echo $row['official_incharge']; ?></td>         
                                                    <td class="text-center">
                                                        <a class="fw-bold btn btn-primary btn-sm d-none d-sm-inline-block" role="button" data-bs-toggle="modal" href="#modal-edit-blotter<?php echo $row['id'];?>"><i class="fw-bold far fa-edit fa-sm text-white-50"></i>View Report</a>

                                                         <!-- EDIT REPORT MODAL -->
                                                         <form method="post" action="../includes/update-blotter.php">
                                                            <div role="dialog" tabindex="-1" class="modal fade text-start portfolio-modal" id="modal-edit-blotter<?php echo $row['id'];?>">                                                         
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="container">
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-lg-8 mx-auto">
                                                                                <div class="modal-body">
                                                                                    <div class="col" style="height: 27px;"></div>
                                                                                    <h2 class="text-uppercase text-center modal-heading fw-bold text-dark">BLOTTER REPORT<button class="btn btn-primary modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span></span></button></h2>
                                                                                    <div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col col-xl-6 offset-xl-0 text-center">
                                                                            <input name="txtcomplainant" type="text" class="text-center login text-align" placeholder="Complainant" value="<?php echo $row['complainant']; ?>" required /></div>
                                                                        <div class="col col-xl-6 offset-xl-0 text-center">
                                                                            <input name="txtdefendant" type="text" class="text-center login" placeholder="Defendant" value="<?php echo $row['defendant']; ?>" required /></div>                                                                            
                                                                    </div> 

                                                                        <textarea id="save-blotter" rows="30" cols="100" name="txtArea-blotter" placeholder="Input Report"><?php echo $row['report']; ?></textarea>
                                                                        <div class="text-center">                                       
                                                                            <button class="btn btn-primary btn-sm d-none d-sm-inline-block text-light" role="button" name="save-blotter"><i class="fas fa-save fa-mdtext-black-50"></i> Save Report</button>
                                                                            <input name="reportId" type="text" style="display:none;" value="<?php echo $row['id']; ?>" required /></div>
                                                                            <div><br></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                     
                                                    </td>                                                                                                                                                                                                             
                                                    <td class="text-center">
                                                        <a class="fw-bold btn btn-danger btn-sm d-none d-sm-inline-block" role="button" data-bs-toggle="modal" href="#del-report-modal-message<?php echo $row['id'];?>"><i class="fas fa-trash fa-sm text-white-50"></i>  Delete Report</a>

                                                         <!-- DELETE REPORT CONFIRMATION MODAL  -->                                                        
                                                         <div role="dialog" tabindex="-1" class="modal fade text-center portfolio-modal" id="del-report-modal-message<?php echo $row['id'];?>">
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
                                                                                            <p class="item-intro text-dark fw-bold">Are you sure you want to delete this user report?</p> 
                                                                                            <div> <br> </div>
                                                                                            <div class="row text-center">                                                     
                                                                                                <div class="col"> <a class="btn btn-danger btn-sm d-none d-sm-inline-block fw-bold" role="button"  href="../includes/functions.php?delReport=<?php echo $row['id']; ?>"><i class="fw-bold far fa-trash fa-sm text-white-50"></i> Confirm</a></div>
                                                                                                <div class="col"> <button class="btn btn-primary btn-sm d-none d-sm-inline-block modal-dismiss fw-bold" type="button" data-bs-dismiss="modal"><i class="fa fa-solid fa-arrow-left"></i> Return</button></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    <div> <br> </div>                               
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </td>
                                                </tr>                                                    
                                            <!-- END OF WHILE LOOP -->
                                            <?php endwhile; ?>   

                                    </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Date</strong></td>
                                        <td><strong>Complainant</strong></td>
                                        <td><strong>Defendant</strong></td>
                                        <td><strong>Official Incharge</strong></td>                                                                        
                                        <td colspan="2" class="text-center"><strong>Action</strong></td>                                    
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- PAGES -->
                        <div class="row">                                
                                <div class="col-md-6" style="margin-top:5px;">
                                    <?php
                                        $pr_query = "SELECT * FROM `users`";
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
                                            <li class='page-item'><a class='page-link' href='blotter.php?page=".$start."' aria-label='First'><span aria-hidden='true'><<</span></a></li>
                                            <li class='page-item'><a class='page-link' href='blotter.php?page=".$prev."' aria-label='Previous'><span aria-hidden='true'><</span></a></li>
                                            ";       
                                                $ctr=0;       
                                                $stopper = ceil($total_page/2);                                                                                                                  
                                                if($total_page>5 ){                                                    
                                                    for ($i; $ctr<5; $i++){
                                                        if ($i-1 == $total_page){
                                                            break;
                                                        }
                                                        else{
                                                            echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='blotter.php?page=".$i."'>$i</a></li>";                                                                                                                                             
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
                                                            echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='blotter.php?page=".$i."'>$i</a></li>";                                                                                                                                             
                                                            $ctr++;     
                                                        }
                                                                                                   
                                                    }
                                                }
                                                if($total_page==1){                                                                                                      
                                                    echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='blotter.php?page=".$start."'>$i</a></li>";                                                                                                                                                 
                                                }
                                                
                                            echo "
                                            <li class='page-item'><a class='page-link' href='blotter.php?page=".$next."' aria-label='Next'><span aria-hidden='true'>></span></a></li>                                          
                                            <li class='page-item'><a class='page-link' href='blotter.php?page=".$total_page."' aria-label='Last'><span aria-hidden='true'>>></span></a></li>
                                            ";
                                            ?>
                                        </ul>
                                    </nav>
                                </div>


                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>


    <!-- MODAL OF ADDING BLOTTER REPORTS  -->
    <form method="post" action="../includes/save-blotter.php">
    <div role="dialog" tabindex="-1" class="modal fade text-end portfolio-modal" id="modal-blotter">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <div class="col" style="height: 27px;"></div>
                            <h2 class="text-uppercase text-center modal-heading fw-bold text-dark">ADD BLOTTER REPORT<button class="btn btn-primary modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span></span></button></h2>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col col-xl-6 offset-xl-0 text-center"><input name="txtcomplainant" type="text" class="text-center login text-align" placeholder="Complainant" required /></div>
                <div class="col col-xl-6 offset-xl-0 text-center"><input name="txtdefendant" type="text" class="text-center login" placeholder="Defendant" required /></div>
            </div> 

                <textarea id="save-blotter" rows="30" cols="100" name="txtArea-blotter" placeholder="Input Report"></textarea>
                <div class="text-center">                                       
                    <button class="btn btn-primary btn-sm d-none d-sm-inline-block text-light" role="button" name="save-blotter"><i class="fas fa-save fa-mdtext-black-50"></i> Save Report</button>
                    <div><br></div>
                </div>
        </div>
    </div>
</div>
</form>

    <script src="../adminAssets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../adminAssets/js/chart.min.js"></script>
    <script src="../adminAssets/js/bs-init.js"></script>
    <script src="../adminAssets/js/theme.js"></script>
    <script>
        $(document).ready(function(){
            $("#blotter-search").keyup(function(){
                var input = $(this).val();
                
                if (input != ""){
                    $.ajax({
                        url: "../includes/livesearch/blotter-livesearch.php",
                        method: "POST",
                        data:{input:input},

                        success:function(data){
                            $("#dataTable").html(data);
                        }
                    });
                } else{
                    location.replace("../layouts/blotter.php")
                }
            })
        });
    </script>

<?php 
    include_once '../HF/footer.php';
?>


</body>

</html>