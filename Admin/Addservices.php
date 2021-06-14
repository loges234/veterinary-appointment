<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Service Category</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><a class="btn btn-gradient-01" style="color: white" data-toggle="modal" data-target="#modal-centered">Add Service Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            <!-- End Page Header -->
            <!-- Begin Centered Modal -->
            <div id="modal-centered" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Service Category</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true" style="color:red">×</span>
                                <span class="sr-only">close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <form role="form" method="post" action="../controller/add_db.php" enctype="multipart/form-data" >
                                    <fieldset>
                                    <p align="center" id="error" style="color:red"></p>
                                        <div class="form-group">
                                        <label for="text"><b>Service Category Name:</b><sup style="font-size:10px;color:red">*</sup></label>
                                            <input type="text" name="name" id="plan_name" class="form-control" placeholder="Enter Category Name"required  onkeypress="return onlyAlphabets(event,this);" autofocus onblur="onLeave()" >
                                        </div>
                                        <label for="text"><b>Service Photo:</b><sup style="font-size:10px;color:red">*</sup></label>
                                        <div class="input-group">
                                        <span class="input-group-addon addon-secondary">
                                                <i class="la la-cloud-upload" style="font-size:30px;color:red"></i>
                                        </span>
                                            <input type="file" name="banner" class="form-control" style="font-size:15px;color:red" accept="image/*"   required autofocus />
                                        </div>
                                        <div>
                                            <center></br><input type="submit" class="btn btn-md btn-primary"  name="btncategory" value="Add">
                                                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                                            </center>
                                    </div>
                                    </fieldset>
            
                                </form>
                            </p>
                        </div>
            
                    </div>
                </div>
            </div>
            <!-- End Centered Modal -->
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
                                                        <th>Category ID</th>
                                                        <th>Category Name</th>
                                                        <th>Image</th>
                                                         <th>Actions</th>
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
                                                         <td class="td-actions">
                                                            <a href="../Admin/Editservices.php?id=<?php echo $row['id']; ?>"><i class="la la-edit edit"></i></a>
                                                            <a href="../Admin/deletecategory.php?id=<?php echo $row['id']; ?>"><i class="la la-close delete"></i></a>
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