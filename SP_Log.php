<?php include("db_connect.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vet Doctor</title>
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
        <link rel="apple-touch-icon" sizes="180x180" href="assets/logo.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/logo.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/logo.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="assets/css/animate/animate.min.css">
         </head>
    <body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
                    <div class="elisyam-bg background-03">
                        <div class="elisyam-overlay overlay-08"></div>
                        <div class="authentication-col-content-2 mx-auto text-center">
                            <div class="logo-centered">
                                <a href="index.php">
                                    <img src="assets/logo.png"class="avatar rounded-circle" alt="logo">
                                </a>
                            </div>
                        <a href="index.html"class="btn btn-lg btn-gradient-01">Back to Home</a>

                            <h1>Join Our</h1><h1 style="color:palevioletred"> Veterinary Doctors</h1>
                            <!-- <span class="description">
                                Etiam consequat urna at magna bibendum, in tempor arcu fermentum vitae mi massa egestas. 
                            </span> -->
                            <ul class="login-nav nav nav-tabs mt-5 justify-content-center" role="tablist" id="animate-tab">
                                <li><a  data-toggle="tab" href="#singin" role="tab" id="singin-tab" data-easein="zoomInUp">Sign In</a></li>
                                <li><a class="active" data-toggle="tab" href="#signup" role="tab" id="signup-tab" data-easein="zoomInRight">Sign Up</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form-2 mx-auto">
                        <div class="tab-content" id="animate-tab-content">
                            <!-- Begin Sign In -->
                            <div role="tabpanel" class="tab-pane" id="singin" aria-labelledby="singin-tab">
                                <h3>Sign in Veterinary Appointment for Doctors</h3>
                                <form action="controller/log_db.php" method="post" enctype="multipart/form-data">
                                    <div class="group material-input">
        							    <input type="email" name="email" required>
        							    <span class="highlight"></span>
        							    <span class="bar"></span>
        							    <label>Email<sup style="font-size:16px;color:red">*</sup></label>
                                    </div>
                                    <div class="group material-input">
        							    <input type="password"name="password" required>
        							    <span class="highlight"></span>
        							    <span class="bar"></span>
        							    <label>Password<sup style="font-size:16px;color:red">*</sup></label>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <a href="pages-forgot-password.html">Forgot Password ?</a>
                                        </div>
                                    </div>
                                    <div class="sign-btn text-center">
                                        <input type="submit" name="btn_splog" value="Sign In" class="btn btn-lg btn-gradient-01">
                                    </div>
                                </form>
                            </div>
                            <!-- End Sign In -->
                            <!-- Begin Sign Up -->
                            <div role="tabpanel" class="tab-pane  show active" id="signup" aria-labelledby="signup-tab">
                                <h3>Create An Account (For Doctors / Service Providers only)</h3> 
                               
                                <form action="controller/add_db.php" method="post" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                    <label for="">Name<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="name" name="name" type="text" onkeypress="return onlyAlphabets(event,this);" class="form-control" placeholder="Name" required>
                                    <p align="center" id="error" style="color:red"></p>
                                </div>

                                <div class="form-group">
                                    <label for="">Contact No.<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="contact" data-max=10 oninput="showfocus(this)"onchange="validate()"onkeypress="return isNumberKey1(this);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="contact" type="text" class="form-control" placeholder="Contact" minlength="10" maxlength="10" required>
                                    <p align="center" id="error1" style="color:red"></p>
                                </div>

                                <div class="form-group">
                                    <label for="">Email.<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="email"   name="email" type="email" class="form-control" placeholder="Email" required>
                                  
                                </div>

                                <div class="form-group">
                                    <label for="">City<sup style="font-size:16px;color:red">*</sup></label>
                                    <select class="form-control" name="city" id="city">
                                       <option value="Bukit Bintang ">Bukit Bintang </option>
										<option value="Titiwangsa">Titiwangsa</option>
										<option value="Setiawangsa">Setiawangsa</option>
										<option value="Wangsa Maju">Wangsa Maju</option>
										<option value="Batu">Batu</option>
										<option value="Kepong ">Kepong </option>
										<option value="Segambut">Segambut</option>
										<option value="Lembah Pantai">Lembah Pantai</option>
										<option value="Seputeh">Seputeh</option>
										<option value="Bandar Tun Razak">Bandar Tun Razak</option>
										<option value="Cheras">Cheras</option>
										<option value="Petaling Jaya">Petaling Jaya</option>
										<option value="Damansara">Damansara</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">ID Photo(Square Size)<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="photo" name="photo" type="file" class="form-control-file" placeholder="Select Photo 1" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="password" name="password"  onchange="callfunction()" type="password" class="form-control" placeholder="Enter 6 Character Password" minlength="4" required>
                                    <p align="center" id="error2" style="color:red"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password<sup style="font-size:16px;color:red">*</sup></label>
                                    <input id="cpassword" name="cpassword" type="password" class="form-control" placeholder="Confirm Password" onkeyup='check();' minlength="6" required>
                                    <p align="center" id="error4" style="color:red"></p>
                                </div>
                             <div class="sign-btn text-center">
                                    <input type="submit" name="btn_SPReg" value="Sign Up" class="btn btn-lg btn-gradient-01">
                                </div>
                                </form>
                            </div>
                            <!-- End Sign Up -->
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
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="assets/js/components/tabs/animated-tabs.min.js"></script>
        <!-- End Page Snippets -->
    </body>
</html>
<script>
		function onlyAlphabets(e,t)
		  {
            try {
                if (window.event) { var charCode = window.event.keyCode; }
                else if (e)
					      { var charCode = e.which;}
                else {document.getElementById('error').innerHTML=''; return true;  }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
			    	    {  document.getElementById('error').innerHTML='';return true;}		
                else
                 document.getElementById('error').innerHTML='This is required only Alphabets!!';
					        return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
	function isNumberKey1(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {    
            document.getElementById('error1').innerHTML="This is required only numbers!!";
			    return false;
         }
         document.getElementById('error1').innerHTML='';
		   return true;
      }
      function callfunction()
        {
            var textBox = document.getElementById("password");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<=5)
                {
                  document.getElementById('error2').innerHTML='Minimum 6 characters for password';
                }
               
        }
        function validate()
        {
            var textBox = document.getElementById("contact");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<10)
                {
                  document.getElementById('error1').innerHTML='Please entered 10 numbers';
                }
        }
        function showfocus(element) 
        {
                max = parseInt(element.dataset.max)
                if (element.value.length >= max) 
                {
                    document.getElementById("email").focus();  
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
                    document.getElementById('error4').innerHTML='Password is Not matched'; 
                }
                else
                {
                  document.getElementById('error4').innerHTML='Password is matched'; 
                }
            }
            $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    