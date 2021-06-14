<?php include('include/header.php');  ?>

<div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Service Details</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
			                                <li class="breadcrumb-item active">Service Details</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <div class="row flex-row">
                            <div class="col-xl-12">
                                <!-- Form -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Add More Details of Service</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="row flex-row justify-content-center">
                                            <div class="col-xl-10">
                                                <div id="rootwizard">
                                                    <div class="step-container">
                                                        <div class="step-wizard">
                                                            <div class="progress">
                                                                <div class="progressbar"></div>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <a href="#tab1" data-toggle="tab">
                                                                        <span class="step">1</span>
                                                                        <span class="title">Basic Profile</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#tab2" data-toggle="tab">
                                                                        <span class="step">2</span>
                                                                        <span class="title">Service Info</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#tab3" data-toggle="tab">
                                                                        <span class="step">3</span>
                                                                        <span class="title">FAQ</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                    
                                                    <?php  
                                                    if(isset($_SESSION['SP_id']))
                                                    {
                                                    $sid= $_SESSION['SP_id'];
                                                    }
                                                    if(isset($_SESSION['pro_id']))
                                                    {
                                                    $sid= $_SESSION['pro_id'];
                                                    }
                                                    $service_id=$_GET['id'];
                                                    $sql = "SELECT * FROM tbl_service where SP_id=$sid and id=$service_id ";
                                                                $result=$connect->query($sql);
                                                                while($row = $result->fetch_array())
                                                                {     
                                                                    $id=$row['id'];
                                                                    $phone=$row['phone'];
                                                                    $address=$row['location'];
                                                                    $desc=$row['description'];
                                                                    $sname=$row['service_name'];
                                                                    $appointment_fee=$row['appointment_fee'];
                                                            ?>
                                                    <form class="form-horizontal" action="../controller/edit_db.php" method="post" enctype="multipart/form-data">
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="tab1">
                                                            <div class="section-title mt-5 mb-5">
                                                                <h4>Personal Informations</h4>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <div class="col-xl-6 mb-3">
                                                                    <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                                                                    <input type="hidden" value='<?php echo $id;?>' name='id'>
                                                                    <input type="text" value="<?php echo $row['service_name']; ?>" name="name" class="form-control" readonly autofocus>
                                                                </div>
                                                                <?php $sql="select * from tbl_service_details where service_id=$id";
                                                                    $result=mysqli_query($connect,$sql);
                                                                    while($row=mysqli_fetch_array($result))
                                                                    {
                                                                        $email=$row['email'];
                                                                        $pincode=$row['pincode'];
                                                                        $city=$row['city'];
                                                                        $exp=$row['exp'];
                                                                        $start_date=$row['start_date'];
                                                                        $details=$row['details'];
                                                                    }

                                                                ?>
                                                                <div class="col-xl-6">
                                                                    <label class="form-control-label">Email<span class="text-danger ml-2">*</span></label>
                                                                    <?php if(isset($email)){  ?>
                                                                    <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" readonly autofocus>
                                                                    <?php } else { ?>
                                                                         <input type="email" value="" name="email" class="form-control" required autofocus>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-5">
                                                            <!-- <div class="col-xl-3"></div> -->
                                                                <div class="col-xl-6 mb-3">
                                                                    <label class="form-control-label">Phone</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon addon-secondary">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                        <input type="text" class="form-control" value="<?php echo $phone; ?>" name="contact" readonly autofocus>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 mb-3">
                                                                    <label class="form-control-label">Appointment Fee</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon addon-secondary">
                                                                            <i class="la la-dollar"></i>
                                                                        </span>
                                                                        <input type="text" class="form-control" value="<?php echo $appointment_fee; ?>" name="appointment_fee" readonly autofocus>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="section-title mt-5 mb-5">
                                                                <h4>Address</h4>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <div class="col-xl-6 mb-3">
                                                                    <label class="form-control-label">Address<span class="text-danger ml-2">*</span></label>
                                                                    <input type="text" value="<?php echo $address; ?>"name="address" class="form-control" readonly autofocus>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label class="form-control-label">Country<span class="text-danger ml-2">*</span></label>
                                                                    <select name="country" class="custom-select form-control" readonly>
                                                                       <option value="Malaysia">Malaysia</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <div class="col-xl-4 mb-3">
                                                                    <label class="form-control-label">City<span class="text-danger ml-2">*</span></label>
                                                                    <?php if(isset($city)) {  ?>
                                                                        <input type="text" value="<?php echo $city;?>"name="city" class="form-control" readonly autofocus>
                                                                    <?php } else {  ?>
                                                                        <input type="text" value="" name="city" class="form-control" required autofocus>
                                                                    <?php } ?>
                                                                   </div>
                                                                <div class="col-xl-4 mb-5">
                                                                    <label class="form-control-label">State<span class="text-danger ml-2">*</span></label>
                                                                    <select name="state" class="custom-select form-control" readonly>
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
                                                                <div class="col-xl-4">
                                                                    <label class="form-control-label">Postcode<span class="text-danger ml-2">*</span></label>
                                                                    <?php if(isset($pincode)) {  ?>
                                                                    <input type="number" value="<?php echo $pincode; ?>"name="pincode" class="form-control" readonly autofocus>
                                                                    <?php } else {  ?>
                                                                         <input type="number" value="<?php echo $row['pincode']; ?>"name="pincode" class="form-control" required autofocus>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
            
                                                            <ul class="pager wizard text-right">
                                                               <li class="next d-inline-block">
                                                                    <a href="javascript:;" class="btn btn-gradient-01">Next</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                       
                                                        <div class="tab-pane" id="tab2">
                                                            <div class="section-title mt-5 mb-5">
                                                                <h4>Service Details</h4>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Years In Business<span class="text-danger ml-2">*</span></label>
                                                                        <?php if(isset($exp)) { ?>
                                                                        <input type="number" value="<?php echo $exp;?>"name="year" class="form-control" readonly autofocus>
                                                                        <?php } else { ?>
                                                                            <input type="number" value=""name="year" class="form-control" required autofocus>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group">
                                                                        <label class="form-control-label">Starting Date<span class="text-danger ml-2">*</span></label>
                                                                        <?php if(isset($start_date)) { ?>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="la la-calendar"></i>
                                                                                </span>
                                                                                <input type="date" class="form-control" id="date" name="date" value="<?php echo $start_date;?>" readonly>
                                                                            </div>
                                                                            <?php } else { ?>
                                                                                <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="la la-calendar"></i>
                                                                                </span>
                                                                                <input type="date" class="form-control" id="date" name="date" value="" required>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label class="form-control-label">About Your Service<span class="text-danger ml-2">*</span></label>
                                                                <?php if(isset($desc)) {  ?>
                                                                    <textarea class="form-control"name="details" rows="8"autofocus readonly><?php echo $desc;?></textarea>
                                                                    <?php } else {  ?><textarea class="form-control" value=""name="details" placeholder="Type your message here ..." rows="8"autofocus required></textarea>
                                                                        <?php } ?>
                                                                    </div>
                                                           
                                                            <ul class="pager wizard text-right">
                                                                <li class="previous d-inline-block">
                                                                    <a href="javascript:;" class="btn btn-secondary ripple">Previous</a>
                                                                </li>
                                                                <li class="next d-inline-block">
                                                                    <a href="javascript:;" class="btn btn-gradient-01">Next</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            <div id="accordion-icon-right" class="accordion">
                                                               
                                                                <?php $sql="select * from tbl_faq where service_id=$id";
                                                                    $result=mysqli_query($connect,$sql);
                                                                    while($row=mysqli_fetch_array($result))
                                                                    {
                                                                        $faq1=$row['faq1'];
                                                                        $faq2=$row['faq2'];
                                                                    }

                                                                ?>
                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Frequently Ask Question </h4>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <label class="form-control-label">1. Do you have a standard pricing system for your services? If yes, please share the details here.<span class="text-danger ml-2">*</span></label>
                                                                    <?php if(isset($faq1)) {  ?>
                                                                        <textarea class="form-control"name="faq1" rows="5"autofocus readonly><?php echo $faq1;?></textarea>
                                                                    <?php } else {?>
                                                                    <textarea class="form-control" name="faq1" placeholder="Type your message here ..." rows="5"autofocus required></textarea>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <label class="form-control-label">2. What is your typical process for working with a new customer?<span class="text-danger ml-2">*</span></label>
                                                                    <?php if(isset($faq2)) {  ?>
                                                                        <textarea class="form-control" name="faq2" rows="5"autofocus readonly><?php echo $faq2;?></textarea>
                                                                    <?php } else {?>
                                                                    <textarea class="form-control"name="faq2" placeholder="Type your message here ..." rows="5"autofocus required></textarea>
                                                                    <?php } ?>
                                                                </div>
                                                                </div>
                                                           
                                                            <ul class="pager wizard text-right">
                                                                <li class="previous d-inline-block">
                                                                    <a href="javascript:void(0)" class="btn btn-secondary ripple">Previous</a>
                                                                </li>
                                                                <?php
                                                                if(!isset($email) & !isset($city) & !isset($pincode) & !isset($exp) & !isset($start_date)   & !isset($faq1)  & !isset($faq2)) {  // & !isset($banner)  & !isset($work1)  & !isset($work2)  & !isset($work3)  & !isset($video)
                                                                ?>
                                                                <li class="next d-inline-block">
                                                                    <button type="submit" name="btn_servicedetails" class="finish btn btn-gradient-01" >Submit</button>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- End Form -->
                            </div>
                             
                            <?php
                            if(isset($email) & isset($city) & isset($pincode) & isset($exp) & isset($start_date)  & isset($faq1)  & isset($faq2)) {  // & isset($banner)  & isset($work1)  & isset($work2)  & isset($work3)  & isset($video)
                            ?>
                            <li class="next d-inline-block" style="position:absolute;top:70px; right:20px;">
                           <a href="service_edit.php?id=<?php echo $id; ?>" >  <button type="submit" name="btn_servicedetails" class="finish btn btn-gradient-01"style=" position: absolute;top:90px;  right:280px; font-size:15px;" >Edit Details</button>
                            </li>
                            <?php } ?>
                            <li class="next d-inline-block" style="position:absolute;top:70px; right:20px;">
                           <a href="photo.php?id=<?php echo $id; ?>" >  <button name="photo" class="finish btn btn-gradient-01"style=" position: absolute;top:90px;  right:150px; font-size:15px;" >Add Photo</button>
                            </li> 
                            <li class="next d-inline-block" style="position:absolute;top:70px; right:20px;">
                           <a href="video.php?id=<?php echo $id; ?>" >  <button name="video" class="finish btn btn-gradient-01"style=" position: absolute;top:90px;  right:20px; font-size:15px;" >Add Video</button>
                            </li>                 
                            <?php } ?>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
<?php include('include/footer.php');  ?>"