<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Permission - Service Providers Account</h2>
                    <div>
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
                                        <!-- <h4>Service Category</h4> -->
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Order id</th>
                                                        <!-- <th>Provider Id</th> -->
                                                        <th>Provider Name</th>
                                                        <th>Plan Name</th>
                                                        <th>Amount</th>
                                                        <th>Start Date</th>
                                                        <th>Expire Date</th>
                                                        <th>Payment Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php  
                                            $sql = "SELECT * , tbl_plan.name as planname,tbl_serviceprovider.name as spname FROM tbl_serviceprovider,tbl_plan_purchase,tbl_plan where tbl_plan_purchase.sp_id=tbl_serviceprovider.id and tbl_plan.id=tbl_plan_purchase.plan_id";
                                                $result=$connect->query($sql);
                                                while($row = $result->fetch_array())
                                                {     
                                                
                                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['order_id']; ?></td>
                                                       <td><?php echo $row['spname']; ?></td>
                                                       <td><?php echo $row['planname']; ?></td>
                                                       <td><?php echo $row['amount']; ?></td>
                                                       <td><?php echo $row['start_date']; ?></td>
                                                       <td><?php echo $row['end_date']; ?></td>
                                                       <td><span style="width:100px;"><span class="badge-text badge-text-medium info"><?php echo $row['payment']; ?></span></span></td>
                                                         <td class="td-actions">
                                                            <a href="../ServiceProvider/payment/TxnStatus.php?id=<?php echo $row['purchase_id']; ?>&oid=<?php echo $row['order_id']; ?>"><i class="la la-edit edit"></i></a>
                                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>
