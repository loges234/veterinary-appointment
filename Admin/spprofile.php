<?php  
        include("../db_connect.php"); 
 $pid=$_GET['id'];

 $sql="SELECT * FROM `tbl_serviceprovider` WHERE id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$name=$row['name'];
$profile=$row['profile'];
}

$sql="SELECT count(*) as spnumber FROM `tbl_service` WHERE tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$service_count=$row['spnumber'];
}

$sql="SELECT count(*) as spnumber FROM `tbl_service`,tbl_appointment WHERE tbl_service.id=tbl_appointment.service_id and tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$appoint=$row['spnumber'];
}



$sql="SELECT count(*) as spnumber FROM `tbl_service`,tbl_booking WHERE tbl_service.id=tbl_booking.service_id and tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$book=$row['spnumber'];
}

$sql="SELECT count(*) as spnumber FROM `tbl_service`,tbl_estimate WHERE tbl_service.id=tbl_estimate.service_id and tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$estimation=$row['spnumber'];
}

        ?>
<html>
    <head>    
        <title>Veterinary Appointment</title>

        <link rel="stylesheet" href="../assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="../assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/owl-carousel/owl.theme.min.css">
    </head>
<body>
   <br>
        <h1 align="center"> <img src="../assets/logo.png"height="50"width="50" alt="..." style="background-color: gray">&nbsp; Veterinary Appointment</h1>
   
<div class="container">
    <div class="container-fluid">            
   <!-- Begin Row -->
   <h3 align="left"><a href="serviceprovider.php">Back To Dashboard</a></h3><center>
     <div class="row">
        <div class="col-md-12">
       
            <!-- Begin Widget 28 -->
            <div class="widget-28 widget has-shadow">
                <img src="../controller/serviceprovider/profile/<?php echo $profile; ?>"height="300"width="100%"  alt="...">
                <div class="widget-body">
                    <div class="camera-active has-shadow">
                        <div class="title"><h1><?php echo $name; ?> </h1></div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5">
                            <ul class="list-group w-100 mt-5">
                                <!-- 01 -->
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="act-title">Total Services</div>
                                        </div>
                                        <div class="media-right">
                                            <label class="pt-2 mb-0">
                                                     <?php echo $service_count; ?> 
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="act-title">Total Hired </div>
                                        </div>
                                        <div class="media-right">
                                            <label class="pt-2 mb-0">
                                                <?php echo $book; ?> 
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-6">
                            <ul class="list-group w-100 mt-5">
                                <!-- 01 -->
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="act-title">Total Appointment</div>
                                        </div>
                                        <div class="media-right">
                                            <label class="pt-2 mb-0">
                                                <?php echo $appoint; ?> 
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="act-title">Total Estimation</div>
                                        </div>
                                        <div class="media-right">
                                            <label class="pt-2 mb-0">
                                                <?php echo $estimation; ?> 
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="text-center mt-5 mb-2">
                       <a class="btn btn-gradient-01" href="javascript:void(0);">Message</a>
                    </div> -->
                </div>
            </div>
            <!-- End Widget 28 -->
        </div>
    
        <!-- End Widget 33 -->
    </div>
    </div>
    <!-- End Row -->
    </div>
        <!-- End Garden Modal -->
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/jquery.ui.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/vendors/js/progress/circle-progress.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="assets/js/dashboard/db-smarthome.min.js"></script>
        <script src="assets/js/components/music/music-player.min.js"></script>
        <!-- End Page Snippets -->
    </body>
</html>