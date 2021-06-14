<?php 
include("../db_connect.php");
if(!isset($_SESSION['SP_id']) and  !isset($_SESSION['pro_id']) )
{
    echo"<script> alert('You Must Login First')</script>";
    echo "<script>window.location.href='../SP_Log.php';</script>";	
}
else
{
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Veterinary Doctor</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/logo.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/logo.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/logo.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="../assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/owl-carousel/owl.theme.min.css">
        <link rel="stylesheet" href="../assets/css/datatables/datatables.min.css">
        <link rel="stylesheet" href="../assets/css/animate/animate.min.css">
    </head>


    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="../assets/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top" style="background-color: blanchedalmond">         
                   
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between" >
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="../assets/logo.png" alt="logo" class="avatar rounded-circle">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="../assets/logo.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                           <font color="black"><b> Veterinary Doctor</b></font>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                       <h1 style="color:black"> 
                       <?php 
                       if(isset($_SESSION['SP_id']))
                       {  
                       echo "Service Provider Panel</h1>";
                         }
                       else{
                         echo "Pro Service Provider Panel</h1>";
                       }
                       ?>
                      
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                          
                            <!-- User -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="../assets/logo.png" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <img src="../controller/serviceprovider/profile/<?php echo $_SESSION['Profile']; ?>"  alt="..." class="rounded-circle">
                                    </li>
                                    <li>
                                        <a href="profile.php" class="dropdown-item"> 
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="changepassword.php" class="dropdown-item no-padding-bottom"> 
                                            Settings
                                        </a>
                                    </li>
                                    <li class="separator"></li>
                                   <li><a rel="nofollow" href="../controller/logout.php" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                </ul>
                            </li>
                            <!-- End User -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->



            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <ul class="list-unstyled">
                            <li><a href="index.php"><i class="la la-columns"></i><span>Dashboard</span></a></li>
                       
                            <li><a href="profile.php"><i class="la la-user"></i><span>Profile</span></a></li>
                       
                           <?php if(isset($_SESSION['SP_id']) ) { ?>

                        
                         
                            <li><a href="services.php"><i class="ti ti-world"></i><span>Services</span></a></li>
                           
                            
                           <?php } if(isset($_SESSION['pro_id']) )   { ?>
                            <li><a href="services_pro.php"><i class="ti ti-world"></i><span>Services</span></a></li>
                           <?php } ?>

                            <li><a href="Appoint.php"><i class="ti ti-comment"></i><span>My Appointment</span></a></li>

                            <li><a href="Estimate.php"><i class="ti ti-clipboard"></i><span>Estimation Details</span></a></li>
                            
                            <li><a href="Book.php"><i class="ti ti-briefcase"></i><span>Hired</span></a></li>
                            
                            <li><a href="changepassword.php"><i class="ti ti-key"></i><span>Change Password</span></a></li>
                            <li><a href="review.php"><i class="ti ti-pencil"></i><span >Reviews</span></a></li>
                            <li><a href="rpt.php"><i class="la la-leanpub"></i><span >Graphical Report</span></a></li>

                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
            </div>
                <!-- End Left Sidebar -->


        <?php } ?>      