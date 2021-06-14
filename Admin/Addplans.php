<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Subscription Plan</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><a class="btn btn-gradient-01" style="color: white" data-toggle="modal" data-target="#modal-centered">Add Plan</a></li>
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
                            <h4 class="modal-title">Add Subscription Plan</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true" style="color:red">×</span>
                                <span class="sr-only">close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <form role="form" method="post" action="../controller/add_db.php" >
                                    <fieldset>
                                    <p align="center" id="error" style="color:red"></p>
                                        <div class="form-group">
                                        <label for="text"><b>Subscription Plan Name:</b><sup style="font-size:16px;color:red">*</sup></label>
                                            <input type="text" name="plan_name" id="plan_name" class="form-control input-lg" placeholder="Enter Plan Name"required  onkeypress="return onlyAlphabets(event,this);" autofocus onblur="onLeave()" >
                                        </div>
                                        <div class="form-group">
                                        <label for="text"><b>Quarterly Price:</b><sup style="font-size:16px;color:red">*</sup></label>
                                            <input type="text" name="quarterly" id="quarterly" class="form-control input-lg" placeholder="Enter Quarterly Price"required autofocus onkeypress="return isNumberKey1(event)">
                                        </div>
                                        <div class="form-group">
                                        <label for="text"><b>Six Monthly Price:</b><sup style="font-size:16px;color:red">*</sup></label>
                                            <input type="text" name="six_month" id="six_month" class="form-control input-lg" placeholder="Enter Six Monthly Price"required autofocus onkeypress="return isNumberKey1(event)">
                                        </div>
                                        <div class="form-group">
                                        <label for="text"><b>Annual Price:</b><sup style="font-size:16px;color:red">*</sup></label>
                                            <input type="text" name="annual" id="annual" class="form-control input-lg" placeholder="Enter Annual Price"required autofocus onkeypress="return isNumberKey1(event)">
                                        </div>
                                        <div>
                                            <center></br><input type="submit" class="btn btn-md btn-primary"  name="btnplan" value="Add">
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
                                        <h4>Sorting</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
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
                                                        <td class="td-actions">
                                                            <a href="Editplans.php?id=<?php echo $row['id']; ?>"><i class="la la-edit edit"></i></a>
                                                            <a href="deleteplan.php?id=<?php echo $row['id']; ?>"><i class="la la-close delete"></i></a>
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