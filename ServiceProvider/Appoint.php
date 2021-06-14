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
            <h4>My Appointments</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th><center>Sr.No</center></th>
                            <th><center>Service Name</center></th>
                            <th><center>Category</center></th>
                            <th><center>Read More</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
 if(isset($_SESSION['SP_id'] ))
 {
 $id= $_SESSION['SP_id'];
 }
 if(isset($_SESSION['pro_id'] ))
 {
 $id= $_SESSION['pro_id'];
 }
 $i=1;
 $sql = "SELECT * FROM tbl_service where sp_id=$id  ";
 $result=$connect->query($sql);
 while($row = $result->fetch_array())
 {  
          
    $service_id=$row['id'];
                      ?>
                        <tr>
                            <td><center><span class="text-primary"><?php echo $i;?></span></center></td>
                            <td><center><span class="text-primary"><?php echo $row['service_name'];?></span></center></td>
                            <td><center><span class="text-primary"><?php echo $row['category'];?></span></center></td>
                             <td class="td-actions">
                             <center>  
                                  <a href="Appointment.php?id=<?php echo $service_id; ?>">
                                        <font size="3" color="blue">View Appointments<i class="la la-mail-forward la-1x" style="color:blue;"></i></font>
                                  </a>
                             </center>
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