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
                    <th colspan="2" class="text-center">Full Name</th>                                                                                                                                                                  
                    <th>Contact Number</th>                                                                                  
                    <th class="text-center">Action</th>                                                                                                            
                </tr>
            </thead>

            
            <tbody style="border-bottom: 3px;">  
                <?php                                            
                    // START OF WHILE LOOP TO GET DATA FROM THE DATABASE INTO THE TABLE
                    while ($row = mysqli_fetch_assoc($result)): ?>                                               
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td colspan="2" class="text-center"><?php echo $row['full_name']; ?></td>                         
                            <td><?php echo $row['user_contact']; ?></td>

                            <td class="text-center">
                                <a class="fw-bold btn btn-primary btn-sm d-none d-sm-inline-block" role="button" id="clickSend" data-bs-toggle="modal" href="#modal-send-sms<?php echo $row['user_id'];?>"><i class="fw-bold far fa-edit fa-sm text-white-50"></i> Send SMS</a>                                                                                                                                                            
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


<?php
    }
    else {
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6> ";
    }
}

?>