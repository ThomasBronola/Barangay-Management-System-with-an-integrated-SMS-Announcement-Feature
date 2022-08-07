<?php 
    require_once '../includes/database.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin"  && $_SESSION["user_type"] !== "systemadmin"){
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
    <script src="../assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

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
$sql = "SELECT * FROM `users` LIMIT $start_from,$num_per_page";
$stmt = $conn->query($sql); 
?>

    <!-- SHOULD ECHO THIS WITH THE TABLE ELEMENTS COMING FROM THE DATABASE  -->
            <div class="container-fluid">
                    <h3 class="text-dark mb-4">User Profile</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label">
                                        <input type="text" id="profile-search" autofocus class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
    
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="border-style: solid;">

                                <!-- STARTING OF TABLE CODING  -->
                                <table class="table my-0 table-striped" id="dataTable">
                                    <thead style="border-bottom: solid;">
                                        <tr>
                                            <th>User ID</th>
                                            <th>Full Name</th>                                             
                                            <th>Email Address</th>  
                                            <th>Address</th>                                                 
                                            <th>Contact Number</th>                                                                                  
                                            <th class="text-center">Documents</th>
                                            <th colspan="2" class="text-center">Action</th>                                                                                                               
                                        </tr>
                                    </thead>

                                    
                                    <tbody style="border-bottom: 3px;">  
                                        <?php                                            
                                            // START OF WHILE LOOP TO GET DATA FROM THE DATABASE INTO THE TABLE
                                            while ($row = $stmt->fetch_assoc()): ?>                                                 
                                                <tr>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td><?php echo $row['full_name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['user_address']; ?></td>
                                                    <td><?php echo $row['user_contact']; ?></td>
                                                    
                                                    <td>                                                        
                                                        <a class="fw-bold btn btn-warning btn-sm d-none d-sm-inline-block" role="button" id="clickUpdate" data-bs-toggle="modal" href="#modal-documents<?php echo $row['user_id'];?>"><i class="fw-bold far fa-clipboard fa-sm text-warning-50"></i> Documents & Certificates</a>                                                                                                        
                                                        <!-- DOCUMENTS MODAL -->
                                                        <div role="dialog" tabindex="-1" class="modal fade text-start portfolio-modal" id="modal-documents<?php echo $row['user_id'];?>">
                                                            <div class="modal-dialog modal-lg modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <h3 class="text-center text-dark mb-4" style="margin-top: 18px;"><strong>User Documents</strong></h3>
                                                                    <div class="row mb-3 text-center">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card shadow mb-3">
                                                                                        <div class="card-header py-3">                                                                                                                                                                                       
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <p class="form-label text-dark" for="first_name"><strong>Name: </strong> <?php echo $row['full_name']; ?></label>
                                                                                                </div>
                                                                                                <div class="col">
                                                                                                    <p class="form-label text-dark" for="user_contact"><strong>Address: </strong> <?php echo $row['user_address']; ?></label>
                                                                                                </div>
                                                                                                <div class="col">
                                                                                                    <p class="form-label text-dark" for="user_contact"><strong>Contact Number: </strong> <?php echo $row['user_contact']; ?></label>
                                                                                                </div>
                                                                                            </div>                                                                                       
                                                                                        </div>
                                                                                        
                                                                                        <div class="card-body">
                                                                                            <form action="../includes/upload-download.php" method="post" enctype="multipart/form-data">  

                                                                                                <input hidden name="user_id" value="<?php echo $row['user_id']; ?>">                                                                                              
                                                                                                <div class="row">
                                                                                                    <div class="col" style="border-right:solid;">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label text-dark" for="first_name"><strong>Barangay Clearance</strong></label>
                                                                                                            <input type="file" class="form-control text-dark" name="FILE1"/>
                                                                                                            <br>

                                                                                                            <?php
                                                                                                            $user_id = $row['user_id'];
                                                                                                            $sqlfile = "SELECT * FROM files_db WHERE files_user_id = $user_id AND files_activity = 'FILE1'";
                                                                                                            $resultfile = mysqli_query($conn, $sqlfile);

                                                                                                                if(mysqli_num_rows($resultfile)>0){
                                                                                                                    $rowfile=mysqli_fetch_assoc($resultfile);
                                                                                                                    echo '<div style="height:77px; width:200px; overflow: hidden;"> <small class=" text-center form-label text-dark text-sm">'.$rowfile['files_name'].'</small> </div>';       
                                                                                                                    echo
                                                                                                                    '
                                                                                                                    <button class="btn btn-success btn-sm text-light fw-bold" name="uploadClearance" role="button" type="submit"><i class="fw-bold far fa-upload fa-sm text-white-50"></i> Upload</button>              
                                                                                                                    <button class="btn btn-primary btn-sm text-light fw-bold" name="downloadClearance" role="button" type="submit"><i class="fw-bold far fa-download fa-sm text-white-50"></i> Download</button>                                                                                                                                                                                            
                                                                                                                    <button class="btn btn-danger btn-sm text-light fw-bold" name="deleteClearance" role="button" type="submit"><i class="fw-bold far fa-close fa-sm text-white-50"></i> Delete</button>                                                                                                                                                                                                                                                                                                        
                                                                                                                    ';                                                                                                                                                                                                                            
                                                                                                                }    
                                                                                                                else{
                                                                                                                    echo
                                                                                                                    '
                                                                                                                    <button class="btn btn-success btn-sm text-light fw-bold" name="uploadClearance" role="button" type="submit"><i class="fw-bold far fa-upload fa-sm text-white-50"></i> Upload</button>              
                                                                                                                    ';
                                                                                                                }                                                                                                        
                                                                                                            ?>
                                                                                                
                                                                                                            
                                                                                                        </div>
                                                                                                    </div>    
                                                                                                    
                                                                                                    
                                                                                                    <div class="col" style="border-right:solid;">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label text-dark" for="password"><strong>Certificate of Residency</strong></label>
                                                                                                            <input type="file" class="form-control text-dark" name="FILE2"/>
                                                                                                            <br>

                                                                                                            <?php
                                                                                                            $user_id = $row['user_id'];
                                                                                                            $sqlfile = "SELECT * FROM files_db WHERE files_user_id = $user_id AND files_activity = 'FILE2'";
                                                                                                            $resultfile = mysqli_query($conn, $sqlfile);

                                                                                                                if(mysqli_num_rows($resultfile)>0){
                                                                                                                    $rowfile=mysqli_fetch_assoc($resultfile);
                                                                                                                    echo '<div style="height:77px; width:200px; overflow: hidden;"> <small class="text-center form-label text-dark text-sm">'.$rowfile['files_name'].'</small> </div>';       
                                                                                                                    echo 
                                                                                                                    '
                                                                                                                        <button class="btn btn-success btn-sm text-light fw-bold" name="uploadResidency" role="button" type="submit"><i class="fw-bold far fa-upload fa-sm text-white-50"></i> Upload</button>                                                                                                             
                                                                                                                        <button class="btn btn-primary btn-sm text-light fw-bold" name="downloadResidency" role="button" type="submit"><i class="fw-bold far fa-download fa-sm text-white-50"></i> Download</button>
                                                                                                                        <button class="btn btn-danger btn-sm text-light fw-bold" name="deleteResidency" role="button" type="submit"><i class="fw-bold far fa-close fa-sm text-white-50"></i> Delete</button>                                                                                                                                                                                            
                                                                                                                    ';                                                                                                                    
                                                                                                                }  
                                                                                                                else{
                                                                                                                    echo
                                                                                                                    '
                                                                                                                        <button class="btn btn-success btn-sm text-light fw-bold" name="uploadResidency" role="button" type="submit"><i class="fw-bold far fa-upload fa-sm text-white-50"></i> Upload</button>                                                                                                             
                                                                                                                    ';
                                                                                                                }                                                                                                          
                                                                                                            ?>
                                                                                                        </div>
                                                                                                    </div>



                                                                                                    <div class="col">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label text-dark" for="first_name"><strong>Certificate of Indigency</strong></label>
                                                                                                            <input type="file" class="form-control text-dark" name="FILE3"/>                                                                                                           
                                                                                                            <br>

                                                                                                            <?php
                                                                                                            $user_id = $row['user_id'];
                                                                                                            $sqlfile = "SELECT * FROM files_db WHERE files_user_id = $user_id AND files_activity = 'FILE3'";
                                                                                                            $resultfile = mysqli_query($conn, $sqlfile);

                                                                                                                if(mysqli_num_rows($resultfile)>0){
                                                                                                                    $rowfile=mysqli_fetch_assoc($resultfile);
                                                                                                                    echo '<div style="height:77px; width:200px; overflow: hidden;"> <small class="text-center form-label text-dark text-sm">'.$rowfile['files_name'].'</small> </div>';       
                                                                                                                    echo
                                                                                                                    '
                                                                                                                    <button class="btn btn-success btn-sm text-light fw-bold" name="uploadIndigency" role="button" type="submit"><i class="fw-bold far fa-upload fa-sm text-white-50"></i> Upload</button>                                                                                                             
                                                                                                                    <button class="btn btn-primary btn-sm text-light fw-bold" name="downloadIndigency" role="button" type="submit"><i class="fw-bold far fa-download fa-sm text-white-50"></i> Download</button>                                                                                                            
                                                                                                                    <button class="btn btn-danger btn-sm text-light fw-bold" name="deleteIndigency" role="button" type="submit"><i class="fw-bold far fa-close fa-sm text-white-50"></i> Delete</button>
                                                                                                                    ';                                                                                                               
                                                                                                                }  
                                                                                                                else{
                                                                                                                    echo
                                                                                                                    '
                                                                                                                    <button class="btn btn-success btn-sm text-light fw-bold" name="uploadIndigency" role="button" type="submit"><i class="fw-bold far fa-upload fa-sm text-white-50"></i> Upload</button>                                                                                                             
                                                                                                                    ';
                                                                                                                }                                                                                                          
                                                                                                            ?>

                                                                                                                                                                                                                 
                                                                                                        </div>
                                                                                                    </div>
                                   
                                                                                                
                                                                                                                                                                                                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card shadow"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card shadow mb-5"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </td>
                                                    

                                                    <td class="text-center">
                                                        <a class="fw-bold btn btn-primary btn-sm d-none d-sm-inline-block" role="button" id="clickUpdate" data-bs-toggle="modal" href="#modal-edit-user<?php echo $row['user_id'];?>"><i class="fw-bold far fa-edit fa-sm text-white-50"></i> Update User</a>                                                        
                                                        <!-- EDIT USER MODAL -->
                                                        <div role="dialog" tabindex="-1" class="modal fade text-start portfolio-modal" id="modal-edit-user<?php echo $row['user_id'];?>">
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <h3 class="text-center text-dark mb-4" style="margin-top: 18px;">User Profile</h3>
                                                                    <div class="row mb-3">
                                                                            <div class="row">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card shadow mb-3">
                                                                                        <div class="card-header py-3">
                                                                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <form action="../includes/update-user.php" method="post">                                                                                                
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Full Name</strong></label>
                                                                                                        <input type="text" class="form-control" id="first_name" name="edit-fullname" value="<?php echo $row['full_name']; ?>"/></div>
                                                                                                    </div>
                                                                                                    <div class="col">
                                                                                                        <div class="mb-3"><label class="form-label" for="user_contact"><strong>Contact Number</strong></label>
                                                                                                        <input type="text" class="form-control" id="user_contact" name="edit-contact" value="<?php echo $row['user_contact']; ?>"/></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <div class="mb-3"><label class="form-label" for="password"><strong>Password</strong></label>
                                                                                                        <input type="password" required class="form-control" placeholder="Password" name="edit-password" /></div>
                                                                                                    </div>
                                                                                                    <div class="col">
                                                                                                        <div class="mb-3"><label class="form-label" for="password"><strong>Confirm Password</strong></label>
                                                                                                        <input type="password" required class="form-control" placeholder="Re-enter Password" name="confirm-edit-password" /></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                    <div class="mb-3"><label class="form-label" for="user_contact"><strong>Address</strong></label>
                                                                                                        <input type="text" required class="form-control" id="address" placeholder="Address" name="edit-address" /></div>
                                                                                                    </div>                                                                                                    
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>User Type</strong></label>
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

                                                                                                <div class="row">                                                                                                    
                                                                                                <div class="col"> <button class="btn btn-primary btn-sm text-light fw-bold" name="updBtn" role="button" type="submit"><i class="fw-bold far fa-save fa-sm text-white-50"></i> Save Profile</button> </div>                                                                                               

                                                                                                    <input type="text" class="form-control" style="display:none;" name="updUser" value="<?php echo $row['user_id']; ?>"/>
                                                                                                        <div class="mb-3"></div>
                                                                                                        <div class="mb-3"></div>
                                                                                                    </div>
                                                                                                </div>                                                                                                                                                                                                                                                                               
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card shadow"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card shadow mb-5"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </td>          
                                                                                                        
                                                    <td class="text-center">
                                                        <a class="fw-bold btn btn-danger btn-sm d-none d-sm-inline-block" role="button" id="clickDelete" data-bs-toggle="modal" href="#del-user-modal-message<?php echo $row['user_id'];?>"><i class="fas fa-trash fa-sm text-white-50"></i>  Delete User</a>
                                                                                                            
                                                         <!-- DELETE USER CONFIRMATION MODAL  -->                                                        
                                                        <div role="dialog" tabindex="-1" class="modal fade text-center portfolio-modal" id="del-user-modal-message<?php echo $row['user_id'];?>">
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
                                                                                            <p class="item-intro text-dark fw-bold">Are you sure you want to delete this user profile?</p> 
                                                                                            <div> <br> </div>
                                                                                            <div class="row text-center">                                                     
                                                                                                <div class="col"> <a class="btn btn-danger btn-sm d-none d-sm-inline-block fw-bold" role="button"  href="../includes/functions.php?delUser=<?php echo $row['user_id']; ?>"><i class="fw-bold far fa-trash fa-sm text-white-50"></i> Confirm</a></div>
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

                                    
                                    <tfoot style="border-bottom: solid;">
                                        <tr>
                                            <td><strong>User ID</strong></td>
                                            <td><strong>Full Name</strong></td>
                                            <td><strong>Email Address</strong></td>       
                                            <td><strong>Address</strong></td>                                      
                                            <td><strong>Contact Number</strong></td>
                                            <td class="text-center"><strong>Documents</strong></td>
                                            <td colspan="2" class="text-center"><strong>Action</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                                                

                            
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
                                            <li class='page-item'><a class='page-link' href='profile.php?page=".$start."' aria-label='First'><span aria-hidden='true'><<</span></a></li>
                                            <li class='page-item'><a class='page-link' href='profile.php?page=".$prev."' aria-label='Previous'><span aria-hidden='true'><</span></a></li>
                                            ";       
                                                $ctr=0;       
                                                $stopper = ceil($total_page/2);                                                                                                                  
                                                if($total_page>5 ){                                                    
                                                    for ($i; $ctr<5; $i++){
                                                        if ($i-1 == $total_page){
                                                            break;
                                                        }
                                                        else{
                                                            echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='profile.php?page=".$i."'>$i</a></li>";                                                                                                                                             
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
                                                            echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='profile.php?page=".$i."'>$i</a></li>";                                                                                                                                             
                                                            $ctr++;     
                                                        }
                                                                                                   
                                                    }
                                                }
                                                if($total_page==1){                                                                                                      
                                                    echo "<li class='page-item active'><a class='page-link' style='margin-left:4px; margin-right:4px;' href='profile.php?page=".$start."'>$i</a></li>";                                                                                                                                                 
                                                }
                                                
                                            echo "
                                            <li class='page-item'><a class='page-link' href='profile.php?page=".$next."' aria-label='Next'><span aria-hidden='true'>></span></a></li>                                          
                                            <li class='page-item'><a class='page-link' href='profile.php?page=".$total_page."' aria-label='Last'><span aria-hidden='true'>>></span></a></li>
                                            ";
                                            ?>
                                        </ul>
                                    </nav>
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
            $("#profile-search").keyup(function(){
                var input = $(this).val();
                
                if (input != ""){
                    $.ajax({
                        url: "../includes/livesearch/profile-livesearch.php",
                        method: "POST",
                        data:{input:input},

                        success:function(data){
                            $("#dataTable").html(data);
                        }
                    });
                } else{                        
                    location.replace("../layouts/profile.php");
                }
            })
        });
    </script>

<?php 
    include_once '../HF/footer.php';
?>
</body>

</html>