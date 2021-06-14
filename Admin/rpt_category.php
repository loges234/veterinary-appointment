<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Service Category</h2>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
            <h3 align="center">Report Of Service Category</h3>
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                 
                                   <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="export-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Category ID</th>
                                                        <th>Category Name</th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php  
 $sql = "SELECT * FROM tbl_category";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            
                      ?>
                                                    <tr>
                                                        <td><span class="text-primary"><?php echo $row['id']; ?></span></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td> <img src="../User/bg/<?php echo $row['image']; ?>" alt="img" style="width:150px; height:70px" ></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Sorting -->
<?php include('include/footer.php');  ?>