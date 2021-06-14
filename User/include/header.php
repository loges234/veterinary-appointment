<?php include("../db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Veterinary Appointment</title>


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

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NDBNPD5');</script>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" > -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	
</head>
<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDBNPD5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>
	$(window).load(function(){
		$( ".datepicker" ).datepicker();
	});
</script>
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
<script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
	for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
	
		mixpanel.init('94780b9631b4ea12826ed3b7bdfef415', {
			'ip':false,
			loaded: function(mixpanel) {
				
			}
		});
	</script>
<div id="wrapper">
<div class="w1">

<div class="main" >
<div id="header-home">
<div class="">
<nav class="navbar">
<div class="navbar-header-fixed">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-label="Menu"><i class="fa fa-bars"></i></button>
<div class="navbar-brand"><h2 style="color:white"><a href="index.php">Veterinary Appointment</a></h2></div>
</div>
<div class="collapse navbar-collapse" id="navbar-collapse">
<div class="dropdown">
<ul class="log-nav navbar-nav navbar-right home">
<li class="dropdown"><a id="home" href="index.php" class="">Home</a></li>
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


<li class="dropdown"><a href="signup.php" class="">Sign Up</a></li>
<li class="dropdown"><a href="login.php" class="">Log In</a></li>
<li class="dropdown"><a href="contact.php" class="">Contact Us</a></li>
       <?php } ?>
</ul>
</div>
</div>
</nav>
</div>
</div>
