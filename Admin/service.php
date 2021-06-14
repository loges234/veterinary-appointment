<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Services List</h2>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
           <h3 style="color: black" align="right"><a href="service.php">Services</a> | <a href="rpt_service.php">Service Report</a></h3> 
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
                                        <br><h4 align="center">List Of Services</h4>
                                        <hr>
                                    <!-- </div> -->
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Service ID</th>
                                                        <th>Service Name</th>
                                                        <th>Category</th>
                                                         <th>Location</th>
                                                         <th>Registration Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php  
 $sql = "SELECT * FROM tbl_service";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            
                      ?>
                                                    <tr>
                                                        <td><span class="text-primary"><?php echo $row['id']; ?></span></td>
                                                        <td><?php echo $row['service_name']; ?></td>
                                                        <td> <?php echo $row['category']; ?></td>
                                                        <td> <?php echo $row['location']; ?></td>
                                                        <td> <?php echo $row['reg_date']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>