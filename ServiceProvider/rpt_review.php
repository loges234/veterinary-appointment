<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
    <div class="page-header">
    <!-- <div class="d-flex align-items-center"> -->
    <h1 align="center">Review Report</h1>
       
    <!-- </div> -->
    </div>
    </div>
<!-- End Page Header -->
<?php $id=$_SESSION['SP_id']; ?>
<font color="black"><a href="review.php">Review</a>  |<a href="rpt_review.php?id=<?php echo $id; ?>">Review Report</a></font> <br><br>
   
<div class="row">
<div class="col-xl-12">
    <!-- Sorting -->
    <div class="widget has-shadow">
        <!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
           <br> <h4 align="center">Review Report</h4><hr>
        <!-- </div> -->
        <div class="widget-body">
            <div class="table-responsive">
                <table id="export-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $i=1;
$id=$_SESSION['SP_id'];
 $sql = "SELECT * FROM tbl_review,tbl_service where  tbl_service.sp_id=$id and tbl_review.service_id=tbl_service.id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
           
                      ?>
                        <tr>
                            <td><span class="text-primary"><?php echo $i;?></span></td>
                            <td><?php echo $row['name'];?></td>
                           <td><?php echo $row['message'];?></td>
                            <td><?php echo $row['date'];?></td>
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