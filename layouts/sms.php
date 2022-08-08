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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    
</head>

<body id="page-top">

<?php 
        require_once '../includes/functions.php';
        include_once '../HF/adminNavigations.php';
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        
        $num_per_page = 5;
        $start_from = ($page-1)*10;
        $sql = "SELECT * FROM `users` LIMIT $start_from,$num_per_page";
        $stmt = $conn->query($sql); 
?>

<h1 id="header-announcement">SMS Center</h1>

<div id="wrapper" class="container">
    <div class="row">
        <div class="column">
        <div class="d-flex flex-row" id="content-wrapper">
            <div id="content">
                <br>
            <h5 id="header-announcement" class="text-dark mb-4">Send to All</h5>
                <form action="../includes/send-sms.php" method="post">
                    <textarea autofocus rows="20" cols="50" id="txtArea-announcement" name="txtArea-announcement"></textarea>       
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>        
        </div>
        <div>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#modal-message" data-bs-toggle="modal" id="save-announcement" name="save-announcement"><i class="fas fa-send fa-sm text-white-50"></i>  Send SMS</a>
        </div>
    </div>
    </form>
    
    <br><br><br><br><br>

    <div class="row">
        <div class="column">
        <div class="d-flex flex-row" id="content-wrapper">
        <div class="container-fluid">
        <br>
                    <h5 class="text-dark mb-4">Select Recepient</h5>                    
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label">
                                        <input type="search" id="profile-search" autofocus class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
    
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="border-style: solid;">

                                <!-- STARTING OF TABLE CODING  -->
                                <table class="table my-0 table-striped" id="dataTable">
                                    <thead style="border-bottom: solid;">
                                        <tr>
                                            <th>User ID</th>
                                            <th colspan="2" class="text-center">Full Name</th>                                                                                                                                                                  
                                            <th>Contact Number</th>                                                                                  
                                            <th class="text-center">Action</th>                                                                                                               
                                        </tr>
                                    </thead>

                                    
                                    <tbody style="border-bottom: 3px;">  
                                        <?php                                            
                                            // START OF WHILE LOOP TO GET DATA FROM THE DATABASE INTO THE TABLE
                                            while ($row = $stmt->fetch_assoc()): ?>                                                 
                                                <tr>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td colspan="2" class="text-center"><?php echo $row['full_name']; ?></td>                                                                                                                      
                                                    <td><?php echo $row['user_contact']; ?></td>
                                                    <td class="text-center">
                                                        <a class="fw-bold btn btn-primary btn-sm d-none d-sm-inline-block" role="button" id="clickSend" data-bs-toggle="modal" href="#modal-send-sms<?php echo $row['user_id'];?>"><i class="fw-bold far fa-edit fa-sm text-white-50"></i> Send SMS</a>                                                                                                                                                            
                                                          
                                                    
                                                    <!-- MODAL OF SENDING AN SMS TO A SELECTED USER  -->
                                                    <form method="post" action="../includes/send-selected-sms.php">
                                                        <div role="dialog" tabindex="-1" class="modal fade text-end portfolio-modal" id="modal-send-sms<?php echo $row['user_id'];?>">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="container">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-lg-8 mx-auto">
                                                                            <div class="modal-body">
                                                                                <div class="col" style="height: 27px;"></div>
                                                                                <h2 class="text-uppercase text-center modal-heading fw-bold text-dark">SEND A MESSAGE<button class="btn btn-primary modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span></span></button></h2>
                                                                                <div></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col col-xl-6 offset-xl-0 text-center"><input name="txtReceiver" type="text" class="text-center login text-align" style="pointer-events: none" value="To: <?php echo $row['full_name']; ?>"/></div>
                                                                    <div class="col col-xl-6 offset-xl-0 text-center"><input name="Contact" class="text-center login" style="pointer-events: none" value="<?php echo $row['user_contact']; ?>" /></div>
                                                                </div> 
                                                                    <br>
                                                                    <textarea autofocus rows="20" cols="30" id="txtArea-announcement" required name="txtArea-announcement1"></textarea>       
                                                                    <div class="text-center">                                       
                                                                        <br>
                                                                        <button class="btn btn-primary btn-sm d-none d-sm-inline-block text-light" role="button" type="submit" name="send-selected-sms"><i class="fas fa-send fa-mdtext-black-50"></i> Send Message</button>
                                                                        <div><br></div>
                                                                    </div>
                                                            </div>
                                                            </div>    
                                                        </div>
                                                    </form>
                                                    </td>  
                                                </tr>                                                    
                                            <!-- END OF WHILE LOOP -->
                                            <?php endwhile; ?>    
                                    </tbody>

                                    
                                    <tfoot style="border-bottom: solid;">
                                        <tr>
                                            <td><strong>User ID</strong></td>
                                            <td colspan="2" class="text-center"><strong>Full Name</strong></td>                                                                                                    
                                            <td><strong>Contact Number</strong></td>
                                            <td class="text-center"><strong>Action</strong></td>
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
                                                                       echo "Displaying 5 records out of ".$total_record.' in '.$total_page.' pages.';
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
                                                                           <li class='page-item'><a class='page-link' href='sms.php?page=".$start."' aria-label='First'><span aria-hidden='true'><<</span></a></li>
                                                                           <li class='page-item'><a class='page-link' href='sms.php?page=".$prev."' aria-label='Previous'><span aria-hidden='true'><</span></a></li>
                                                                           ";       
                                                                               $ctr=0;       
                                                                               $stopper = ceil($total_page/2);                                                                                                                  
                                                                               if($total_page>5 ){                                                    
                                                                                   for ($i; $ctr<5; $i++){
                                                                                       if ($i-1 == $total_page){
                                                                                           break;
                                                                                       }
                                                                                       else{
                                                                                           echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='sms.php?page=".$i."'>$i</a></li>";                                                                                                                                             
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
                                                                                           echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='sms.php?page=".$i."'>$i</a></li>";                                                                                                                                             
                                                                                           $ctr++;     
                                                                                       }
                                                                                                                                  
                                                                                   }
                                                                               }
                                                                               if($total_page==1){                                                                                                      
                                                                                   echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='sms.php?page=".$start."'>$i</a></li>";                                                                                                                                                 
                                                                               }
                                                                               
                                                                           echo "
                                                                           <li class='page-item'><a class='page-link' href='sms.php?page=".$next."' aria-label='Next'><span aria-hidden='true'>></span></a></li>                                          
                                                                           <li class='page-item'><a class='page-link' href='sms.php?page=".$total_page."' aria-label='Last'><span aria-hidden='true'>>></span></a></li>
                                                                           ";
                                                                           ?>
                                                                       </ul>
                                                                   </nav>
                                                               </div>


                                            

</div>


<body id="page-top">
<!-- text area for the sms  -->
<div id="wrapper">
        




</div>    
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
                                        <div style="text-align: left;"> 
                                            <br> 
                                            <button class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" type="submit" id="real-announcement" name="save-real-announcement"><i class="fas fa-send fa-sm text-white-50"></i>  Send SMS</button>                    
                                            <button class="btn btn-primary btn-sm d-none d-sm-inline-block modal-dismiss" type="button" data-bs-dismiss="modal"><i class="fa fa-solid fa-arrow-left"></i>  Back</button></div>                                
                                            <br> 
                                        </div>                                  
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
    <script>
        $(document).ready(function(){
            $("#profile-search").keyup(function(){
                var input = $(this).val();
                
                if (input != ""){
                    $.ajax({
                        url: "../includes/livesearch/sms-livesearch.php",
                        method: "POST",
                        data:{input:input},

                        success:function(data){
                            $("#dataTable").html(data);
                        }
                    });
                } else{                        
                    location.replace("../layouts/sms.php");
                }
            })
        });
    </script>

<?php 
    include_once '../HF/footer.php';
?>
</body>

</html>
