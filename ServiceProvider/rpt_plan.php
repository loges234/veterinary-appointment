<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- <div class="row">
    <div class="page-header">
    <div class="d-flex align-items-center">
    <h2 class="page-header-title">My Plan Details</h2>
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">My Plan Details</li>
            </ul>
        </div>
    </div>
    </div>
    </div> -->
<!-- End Page Header -->
<h1 align="center">Plan Report</h1>
<div class="row">
<div class="col-xl-12">
    <!-- Sorting -->
    <div class="widget has-shadow">
        <!-- <div class="widget-header bordered no-actions d-flex align-items-center">
            
        </div> -->
        <div class="widget-body">
            <div class="table-responsive">
                <table id="export-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th><center>Sr.No</center></th>
                            <th><center>Plan Name</center></th>
                            <th><center>Period</center></th>
                            <th><center>Amount</center></th>
                            <th><center>Start Date</center></th>
                            <th><center>End Date</center></th>
                            <th><center>Plan Status</center></th>
                             <th><center>Receipt</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
 if(isset($_SESSION['SP_id'] ))
 {
 $id= $_SESSION['SP_id'];
 
 $i=1;
 $sql = "SELECT * FROM tbl_plan_purchase,tbl_plan where sp_id=$id and tbl_plan.id=tbl_plan_purchase.plan_id ";
 $result=$connect->query($sql);
 while($row = $result->fetch_array())
 {  
     $pid=$row['purchase_id'];
          
                      ?>
                        <tr>
                            <td><center><span class="text-primary"><?php echo $i;?></span></center></td>
                            <td><center><span class="text-primary"><?php echo $row['name'];?></span></center></td>
                            <td><center><span class="text-primary"><?php echo $row['period'];?></span></center></td>
                            <td><center><span class="text-primary"><?php echo $row['amount'];?></span></center></td>
                            <?php 
                            $status=$row['plan_status'];
                            if($status!='Waiting') { ?>
                            <td><center><span class="text-primary"><?php echo $row['start_date'];?></span></center></td>
                            <td><center><span class="text-primary"><font color="red"><?php echo $row['end_date'];?></font></span></center></td>
                            <td><center><span class="text-primary"><span class="badge-text badge-text-medium info"><?php echo $row['plan_status']; ?></span></span></center></td>
                            <?php
                            $tstatus=$row['plan_status'];
                            if($tstatus!='Activate'){ ?>
                            <td> </td>
                           <?php }else{
                            ?>
                            <td><center><a href="invoice.php?id=<?php echo $pid; ?>"download target="_blank" ><i class="la la-file-text-o la-2x" style="color:blue"></i></a></center></td>
                            <?php } } ?>
                        </tr>
            <?php  $i++;  } } ?>
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