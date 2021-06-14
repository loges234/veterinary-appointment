"<?php include('include/header.php');  ?>

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
                                                    $sql = "SELECT * FROM tbl_service where SP_id=$sid and id=$service_id  ";
                                                                $result=$connect->query($sql);
                                                                while($row = $result->fetch_array())
                                                                {     
                                                                    $id=$row['id'];
                                                                    $phone=$row['phone'];
                                                                    $address=$row['location'];
                                                                    $desc=$row['description'];
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
                                                                    <input type="text" value="<?php echo $row['service_name']; ?>" name="name" class="form-control" readonly  autofocus>
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
                                                                   <input type="email" value="<?php echo $email; ?>" name="email" class="form-control"  autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-5">
                                                            <div class="col-xl-3"></div>
                                                                <div class="col-xl-6 mb-3">
                                                                    <label class="form-control-label">Phone</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon addon-secondary">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                        <input type="text" class="form-control" value="<?php echo $phone; ?>" name="contact"readonly  autofocus>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="section-title mt-5 mb-5">
                                                                <h4>Address</h4>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <div class="col-xl-6 mb-3">
                                                                    <label class="form-control-label">Address<span class="text-danger ml-2">*</span></label>
                                                                    <input type="text" value="<?php echo $address; ?>"name="address" class="form-control"readonly  autofocus>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <label class="form-control-label">Country<span class="text-danger ml-2">*</span></label>
                                                                    <select name="country" class="custom-select form-control" >
                                                                       <option value="India">India</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <div class="col-xl-4 mb-3">
                                                                    <label class="form-control-label">City<span class="text-danger ml-2">*</span></label>
                                                                       <input type="text" value="<?php echo $city;?>"name="city" class="form-control"  autofocus>
                                                                   </div>
                                                                <div class="col-xl-4 mb-5">
                                                                    <label class="form-control-label">State<span class="text-danger ml-2">*</span></label>
                                                                    <select name="state" class="custom-select form-control" >
                                                                       <option value="Maharashtra">Maharashtra</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <label class="form-control-label">Pincode<span class="text-danger ml-2">*</span></label>
                                                                   <input type="number" value="<?php echo $pincode; ?>"name="pincode" class="form-control"  autofocus>
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
                                                                        <input type="number" value="<?php echo $exp;?>"name="year" class="form-control"  autofocus>
                                                                       </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group">
                                                                        <label class="form-control-label">Starting Date<span class="text-danger ml-2">*</span></label>
                                                                           <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="la la-calendar"></i>
                                                                                </span>
                                                                                <input type="date" class="form-control" id="date" name="date" value="<?php echo $start_date;?>" >
                                                                            </div>
                                                                         </div>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label class="form-control-label">About Your Service<span class="text-danger ml-2">*</span></label>
                                                                  <textarea class="form-control"name="details" rows="8"autofocus readonly ><?php echo $desc;?></textarea>
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
                                                                    <label class="form-control-label">1. Do you have a standard pricing system for your services? If so, please share the details here.<span class="text-danger ml-2">*</span></label>      
                                                                        <textarea class="form-control"name="faq1" rows="5"autofocus ><?php echo $faq1;?></textarea>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <label class="form-control-label">2. What is your typical process for working with a new customer?<span class="text-danger ml-2">*</span></label>
                                                                        <textarea class="form-control" name="faq2" rows="5"autofocus ><?php echo $faq2;?></textarea>
                                                                     </div>
                                                                </div>
                                                           
                                                            <ul class="pager wizard text-right">
                                                                <li class="previous d-inline-block">
                                                                    <a href="javascript:void(0)" class="btn btn-secondary ripple">Previous</a>
                                                                </li>
                                                                <li class="next d-inline-block">
                                                                    <button type="submit" name="btn_updateservicedetails" class="finish btn btn-gradient-01" >Update</button>
                                                                </li>
                                                                <?php }?>
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
                            </div><li class="next d-inline-block" style="position:absolute;top:90px; right:20px;">
                           <a href="service.php?id=<?php echo $id; ?>" >  <button name="video" class="finish btn btn-gradient-01"style=" position: absolute;top:90px;  right:20px; font-size:15px;" >Back </button>
                            </li>   
                            
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
<?php include('include/footer.php');  ?>"