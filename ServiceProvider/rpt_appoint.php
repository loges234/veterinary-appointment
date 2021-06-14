<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Appointment Report</h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
            <?php  
 $service_id=$_GET['id'];
 $sql = "SELECT * FROM tbl_appointment,tbl_service where tbl_appointment.service_id=$service_id and tbl_appointment.service_id=tbl_service.id ";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
                $service_name=$row['service_name'];
            }
            ?>
<!-- End Page Header -->
<font color="black"><a href="Appointment.php?id=<?php echo $service_id; ?>">Appointments</a> | <a href="rpt_appoint.php?id=<?php echo $service_id; ?>">Appointment Report</a> | <a href="rpt_appoint_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a>  | <a href="rpt_appoint_month.php?id=<?php echo $service_id; ?>">Monthly Appointment Report</a></font><br><br>

            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                      <br> <h4 align="center">List Of Appointment Report</h4><hr>
                                     <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="export-table" class="table mb-0">
                                            <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Email</th>
							<th>Pet Name</th>
							<th>Pet Age</th>
							<th>Pet Gender</th>
							<th>Pet Breed</th>
							<th>Pet Species</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $i=1;
 $service_id=$_GET['id'];
 $sql = "SELECT * FROM tbl_appointment where service_id=$service_id  ";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
           
                      ?>
                        <tr>
                            <td><span class="text-primary"><?php echo $i;?></span></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['email'];?></td>
							<td><?php echo $row['pet_name'];?></td>
							<td><?php echo $row['pet_age'];?></td>
							<td><?php echo $row['pet_gender'];?></td>
							<td><?php echo $row['pet_breed'];?></td>
							<td><?php echo $row['pet_species'];?></td>
                            <td><?php echo $row['a_date'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td><?php echo $row['status'];?></td>
                        </tr>
            <?php  $i++;   } ?>
                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>
<script src="../assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="../assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/vendors/js/app/app.min.js"></script>
        <script src="../assets/js/components/tables/tables.js"></script>