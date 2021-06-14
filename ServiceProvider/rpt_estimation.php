<?php include('include/header.php');  ?>
<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
    <div class="page-header">
    <!-- <div class="d-flex align-items-center"> -->
    <h1 align="center">Estimation Report</h1>
       
    <!-- </div> -->
    </div>
    </div>
<!-- End Page Header -->
<?php
 $service_id=$_GET['id']; 
?>
<font color="black"><a href="Estimation.php?id=<?php echo $service_id; ?>">Estimation</a> | <a href="rpt_estimation.php?id=<?php echo $service_id; ?>">Estimation Report</a> | <a href="rpt_estimate_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a> | <a href="rpt_estimate_month.php?id=<?php echo $service_id; ?>">Monthly Estimation Report</a></font><br><br>
   
<div class="row">
<div class="col-xl-12">
    <!-- Sorting -->
    <div class="widget has-shadow">
        <!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
           <br> <h4 align="center">Estimation Report</h4><hr>
        <!-- </div> -->
        <div class="widget-body">
            <div class="table-responsive">
                <table id="export-table" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <!-- <th>Issue</th> -->
                            <th>Problem</th>
                            <th>Rate</th>
                            <th>Response</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $i=1;
 $service_id=$_GET['id'];
 $sql = "SELECT * FROM tbl_estimate where service_id=$service_id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
           
                      ?>
                        <tr>
                            <td><span class="text-primary"><?php echo $i;?></span></td>
                            <td><?php echo $row['name'];?></td>
                           <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['contact'];?></td>
                            <td><?php echo $row['estimate_date'];?></td>
                            <!-- <td><img src="../User/bg/issue/<?php // echo $row['issue'];?>" height="100" width="100"></td> -->
                            <td><?php echo $row['problem1'];?></td>
                            <td><?php echo $row['rate'];?></td>
                            <?php if($row['rate']!='') { ?>
                            <td><font color="blue"><?php echo "Done";?></font></td>
                            <?php } else { ?>
                            <td><font color="red"><?php echo "Not Done"; }?></font></td>
                            <!-- <td class="td-actions">
                                <a href="Estimation_edit.php?token=<?php // echo $row['token']; ?>">
                                    <i class="la la-plus-circle" style="color: blue"></i> <font color="blue">About More</font>
                                </a>
                            </td> -->
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