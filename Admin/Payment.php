<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Activate Account</h2>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
            
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Edit Account status</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
    <?php  
    $id=$_GET['id'];
    $sql = "SELECT *, tbl_plan.name as planname,tbl_serviceprovider.name as spname  FROM tbl_serviceprovider,tbl_plan_purchase,tbl_plan where tbl_plan_purchase.sp_id=tbl_serviceprovider.id and purchase_id='$id' and tbl_plan.id=tbl_plan_purchase.plan_id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
    ?>
                                        <form role="form" method="post" action="../controller/edit_db.php?id=<?php echo $id; ?>">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                    <th>Order id</th>
                                                       <th>Provider Name</th>
                                                        <th>Amount</th>
                                                        <th>Start Date</th>
                                                        <th>Expire Date</th>
                                                        <th>Payment Status</th>
                                                        <th>Plan Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td><?php echo $row['order_id']; ?></td>
                                                       <td><?php echo $row['spname']; ?></td>
                                                        <td><?php echo $row['amount']; ?></td>
                                                       <td><?php echo $row['start_date']; ?></td>
                                                       <td><?php echo $row['end_date']; ?></td>
                                                      <td><span style="width:100px;"><span class="badge-text badge-text-medium info"><?php echo $row['payment']; ?></span></span></td>
                                                        <td>
                                                            <select name="plan" class="form-control" required>
                                                                <option value="">Select Status</option>
                                                                <option value="Activate">Activate</option>
                                                                <option value="Deactivate">Deactivate</option>
                                                            </select>
                                                        </td>
                                                        <td class="td-actions">
                                                            <input type="submit" name="btnPlan_status" value="Update" class="btn btn-md btn-primary">  
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>