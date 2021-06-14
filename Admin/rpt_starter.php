<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Starter Plans Report</h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
         
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                      <br> <h4 align="center">List Of Service Provider</h4><hr>
                                     <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="export-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Provider Id</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>City</th>
                                                        <th>Plan Period</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php  
 $sql = "SELECT * FROM tbl_serviceprovider,tbl_plan_purchase where tbl_serviceprovider.id=tbl_plan_purchase.sp_id and plan_status='Activate' and plan_id='1'";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            
                      ?>
                                                    <tr>
                                                        <td><span class="text-primary"><?php echo $row['id']; ?></span></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['contact']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><?php echo $row['period']; ?></td>
                                                        <td><i class="la la-rupee" style="color:black"><?php echo $row['amount']; ?></i></td>
                                                        <td><span style="width:100px;"><span class="badge-text badge-text-medium info"><?php echo $row['payment']; ?></span></span></td>
                                                      
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>