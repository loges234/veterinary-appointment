<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Hired Report</h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
            <?php
 $service_id=$_GET['id']; 
?>
<font color="black"><a href="Hired.php?id=<?php echo $service_id; ?>">Hired</a> | <a href="rpt_booking.php?id=<?php echo $service_id; ?>">Hired Report</a> | <a href="rpt_hire_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a>| <a href="rpt_hire_month.php?id=<?php echo $service_id; ?>">Monthly Hired Report</a></font><br><br>
   
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                      <br> <h4 align="center">List Of Booking Report</h4><hr>
                                     <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="export-table" class="table mb-0">
                                            <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Booking Date</th>
                            <th>Advance Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $i=1;
 $service_id=$_GET['id'];
 $sql = "SELECT * FROM tbl_booking,tbl_user,tbl_payment where tbl_booking.service_id=$service_id  and tbl_user.user_id=tbl_booking.user_id  and tbl_payment.book_id=tbl_booking.book_id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
           
                      ?>
                        <tr>
                            <td><span class="text-primary"><?php echo $i;?></span></td>
                            <td><?php echo $row['user_name'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['b_date'];?></td>
                            <td><?php echo $row['payment_status'];?></td>
                            <td><?php echo $row['booking_status'];?></td>
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