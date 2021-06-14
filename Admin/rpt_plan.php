<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Subscription Plan</h2>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
            <h2 align="center">Report Of Plan</h2>
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
                                       
                                    <!-- </div> -->
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="export-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Plan ID</th>
                                                        <th>Plan Name</th>
                                                        <th>Quarterly Price</th>
                                                        <th>Six Month Price</th>
                                                        <th>Annual Price</th>
                                                        <!-- <th>Actions</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php  
 $sql = "SELECT * FROM tbl_plan";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            
                      ?>
                                                    <tr>
                                                        <td><span class="text-primary"><?php echo $row['id']; ?></span></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['quarter']; ?></td>
                                                        <td><?php echo $row['six_month']; ?></td>
                                                        <td><?php echo $row['annual']; ?></td>
                                                       
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>