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
            
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Edit Service Category</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
    <?php  
    $id=$_GET['id'];
    $sql = "SELECT * FROM tbl_category where id=$id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
    ?>
                                        <form role="form" method="post" action="../controller/edit_db.php?id=<?php echo $row['id']; ?>"  enctype="multipart/form-data">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Category ID</th>
                                                        <th>Category Name</th>
                                                        <th>Image</th>
                                                         <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td><span class="text-primary"><input name="id" type="text"class="form-control" value="<?php echo $row['id']; ?>" readonly></span></td>
                                                        <td><input name="name" type="text"class="form-control" value="<?php echo $row['name']; ?>" required></td>
                                                       <td>
                                                       <div class="input-group">
                                        <span class="input-group-addon addon-secondary">
                                                <i class="la la-cloud-upload" style="font-size:30px;color:red"></i>
                                        </span>
                                            <input type="file" name="banner" class="form-control" style="font-size:15px;color:red" accept="image/*"   required autofocus />
                                        </div>
                                                       </td>
                                                        <td class="td-actions">
                                                            <input type="submit" name="btnService" value="Update" class="btn btn-md btn-primary">  
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