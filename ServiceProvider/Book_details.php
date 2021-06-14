<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
    <div class="page-header">
    <div class="d-flex align-items-center">
    <h2 class="page-header-title">Booking Details</h2>
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">Booking Details</li>
            </ul>
        </div>
    </div>
    </div>
    </div>
<!-- End Page Header -->
<div class="row">
<div class="col-xl-12">
    <!-- Sorting -->
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Manage Service Booking Details</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <form action="../controller/edit_db.php" method="post">
                <table id="sorting-table" class="table mb-0">
                 <tbody>
                    <?php  
                    $i=1;
 $id=$_GET['id'];
 $sql = "SELECT * FROM tbl_booking,tbl_payment where tbl_booking.book_id='$id' and tbl_booking.book_id=tbl_payment.book_id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            ?>
                    <tr><input type="hidden" name="book_id" value="<?php echo $id; ?>">
                        <td>Customer Name</td>
                        <td align="right"><input type="text" name="rdate" value="<?php echo $row['name']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td align="right"><input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td align="right"><input type="text" name="rdate" value="<?php echo $row['contact']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Service Booked On</td>
                        <td align="right"><input type="text" name="bdate" value="<?php echo $row['b_date']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td>Requirement 1</td>
                        <td align="right"><input type="text" name="requirement" value="<?php echo $row['requirement']; ?>" class="form-control"  readonly></td>
                    </tr>
                   <tr>
                        <td>About issue</td>
                        <td><img src="../user/bg/issue/<?php echo $row['issue']; ?>" height="100" width="150"></td>
                    </tr>
                  
                    <tr>
                        <td>Payment Status</td>
                        <td align="right"><input type="text" name="status" class="form-control" value="<?php echo $row['payment_status']; ?>"readonly></td>
                    </tr>
                    <tr>
                        <td>Booking Status</td>
                        <td align="right"><input type="text" name="status" class="form-control" value="<?php echo $row['booking_status']; ?>"readonly></td>
                    </tr>
<!--                 
                    <tr>
                        <td colspan="4" align="center"><br>
                             <input type="submit" name="btn_confirmbook" class="btn btn-primary" value="Save">
                        </td>
                    </tr> -->
                    <?php  } ?>
            
                    </tbody>
                </table>
                </form>
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

        