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
            
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Edit Plan Details</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
    <?php  
    $id=$_GET['id'];
    $sql = "SELECT * FROM tbl_plan where id=$id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
    ?>
                                        <form role="form" method="post" action="../controller/edit_db.php?id=<?php echo $row['id']; ?>">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Plan ID</th>
                                                        <th>Plan Name</th>
                                                        <th>Quarterly Price</th>
                                                        <th>Six Month Price</th>
                                                        <th>Annual Price</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-primary"><input name="id" type="text"class="form-control" value="<?php echo $row['id']; ?>" readonly></span></td>
                                                        <td><input name="name" type="text"class="form-control" value="<?php echo $row['name']; ?>" required></td>
                                                        <td><input name="quarter" type="text"class="form-control" value="<?php echo $row['quarter']; ?>" required></td>
                                                        <td><input name="six_month" type="text"class="form-control" value="<?php echo $row['six_month']; ?>" required></td>
                                                        <td><input name="annual" type="text"class="form-control" value="<?php echo $row['annual']; ?>" required></td>
                                                        <td class="td-actions">
                                                            <input type="submit" name="btnPlan" value="Update" class="btn btn-md btn-primary">  
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