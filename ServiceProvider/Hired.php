<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
    <div class="page-header">
    <div class="d-flex align-items-center">
    <h2 class="page-header-title">Hired</h2>
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">Hired</li>
            </ul>
        </div>
    </div>
    </div>
    </div>
<!-- End Page Header -->
<?php
 $service_id=$_GET['id']; 
?>
<font color="black"><a href="Hired.php?id=<?php echo $service_id; ?>">Hired</a> | <a href="rpt_booking.php?id=<?php echo $service_id; ?>">Hired Report</a> | <a href="rpt_hire_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a> | <a href="rpt_hire_month.php?id=<?php echo $service_id; ?>">Monthly Hired Report</a></font><br><br>
   
<div class="row">
<div class="col-xl-12">
    <!-- Sorting -->
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Booking History</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                           <th>Payment Status</th>
                            <th>Booking Status</th>
                            <th>Verify</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $i=1;

 $sql = "SELECT * FROM tbl_booking,tbl_payment where tbl_booking.service_id=$service_id and tbl_booking.book_id=tbl_payment.book_id ";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
           
                      ?>
                        <tr>
                            <td><span class="text-primary"><?php echo $i;?></span></td>
                            <td><?php echo $row['name'];?></td>
                           <td><?php echo $row['b_date'];?></td>
                           <td>  <?php echo $row['payment_status'];?>  </td>
                           <td>  <?php echo $row['booking_status'];?>  </td>
                            <td class="td-actions">
                                <a href="../payment/TxnStatus.php?id=<?php echo $row['book_id']; ?>" class="btn btn-primary">Payment Check</a>
                            </td>
                            <td class="td-actions">
                                <a href="Book_details.php?id=<?php echo $row['book_id']; ?>">
                                    <i class="la la-plus-circle" style="color: blue"></i> <font color="blue">More</font>
                                </a>
                            </td>
                        </tr>
            <?php  $i++;   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Sorting -->

<?php        include('include/footer.php');  ?>
        <script src="../assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="../assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/vendors/js/app/app.min.js"></script>
        <script src="../assets/js/components/tables/tables.js"></script>