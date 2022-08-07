<?php
include_once '../../includes/database.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $sql = "SELECT * FROM `users` WHERE `full_name` LIKE '{$input}%' OR `email` LIKE '{$input}%' OR `user_type` LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){?>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="border-style: solid;">

        <!-- STARTING OF TABLE CODING  -->
        <table class="table my-0 table-striped" id="dataTable">
            <thead style="border-bottom: solid;">
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>                                             
                    <th>Email Address</th>                        
                    <th>Contact Number</th>                                                                                  
                    <th>Documents</th> 
                    <th colspan="2" class="text-center">Action</th>                                                                                                               
                </tr>
            </thead>

            
            <tbody style="border-bottom: 3px;">  
                <?php                                            
                    // START OF WHILE LOOP TO GET DATA FROM THE DATABASE INTO THE TABLE
                    while ($row = mysqli_fetch_assoc($result)): ?>                                               
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>                            
                            <td><?php echo $row['user_contact']; ?></td>
                            <td><?php echo $row['user_type']; ?></td>

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
                    <td><strong>Contact Number</strong></td>
                    <td><strong>Documents</strong></td>
                    <td colspan="2" class="text-center"><strong>Action</strong></td>
                </tr>
            </tfoot>
        </table>
        </div>


<?php
    }
    else {
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6> ";
    }
}

?>