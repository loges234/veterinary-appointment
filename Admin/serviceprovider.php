<?php include('include/header.php');  ?>

<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Service Provider</h2>
                    <div>
                    </div>
                </div>
            </div>
        </div>
            <!-- End Page Header -->
      
<div class="row flex-row">
<?php  
    $sql = "SELECT *,tbl_plan.name as pname,tbl_serviceprovider.id as s_id FROM tbl_plan_purchase,tbl_plan,tbl_serviceprovider WHERE tbl_serviceprovider.id=tbl_plan_purchase.sp_id and tbl_plan_purchase.plan_id=tbl_plan.id";
        $result=$connect->query($sql);
        while($row = $result->fetch_array())
        {     
        ?>
    <div class="col-xl-3 col-md-4 col-sm-6 col-remove">
        <!-- Begin Card -->
        <div class="widget-image has-shadow">
            <div class="quick-actions hover dark">
                <div class="dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                        <i class="la la-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="deletesp.php?id=<?php echo $row['s_id']; ?>" class="dropdown-item"> 
                            <i class="la la-trash"></i>Delete
                        </a>
                    </div>
                </div>
            </div>
            <div class="contact-card">
                <!-- Begin Widget Image -->
                <div class="cover-image mx-auto">
                    <span class="online badge-pulse-green"></span>
                    <img src="../controller/serviceprovider/profile/<?php echo $row['profile']; ?>" alt="..." class="rounded-circle mx-auto" height="120" width="200">
                </div>
                <!-- Begin Widget Body -->
                <div class="widget-body">
                    <h4 class="name"><a href="#"><?php echo $row['name']; ?></a></h4>
                    <div class="job"><?php echo $row['email']; ?></div>
                    <div class="reviews owl-carousel">
                        <div class="item">
                            <div class="stats">
                                <div class="row d-flex justify-content-between">
                                    <div class="col"><hr>
                                       <span class="text">Plan Name</span>
                                       <span class="counter"><?php echo $row['pname']; ?></span> 
                                    </div>
                                    <!-- <div class="col">
                                        <span class="counter"><?php echo $row['period']; ?></span> 
                                        <span class="text">Period</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="quick-about">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12"><hr>
                                        <h4>Address</h4>
                                        <p>
                                           <?php echo $row['address'].",".$row['city']."<br>".$row['pincode'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="btn-group" role="group">
                            <a href="spprofile.php?id=<?php echo $row['s_id'];?>" class="btn btn-gradient-01">Profile</a>
                            <!-- <a href="message.php" class="btn btn-secondary ripple">Message</a> -->
                        </div>
                    </div>
                </div>
                <!-- End Widget Body -->
            </div>
        </div>
    </div>
      <!-- End Card -->
      <?php } ?>
    </div>
    </div>
</div>
  <!-- End Sorting -->
  <!-- Begin Vendor Js -->
  <script src="../assets/vendors/js/base/jquery.min.js"></script>
        <script src="../assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="../assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="../assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="../assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="../assets/js/app/contact/contact.min.js"></script>
        <!-- End Page Snippets -->
</body>
</html>
