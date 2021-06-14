<?php include('include/header.php');  ?>

     <!-- Begin Content -->
     <div class="content-inner profile">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
                                <div class="d-flex align-items-center">
                                    <h2 class="page-header-title">Profile</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <div class="row flex-row">
                            <div class="col-xl-3">
                                <!-- Begin Widget -->
                                <div class="widget has-shadow">
                                    <div class="widget-body">
                                        <div class="mt-5">
                                            <img src="../controller/serviceprovider/profile/<?php echo $_SESSION['Profile']; ?>" alt="..." style="width: 120px;" class="avatar rounded-circle d-block mx-auto">
                                        </div>
 <?php  
 if(isset( $_SESSION['SP_id'] ))
 {
 $id= $_SESSION['SP_id'];
 
 $sql = "SELECT * FROM tbl_serviceprovider where id=$id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
                      ?>
                                        <h3 class="text-center mt-3 mb-1"><?php echo $row['name']; ?></h3>
                                        <p class="text-center"><?php echo $row['email']; ?></p>
                                        <div class="em-separator separator-dashed"></div>
                                        <ul class="nav flex-column">
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0)"><i class="la la-bell la-2x align-middle pr-2"></i>Notifications</a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="Appoint.php"><i class="la la-comments la-2x align-middle pr-2"></i>My Appointments</a>
                                            </li>
                                          
                                            <li class="nav-item">
                                                <a class="nav-link" href="Estimate.php"><i class="la la-clipboard la-2x align-middle pr-2"></i>Estimation Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Book.php"><i class="la la-briefcase la-2x align-middle pr-2"></i>Hired</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="changepassword.php"><i class="la la-gears la-2x align-middle pr-2"></i>Settings</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </div>
                            <div class="col-xl-9">
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Update Profile</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="col-10 ml-auto">
                                            <div class="section-title mt-3 mb-3">
                                                <h4>01. Personnal Informations</h4>
                                            </div>
                                        </div>
                                        <form class="form-horizontal" action="../controller/edit_db.php" method="post">
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Full Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control"name="email" value="<?php echo $row['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control"name="contact" value="<?php echo $row['contact']; ?>">
                                                </div>
                                            </div>
                                        <div class="col-10 ml-auto">
                                            <div class="section-title mt-3 mb-3">
                                                <h4>02. Address Informations</h4>
                                            </div>
                                        </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Address</label>
                                                <div class="col-lg-6">
                                                    <?php
                                                    if(isset($row['address']))
                                                    { ?>
                                                    <input type="text"name="address" class="form-control"value="<?php echo $row['address']; ?>">
                                                    <?php }
                                                    else
                                                    {?>
                                                     <input type="text"name="address" class="form-control"value="">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">State</label>
                                                <div class="col-lg-6">
                                                <select id="state" name="state" class="form-control">
                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
													<option value="Selangor">Selangor</option>
													<option value="Putrajaya">Putrajaya</option>
													<option value="Johor">Johor</option>
													<option value="Kedah">Kedah</option>
													<option value="Kelantan">Kelantan</option>
													<option value="Melaka">Melaka</option>
													<option value="Negeri Sembilan">Negeri Sembilan</option>
													<option value="Pahang">Pahang</option>
													<option value="Penang">Penang</option>
													<option value="Perak">Perak</option>
													<option value="Sabah">Sabah</option>
													<option value="Sarawak">Sarawak</option>
													<option value="Terengganu">Terengganu</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Postcode</label>
                                                <div class="col-lg-6">
                                                <?php 
                                                 if(isset($row['pincode'])) {
                                               ?>  <input type="number"name="pincode" class="form-control" value="<?php echo $row['pincode']; ?>" maxlength="5" minlength="5">
                                                <?php    }
                                                else
                                                { ?>
                                                    <input type="number"name="pincode" class="form-control" value="" maxlength="5" minlength="5">
                                                <?php }
                                                 ?>
                                                </div>
                                            </div>
                                       <div class="em-separator separator-dashed"></div>
                                        <div class="text-right">
                                            <button name="btn_profileupdate" class="btn btn-gradient-01" type="submit">Save Changes</button>
                                            <!-- <button name="cancle"class="btn btn-shadow" type="reset">Cancel</button> -->
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->             
            <!-- End Page Content -->
        </div>
        <?php 
            }
 }
 if(isset( $_SESSION['pro_id'] ))
 {
    $id= $_SESSION['pro_id'];
 $sql = "SELECT * FROM tbl_serviceprovider_pro where pro_id=$id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {     
            
                      ?>
                                        <h3 class="text-center mt-3 mb-1"><?php echo $row['name']; ?></h3>
                                        <p class="text-center"><?php echo $row['email']; ?></p>
                                        <div class="em-separator separator-dashed"></div>
                                        <ul class="nav flex-column">
                                        <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0)"><i class="la la-bell la-2x align-middle pr-2"></i>Notifications</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Appoint.php"><i class="la la-comments la-2x align-middle pr-2"></i>My Appointments</a>
                                            </li>
                                          
                                            <li class="nav-item">
                                                <a class="nav-link" href="Estimate.php"><i class="la la-clipboard la-2x align-middle pr-2"></i>Estimation Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="Book.php"><i class="la la-briefcase la-2x align-middle pr-2"></i>Hired</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="changepassword.php"><i class="la la-gears la-2x align-middle pr-2"></i>Settings</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </div>
                            <div class="col-xl-9">
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Update Profile</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="col-10 ml-auto">
                                            <div class="section-title mt-3 mb-3">
                                                <h4>01. Personnal Informations</h4>
                                            </div>
                                        </div>
                                        <form class="form-horizontal" action="../controller/edit_db.php" method="post">
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Full Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control"name="email" value="<?php echo $row['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control"name="contact" value="<?php echo $row['contact']; ?>">
                                                </div>
                                            </div>
                                        <div class="col-10 ml-auto">
                                            <div class="section-title mt-3 mb-3">
                                                <h4>02. Address Informations</h4>
                                            </div>
                                        </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Address</label>
                                                <div class="col-lg-6">
                                                    <?php
                                                    if(isset($row['address']))
                                                    { ?>
                                                    <input type="text"name="address" class="form-control"value="<?php echo $row['address']; ?>">
                                                    <?php }
                                                    else
                                                    {?>
                                                     <input type="text"name="address" class="form-control"value="">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">State</label>
                                                <div class="col-lg-6">
                                                <select id="state" name="state" class="form-control">
                                                    <option value="maharashtra">Maharashtra</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">pincode</label>
                                                <div class="col-lg-6">
                                                <?php 
                                                 if(isset($row['pincode'])) {
                                               ?>  <input type="number"name="pincode" class="form-control" value="<?php echo $row['pincode']; ?>" maxlength="5" minlength="5">
                                                <?php    }
                                                else
                                                { ?>
                                                    <input type="number"name="pincode" class="form-control" value="" maxlength="5" minlength="5">
                                                <?php }
                                                 ?>
                                                </div>
                                            </div>
                                       <div class="em-separator separator-dashed"></div>
                                        <div class="text-right">
                                            <button name="btn_profileupdate" class="btn btn-gradient-01" type="submit">Save Changes</button>
                                            <!-- <button name="cancle"class="btn btn-shadow" type="reset">Cancel</button> -->
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->             
            <!-- End Page Content -->
        </div>
        <?php 
            }
        }
        include('include/footer.php');  ?>