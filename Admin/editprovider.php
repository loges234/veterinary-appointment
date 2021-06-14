<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">Service Provider</h2>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
            
            <div class="row">
                            <div class="col-xl-12">
                                <!-- Sorting -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Edit Service Provider Details</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <?php  
                                            $id=$_GET['id'];
                                            $sql = "SELECT *,tbl_category.id as cid,tbl_category.name as cname,tbl_serviceprovider.name as sname FROM tbl_serviceprovider,tbl_category where tbl_category.id=tbl_serviceprovider.category and tbl_serviceprovider.id=$id";
                                                    $result=$connect->query($sql);
                                                    while($row = $result->fetch_array())
                                                    {    
                                                        $contact=$row['contact']; 
                                                        $status=$row['status']; 
                                                        $email=$row['email']; 
                                                        $sname=$row['sname'];
                                            ?>
                                        <form role="form" method="post" action="../controller/edit_db.php?id=<?php echo $row['id']; ?>">
                                            <table id="sorting-table" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-primary"><input name="id" type="text"class="form-control" value="<?php echo $row['id']; ?>" readonly></span></td>
                                                        <td><input name="name" type="text"class="form-control" value="<?php echo $sname; ?>" required></td>
                                                        <td><input name="contact" type="text"class="form-control" value="<?php echo $contact; ?>" required></td>
                                                        <td><input name="email" type="email"class="form-control" value="<?php echo $email; ?>" required></td>
                                                        <td><div class="form-group">
                                                        <select id='status' name='status' class="form-control" >
                                                        <option  value="<?php echo $status;?>"> <?php echo $status;?></option>
                                                        <?php
                                                            if($status =="Active"){
                                                            ?>
                                                            <option  value="Deactive">Deactive</option>
                                                        <?php } else
                                                        {
                                                        ?>
                                                            <option  value="Active">Active</option>
                                                        <?php }?>
                                                    </select>
                                                    </div></td>
                                                        <td class="td-actions">
                                                            <input type="submit" name="btnProvider" value="Update" class="btn btn-md btn-primary">  
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