<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
    <div class="page-header">
    <div class="d-flex align-items-center">
    <h2 class="page-header-title">My Appointments</h2>
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">My Appointments</li>
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
            <h4>Manage Appointments</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <form action="../controller/edit_db.php" method="post">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Appointment Date</th>
                            <th>Time</th>
                            <th>Appointment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $i=1;
 $id=$_GET['id'];
 $sql = "SELECT * FROM tbl_service,tbl_appointment where tbl_appointment.id=$id and tbl_service.id=tbl_appointment.service_id ";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
           
                      ?>
                        <tr>
                            <td><span class="text-primary"><?php echo $i;?></span></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['a_date'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td>
                                <select name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Reject">Reject</option>
                                </select>
                            </td>
                            <td class="td-actions">
                            <input type="hidden" name="user_phone" value="<?php echo $row['contact']; ?>"> 
                            <input type="hidden" name="user_email" value="<?php echo $row['email']; ?>"> 
                            <input type="hidden" name="service_name" value="<?php echo $row['service_name']; ?>"> 
                            <input type="hidden" name="appoint_id" value="<?php echo $id; ?>">
                                <input type="submit" name="btn_appoint_status" class="btn btn-primary" value="Submit">
                                <!-- <i class="la la-check-circle-o la-2x" style="color:blue;"></i> -->
                            </td> 
                        </tr>
            <?php  $i++;   } ?>
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