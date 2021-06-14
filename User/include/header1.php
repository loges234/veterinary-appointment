<?php include("../db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Veterinary Appointment</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/homeguide.new.css">
<script type="text/javascript">
		    if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
		        document.write('<script src="https://cdn.polyfill.io/v2/polyfill.min.js"><\/script>');
		</script>
<link rel="stylesheet" href="assets/styles/master.css">
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/underscore-min.js"></script>
<script src="assets/js/async.js"></script>
<script src="assets/js/protos.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/fingerprint2.min.js" defer=""></script>

</head>
<body>

  <link rel="stylesheet" href="assets/styles/backgrounds.css">
  <link rel="stylesheet" type="text/css" href="assets/styles/flaticon.css">
  <link rel="stylesheet" href="assets/styles/font-awesome.min.css">
  <link rel="stylesheet" href="assets/styles/jquery-ui.css">

<div id="header"  style="background-color:papayawhip">
<div class="condtainer-fluid wide">
<nav class="navbar">
<div class="navbar-header-fixed">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-label="Menu"><i class="fa fa-bars"></i></button>
<div class="navbar-brand">
<a href="index.php" style="font-size: 30px;">Veterinary Appointment</a>
</div>
</div>
<div class="collapse navbar-collapse" id="navbar-collapse">
<div class="dropdown">
<ul class="log-nav navbar-nav navbar-right">
<li class="dropdown"><a href="index.php" class="">Home</a></li>
<?php
 if(isset( $_SESSION['user_id']))
  {  
	$id=$_SESSION['user_id'];
   $sql="select * from tbl_user where user_id='$id' ";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
   if($row==1)
   {
       while($row = $result->fetch_array())
       {
               $user_name=$row['user_name'];
               
  ?>
  <li class="dropdown"><a href="Profile.php" class=""><i class="fa fa-user"></i>  My Account</a></li>
  <li class="dropdown"><a href="../controller/logout.php" class="">Logout</a></li>
  <li class="dropdown"><a href="contact.php" class="">Contact Us</a></li>
  <?php }  } }
  else
	   {?>

<li class="dropdown"><a href="reg.php" class="">Sign Up</a></li>
<li class="dropdown"><a href="login.php" class="">Log In</a></li>
<li class="dropdown"><a href="contact.php" class="">Contact Us</a></li>
       <?php } ?>
</ul>
</div>
</div>
</nav>
</div>
</div>
