<?php 
include("../db_connect.php"); 
if(isset($_SESSION['admin']))
{
 
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Veterinary Appointment - Admin</title>
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
                <nav class="navbar fixed-top">         
                   
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="../assets/logo.png" alt="logo"class="avatar rounded-circle">
                                    Veterinary App
                                </div>
                               
                                <div class="brand-image brand-small">
                                    <img src="../assets/logo.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                       <h1 style="color:blue"> Admin Panel</h1>
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                         
                            <!-- User -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="../assets/logo.png" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                       <img src="../assets/logo.png" alt="..." class="rounded-circle">
                                    <center> <b>  Welcome <br> <font color="red" size="3">Admin</font><font color="black"> <i class="la la-smile-o la-2x"></i></font>
                                    </b></center></li>
                               
                                    <li class="separator"></li>
                                    <li>
                                        <a href="changepassword.php" class="dropdown-item no-padding-bottom"> 
                                            Change Password
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
                            <li class="active"><a href="index.php"><i class="la la-columns"></i><span>Dashboard</span></a></li>
                       
                            <li><a href="status.php"><i class="ti ti-stats-up"></i><span>Business Status</span></a></li>
                                    
                       
                            <li><a href="Addservices.php"><i class="ti ti-world"></i><span>Service Category</span></a></li>

                            <li><a href="service.php"><i class="ti ti-world"></i><span>Services</span></a></li>
                           
                            <li><a href="serviceprovider.php"><i class="ti ti-user"></i><span>Service Provider</span></a></li>
                         

                            <li><a href="#dropdown-report" aria-expanded="false" data-toggle="collapse">
                                <i class="la la-leanpub"></i><span>Report</span></a>
                                <ul id="dropdown-report" class="collapse list-unstyled  pt-0">
                                        
                                <!-- <li><a href="service.php"><i class="ti ti-world"></i><span>Services</span></a></li> -->



                                        <li><a href="rpt_user.php"><i class="ti ti-user"></i><span>User</span></a></li>

                                        <li><a href="rpt_contact.php"><i class="ti ti-pencil"></i><span>Contact Us</span></a></li>

                                </ul>
                            </li>
                         </ul>
                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
            </div>
                <!-- End Left Sidebar -->
        <?php
            }
            else{
                echo"<script> alert('You Must Login First')</script>";
                echo "<script>window.location.href='login.php';</script>";	
            }
?>
                