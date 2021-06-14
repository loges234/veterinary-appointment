
<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Veterinary Appointment - Admin Login</title>
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
    <body class="bg-white">
        <!-- Begin Preloader -->
        <!-- <div id="preloader">
            <div class="canvas">
                <img src="../assets/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div> -->
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div>
                        <div class="elisyam-overlay overlay-01"></div>
                        <div class="authentication-col-content mx-auto">
                            <h1 class="gradient-text-01">
                                Welcome To Veterinary Appointment!
                            </h1>
                            <span class="description">
                              Admin Panel
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto"> 
                        <div class="logo-centered">
                                <img src="../assets/logo.png" alt="logo">
                           <a href="../index.html"class="btn btn-lg btn-gradient-02">Back to Home</a>
                        </div><br>
                        <h3>Sign In </h3>
                        <form action='../controller/log_db.php' method="post">
                            <div class="group material-input">
							    <input type="email"  name='email' required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Email</label>
                            </div>
                            <div class="group material-input">
							    <input type="password" name='password' required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Password</label>
                            </div>
                            <div class="sign-btn text-center">
                                    <input type="submit" name="btnadmin" value="Sign In" class="btn btn-lg btn-gradient-01">
                        </div>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col text-right">
                                <a href="#">Forgot Password ?</a>
                            </div>
                        </div>
                        
                    </div>
                    <!-- End Form -->                        
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->    
        <!-- Begin Vendor Js -->
        <script src="../assets/vendors/js/base/jquery.min.js"></script>
        <script src="../assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>