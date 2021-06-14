<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Report Of Registered User </h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
         
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <p style="color:black">
                                List Of Users | <a href="montly.php"> Graphical Report </a> 
                                </p>
                                <div class="widget has-shadow">
                                      <br> <h4 align="center">List Of Users</h4><hr>
                                     <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="export-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>User Id</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>City</th>
                                                        <th>Profile</th>
                                                        <th>Address</th>
                                                        <th>Pincode</th>
                                                        <th>Registration Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php  
 $sql = "SELECT * FROM tbl_user";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            
                      ?>
                                                    <tr>
                                                        <td><span class="text-primary"><?php echo $row['user_id']; ?></span></td>
                                                        <td><?php echo $row['user_name']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['city']; ?></td>
                                                        <td><img src="../user/profile/<?php echo $row['profile']; ?>"height="80"width="100" alt="No Img"></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['pincode']; ?></td>
                                                        <td><?php echo $row['reg_date']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>