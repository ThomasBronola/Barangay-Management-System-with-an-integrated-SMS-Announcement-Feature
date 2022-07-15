<?php
include_once '../../includes/database.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $sql = "SELECT * FROM activity_log WHERE trail_user LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){?>

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
                        while ($row = mysqli_fetch_assoc($result)): ?>                                                 
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


    <?php
    }
    else {
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6> ";
    }
}

?>