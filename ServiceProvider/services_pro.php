
<?php include('include/header.php');  ?>

<!-- Begin Content -->
<div class="content-inner ">
                   <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                           <div class="page-header">
                               <div class="d-flex align-items-center">
                               <h2 class="page-header-title">Services</h2>
                                   <div>
                                       <ul class="breadcrumb">
                                           <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                                           <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                           <li class="breadcrumb-item active">Services</li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- End Page Header -->
                       <div class="row justify-content-center">
                           <div class="col-xl-11">
                               <!-- Begin Page Header-->
                               <div class="page-header pr-0 pl-0">
                                   <div class="d-flex align-items-center">
                                   <h2 class="page-header-title"></h2>
                                       <div>
                                       <div class="page-header-tools">
                                           <a class="btn btn-gradient-01" href="#" data-toggle="modal" data-target="#modal-centered">Add New Service</a>
                                       </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- End Page Header -->
                               <div class="row">
                               <?php  
                             if(isset($_SESSION['pro_id']))
                               {
                                   $id= $_SESSION['pro_id'];
                               }
                                $sql = "SELECT * FROM tbl_service where SP_id=$id";
                                           $result=$connect->query($sql);
                                           while($row = $result->fetch_array())
                                           { ?>     
                                   <div class="col-xl-3 col-md-4 col-sm-6 col-remove">
                                       <!-- Begin Card -->
                                       <div class="widget-image has-shadow">
                                           <div class="group-card">
                                               <!-- Begin Widget Body -->
                                               <div class="widget-body">
                                                   <div class="quick-actions">
                                                       <div class="dropdown">
                                                           <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                               <i class="la la-circle-o-notch"></i>
                                                           </button>
                                                           <div class="dropdown-menu">
                                                               <a href="deleteservice1.php?id=<?php echo $row['id']; ?>" class="dropdown-item"> 
                                                                   <i class="la la-trash"></i>Delete
                                                               </a>
                                                               <a href="edit_Service1.php?id=<?php echo $row['id']; ?>" class="dropdown-item"> 
                                                                   <i class="la la-edit" ></i>Edit
                                                               </a>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="cover-image mx-auto">
                                                       <img src="../controller/serviceprovider/services/<?php echo $row['photo']; ?>" alt="..."height="100" width="100" class="rounded-circle mx-auto">
                                                   </div>
                                                   <h4 class="name"><a href="service.php?id=<?php echo $row['id']; ?>"><?php echo $row['service_name']; ?></a></h4>
                                                   <div class="category"><?php echo $row['category']; ?></div>
                                                   <div class="stats text-center">
                                                       <span><i class="la la-users"></i></span>
                                                       <span class="counter"><?php echo $row['member']; ?></span> 
                                                       <span class="text">Members</span>
                                                   </div>
                                                   <div class="text-center mt-5 pb-3">
                                                       <a href="service.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary ripple">Add More Details</a>
                                                   </div>
                                               </div>
                                               <!-- End Widget Body -->
                                           </div>
                                       </div>
                                       <!-- End Card -->
                                   </div>
        <?php } ?>
                               </div> 
                               <!-- End Row -->
                           </div>
                           <!-- End Col -->
                       </div>
                       <!-- End Row -->
                   </div>
                   <!-- End Container -->
</div>

<!-- Begin Centered Modal -->
<div id="modal-centered" class="modal fade">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title">Add New Service</h4>
               <button type="button" class="close" data-dismiss="modal">
                   <span aria-hidden="true" style="color:red">×</span>
                   <span class="sr-only">close</span>
               </button>
           </div>
           <div class="modal-body">
               <p>
                   <form role="form" method="post" action="../controller/add_db.php" enctype="multipart/form-data">
                       <fieldset>
                       <div class="form-group">
                               <label for="text"><b>Service Name:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <input type="text" name="name" id="name" class="form-control input-lg"placeholder="Enter Service Name"autofocus required>
                           </div>
                          <div class="form-group">
                            <label for="text"><b>Profession:</b><sup style="font-size:16px;color:red">*</sup></label>
                            <select class='form-control' id='Profession' name='Profession' required>
                            <option value="">Select</option>
                           <?php  
$sql = "SELECT * FROM tbl_category";
           $result=$connect->query($sql);
           while($row = $result->fetch_array())
           {     
           
                     ?>
                           
                                   <option value="<?php echo $row['name']; ?> "><?php echo $row['name']; ?> </option>
                            
           <?php } ?>
           </select> 
                           </div>
                           <div class="form-group">
                            <label for="text"><b>Contact:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <input type="number" name="Contact" id="Contact" class="form-control input-lg" placeholder="Enter Contact No " minlength="10" maxlength="10" required autofocus>
                           </div>
                           <div class="form-group">
                               <label for="text"><b>Location:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <input type="text" name="Location" id="Location" class="form-control input-lg" placeholder="Enter Location Address"required autofocus >
                           </div>
                           <div class="form-group">
                               <label for="text"><b>Description:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <textarea type="text" name="Description" id="Description" class="form-control input-lg" required autofocus ></textarea>
                           </div>
                           <div class="form-group">
                               <label for="text"><b>Photo:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <input id="photo" name="photo" type="file" class="form-control input-lg" placeholder="Select Photo " required>
                           </div>
                           <div class="form-group">
                               <label for="text"><b>Memebers:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <input id="member" name="member" type="number" class="form-control input-lg"  placeholder="Select Members Count  " required>
                           </div>
                           <div class="form-group">
                               <label for="text"><b>Appointment Fee:</b><sup style="font-size:16px;color:red">*</sup></label>
                               <input id="appointment_fee" name="appointment_fee" type="number" class="form-control input-lg"  placeholder="Select Appointment Fee " required>
                           </div>
                           <div>
                               <center></br><input type="submit" class="btn btn-md btn-primary"  name="btn_service" value="Add">
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

<?php           include('include/footer.php');  ?>
