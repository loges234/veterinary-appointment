<?php include('../db_connect.php');  ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mai Service</title>
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
<body>
    
<div class="container">
                    <div class="container-fluid">
                       
                        <?php  
                        $pid=$_GET['id'];
 if(isset($_SESSION['SP_id'] ))
 {
 $id= $_SESSION['SP_id'];

 $sql = "SELECT * FROM tbl_serviceprovider where id=$id";
 $result=$connect->query($sql);
 while($row = $result->fetch_array())
 {
     $name=$row['name'];
     $email=$row['email'];
     $city=$row['city'];  
     $contact=$row['contact'];
     $pincode=$row['pincode'];
     $add=$row['address'];  
 }
 $i=1;
 $sql = "SELECT * FROM tbl_plan_purchase,tbl_plan where sp_id=$id and tbl_plan.id=tbl_plan_purchase.plan_id and purchase_id=$pid ";
 $result=$connect->query($sql);
 while($row = $result->fetch_array())
 {  
     
     ?>

                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Begin Invoice -->
                                <div class="invoice has-shadow">
                                    <!-- Begin Invoice COntainer -->
                                    <div class="invoice-container">
                                        <!-- Begin Invoice Top -->
	                                    <div class="invoice-top">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
        	                                        <h1>Invoice</h1>
        	                                        <span><?php echo "INV000".$pid; ?></span>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                                                    <div class="actions dark">
                                                        <div class="dropdown">
                                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                <i class="la la-ellipsis-h"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="#" class="dropdown-item"> 
                                                                    <i class="la la-print"></i>Print
                                                                </a>
                                                                <a href="#" class="dropdown-item"> 
                                                                    <i class="la la-download"></i>Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
	                                    </div>
                                        <!-- End Invoice Top -->
                                        <!-- Begin Invoice Header -->
                                        <div class="invoice-header">
                                        	<div class="row d-flex align-items-center">
	                                        	<div class="col-xl-2 col-md-2 col-sm-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
		                                        	<div class="invoice-logo">
		                                                <img src="../assets/logo.png" alt="logo">
		                                            </div>
		                                        </div>
		                                        <div class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
		                                            <div class="details">
		                                            	<ul>
		                                                    <li class="company-name">Mai Service</li>
		                                                    <li>1620, jai kunj niwas</li>
		                                                    <li>Limb,Satara 415015</li>		                                                    
                                                            <li>Phone: +91 7219743775</li>
                                                            <li>Email: maiservice18@gmail.com</li>
		                                                </ul>
		                                            </div>
	                                            </div>
	                                            <div class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-end justify-content-md-end justify-content-center mb-2">
	                                                <div class="client-details">
	                                                    <ul>
	                                                    	<li class="title">To.</li>
		                                                    <li><?php echo $name; ?></li>
		                                                    <li><?php echo $add; ?> ,<?php echo $city; ?> <?php echo $pincode; ?></li>
		                                                    <li>Phone: <?php echo $contact; ?></li>
		                                                    <li>Email: <?php echo $email; ?></li>
	                                                    </ul>
	                                                </div>
	                                            </div>
                                            </div>
                                        </div>
                                        <!-- End Invoice Header -->
                                        <div class="invoice-date d-flex justify-content-xl-end justify-content-center">
                                            <span> <?php echo $row['start_date']; ?></span>
                                        </div>
                                        <!-- Begin Table -->
                                        <div class="col-xl-12 desc-tables">
                                           <h2 align="center" style="color:black"><b> <u>Plan Purchase Receipt</u></b></h2><br>
	                                        <div class="table-responsive">
		                                        <table class="table">
		                                            <thead>
		                                                <tr>
		                                                    <th class="text-left">Plan Name</th>
                                                            <th class="text-center">Start Date</th>
                                                            <th class="text-center">End Date</th>
		                                                    <th class="text-center">Amount</th>
		                                                    
		                                                </tr>
		                                            </thead>
		                                            <tbody>
		                                                <tr>
		                                                    <td class="text-left">
                                                            <?php echo $row['name']; ?>
		                                                        <br>
		                                                        <div class="description">
                                                                Period : <?php echo $row['period']; ?>
		                                                        </div>
		                                                    </td>
		                                                    <td class="text-center"><?php echo $row['start_date']; ?></td>
		                                                    <td class="text-center">  <?php echo $row['end_date']; ?></td>
		                                                    <td class="text-center"><i class="la la-inr la-2x"><?php echo $row['amount']; ?></i></td>
		                                                </tr>
                                                        <tr>
                                                            <td class="text-center" colspan="4">
                                                              <hr>  <h2>Total : <i class="la la-inr la-2x"><?php echo $row['amount']; ?></i></h2>
                                                            </td>
                                                        </tr>
		                                            </tbody>
		                                        </table>
	                                        </div>
                                        </div>
                                        <!-- End Table -->
                                    </div>
                                    <!-- End Invoice Container -->
                                    <!-- Begin Invoice Footer -->
                                    <div class="invoice-footer">
                                        <!-- Begin Invoice Container -->
                                        <div class="invoice-container">                                            <div class="footer-bottom">
                                                <div class="thx">
                                                    <i class="la la-heart"></i><span>Thank You!</span>
                                                </div>
                                                <div class="website">Mai Service</div>
                                            </div>
                                        </div>
                                        <!-- End Invoice Container -->
                                    </div>
                                    <!-- End Invoice Footer -->
                                </div>
                                <!-- End Invoice -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
 <?php } }include('include/footer.php');  ?>