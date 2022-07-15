<?php
include_once '../../includes/database.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $sql = "SELECT * FROM blotter WHERE complainant LIKE '{$input}%' OR defendant LIKE '{$input}%' OR official_incharge LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){?>
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
                                            while ($row = mysqli_fetch_assoc($result)): ?>                                                 
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



<?php
    }
    else {
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6> ";
    }
}

?>