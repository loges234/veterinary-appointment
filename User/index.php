<?php include("../db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Veterinary Appointment</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/homeguide.new.css">

<link rel="stylesheet" href="assets/styles/master.css">
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/underscore-min.js"></script>
<script src="assets/js/async.js"></script>
<script src="assets/js/fingerprint2.min.js" defer=""></script>
<script src="assets/js/protos.js"></script>
<script src="assets/js/app.js"></script>
</head>
<body>


<noscript id="deferred-styles">
  <link rel="stylesheet" href="assets/styles/backgrounds.css">
  <link rel="stylesheet" type="text/css" href="assets/styles/flaticon.css">
  <link rel="stylesheet" href="assets/styles/font-awesome.min.css">
  <link rel="stylesheet" href="assets/styles/jquery-ui.css">
</noscript>
<script>
  var loadDeferredStyles = function() {
    var addStylesNode = document.getElementById("deferred-styles");
    var replacement = document.createElement("div");
    replacement.innerHTML = addStylesNode.textContent;
    document.body.appendChild(replacement)
    addStylesNode.parentElement.removeChild(addStylesNode);
  };
  var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
      window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
  else window.addEventListener('load', loadDeferredStyles);
</script>


<div id="wrapper">
<div class="w1">
<div class="main">

<div id="header-home">
<div class="">
<nav class="navbar">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-label="Menu"><i class="fa fa-bars"></i></button>
<div class="navbar-brand">
<a href="index.php" style="font-size: 30px;">Veterinary Appointment</a>

</div>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse">
<div class="dropdown">
<ul class="log-nav navbar-nav navbar-right home">
<li class="dropdown"><a id="home" href="../index.html" class="">Switch User</a></li>
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
  <li class="dropdown"><a href="Profile.php" class="">  My Account</a></li>
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

<div class="promo category main-page">
<!-- <div class="background"><img src="banner.jpg" height="500" width="1000"></div> -->

<div class="background">
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="bg/banner0.jpg" alt="Home Service" style="width:100%;">
      </div>

      <div class="item">
        <img src="bg/banner1.jpg" alt="Home Service" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="bg/banner2.jpg" alt="Home Service" style="width:100%;">
	  </div>
	  
	  <div class="item">
        <img src="bg/banner3.jpg" alt="Home Service" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="text-frame landing container-fluid w-800">
<h1>Find quality services for all your pet's needs.</h1>
</div>
</div> 

<div class="services-bar" >
<div class="container-fluid">

</div>
</div>

<a class="anchor" id="popular"></a>

<div class="landing-section grey">
<section class="service-select grey">
<div class="container-fluid">
<a class="anchor" id="top"></a>
<div class="cat-header">
<h2>Veterinary Services</h2>
</div>
</div>
<br>
<div class="container-fluid thin-sides">
<div class="category-boxes clearfix">
<?php
$sql="select * from tbl_category ";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
    while($row = $result->fetch_array())
       {
?>
<div class="card col-xs-6 col-sm-4">
<a href="service.php?type=<?php echo $row['name']; ?>">
<div class="image"><img class="b-lazy" data-src="bg/<?php echo $row['image']; ?> " alt="Logo">
<div class="name"><?php echo $row['name']; ?></div>
</div>
</a>
</div>
	   <?php } ?>
</div>
</div>
</section>
</div>



<!------------------------------------------------------------------->

<div class="help-section">
<div class="container-fluid">
<div class="col-sm-12">
<div class="help-title">Thousands of doctors are getting new customers with Veterinary Appointment</div>
<div class="help-text">Sign up today to get new customer requests</div>
</div>
<div class="col-sm-12">
<div class="help-button"><a href="signup.php" class="button-clear">Sign Up</a></div>
</div>
</div>
</div>


</div>
</div>

<?php include('include/footer.php'); ?>