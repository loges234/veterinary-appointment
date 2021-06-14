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
                                                <a class="nav-link" href="plan_status.php"><i class="la la-bolt la-2x align-middle pr-2"></i>Plan Status</a>
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
                                        <h4>Change Password</h4>
                                    </div>
                                    <div class="widget-body">
                                    <h2 align="center"><b>Change Password</b></h2><br>
                            <form class="form-horizontal" action="../controller/edit_db.php" method="post">
                            <div class="form-group">
                                    <label for="">Old Password <sup style="font-size:16px;color:red">*</sup></label>
                                    <input type="password" name="old"class="form-control" placeholder="Enter Old Password" required>
                            </div>
                                <div class="form-group">
                                    <label for="">New Password<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="password" name="password"  onchange="callfunction()" type="password" class="form-control" placeholder="Enter 6 Character Password" minlength="4" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Retype Password<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="cpassword" name="cpassword" type="password" class="form-control" placeholder="Confirm Password" onkeyup='check();' minlength="6" required>
                                </div>
                                <p align="center" id="error" style="color:red"></p>
                                                    
                            <div class="em-separator separator-dashed"></div>
                            <div class="text-center">
                                <button name="btnpassword" class="btn btn-primary" type="submit">Change Password</button>
                                <!-- <button name="cancle"class="btn btn-shadow" type="reset">Cancel</button> -->
                            </div>
                            </form>
                            <script>
                                function callfunction()
                                {
                                    var textBox = document.getElementById("password");
                                    var textLength = textBox.value.length;
                                        if(textBox.value=='' || textLength<=6)
                                        {
                                        document.getElementById('error').innerHTML='Please entered more than 6 characters for password';
                                        }
                                        else{
                                            document.getElementById('error').innerHTML='';
                                        }
                                    
                                }
                                function check()
                                    {
                                        var pass=document.getElementById('password').value;
                                        var cpass=document.getElementById('cpassword').value;
                                        var plength=length.pass;
                                        var clength=length.cpass;
                                        if(plength!= clength || pass!=cpass)
                                        {
                                            document.getElementById('error').innerHTML='Password is Not matched'; 
                                        }
                                        else
                                        {
                                        document.getElementById('error').innerHTML='Password is matched'; 
                                        }
                                    }
                                </script>
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
        include('include/footer.php');  ?>
        