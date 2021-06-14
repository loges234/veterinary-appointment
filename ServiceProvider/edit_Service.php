
<?php include('include/header.php');  ?>
<?php $id=$_GET['id']; ?>
<div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Service</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
			                                <li class="breadcrumb-item active">Edit Service</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <!-- Begin Row -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="widget has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="container-fluid">
        <?php  
    $sql = "SELECT * FROM tbl_service where id=$id";
                $result=$connect->query($sql);
                while($row = $result->fetch_array())
                {                     
                      ?>
                        <form role="form" method="post" action="../controller/edit_db.php" enctype="multipart/form-data">
                        <fieldset>
                            <h1 align="center">Edit Service Details</h1>
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                        <div class="form-group">
                                <label for="text"><b>Service Name:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control input-lg" value="<?php echo $row['service_name']; ?>"required autofocus>
                            </div>
                           <div class="form-group">
                             <label for="text"><b>Profession:</b><sup style="font-size:16px;color:red">*</sup></label>
                             <input type="text" name="profession" id="profession" class="form-control input-lg" value="<?php echo $row['category']; ?>" readonly required autofocus>
                            </div>
                            <div class="form-group">
                             <label for="text"><b>Contact:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="number" name="Contact" id="Contact" class="form-control input-lg" value="<?php echo $row['phone']; ?>" minlength="10" maxlength="10" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="text"><b>Location:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" name="Location" id="Location" class="form-control input-lg" value="<?php echo $row['location']; ?>"required autofocus >
                            </div>
                            <div class="form-group">
                                <label for="text"><b>Description:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" name="Description" id="Description" class="form-control input-lg"value="<?php echo $row['description']; ?>" required autofocus >
                            </div>
                            <div class="form-group">
                                <label for="text"><b>Memebers:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" id="number" name="member" class="form-control input-lg" value="<?php echo $row['member']; ?> "autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="text"><b>Appointment Fee:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input id="appointment_fee" name="appointment_fee" type="number" class="form-control input-lg"value="<?php echo $row['appointment_fee']; ?>"   placeholder="Select Appointment Fee " required>
                            </div>
                            <div>
                                <center></br><input type="submit" class="btn btn-md btn-primary"  name="btn_service_update" value="Update">
                                </center>
                        </div>
                        </fieldset>

                    </form>
                <?php } ?>
                    </div>
                </div>
            </div> <!-- End row -->
        </div>   
        <!-- End Page Content -->
    </div>
<?php           include('include/footer.php');  ?>