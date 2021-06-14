<?php include('include/header.php'); ?>

<section class="promo category topflight" style="background-image: url('bg/ban1.jpg')" >
<!-- <div class="background1" style="background-color:indianred"></div> -->
<div class="text-frame landing topflight container-fluid">
<h1>
<span class="topflight-location">
Near You
</span>
<span class="topflight"> <?php echo $_GET['type']; ?>
 Doctors
near you</span>
</h1>
<div class="clearfix">
<form class="zip-form topflight" method="post" action="zip.php?type=<?php echo $_GET['type']; ?>">
<p>Where do you need the <?php echo $_GET['type']; ?>?</p>
<div class="zip-inputs">
<fieldset>
<div class="col-xs-12 col-sm-8 pady">
<div class="zip topflight" style="width:100%;">
<input type="text"name="zip"class="form-input zipcode"placeholder="Enter your zip code" required value=""oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="6" >
</div>
</div>
<div class="col-xs-12 col-sm-4 padx">
<input type="submit" class="btn btn-blue btn-block get-started btn-go" value="Go">
</div>
</fieldset>
</div>
</form>
</div>
</div>
</section>
<div class="sticky-cta">
<div class="container-fluid wide">
	<a href="index.php" style="font-size: 30px;">Veterinary Appointment</a>
	<form action="search.php" method="post" class="city-landing">
   <?php  
       $sql="select * from tbl_category";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
       
           ?>   
						<select name="type" data-live-search="true" title="Please Select Category" class="form-control selectpicker">
                <?php  while($row = $result->fetch_array())
       {  ?>
                  <option><?php echo $row['name']; ?></option>
       <?php } ?>
                  </select>
                  <input type="submit" class="btn btn-blue bttn get-started" value="Get Started">
   	<!-- <input name="type" class="services form-input tags query dropdown-toggle hidden-xs" required placeholder="What service do you need?" type="hidden" > -->
	<!-- <input type="submit" class="btn btn-blue bttn get-started" value="Get Started"> -->
	</form>
</div>
</div>
<div class="how-steps">
<div class="container-fluid w-1000">
<div class="col-xs-12 col-sm-4">
<div class="how-step">
<div class="how-circle">
<img src="bg/logo/answer.png" data-src="bg/logo/answer.png" class="b-lazy">
</div>
<div class="main">Answer some questions</div>
<p>Let us know about your needs so we can bring you the right doctor.</p>
</div>
</div>
<div class="col-xs-12 col-sm-4">
<div class="how-step">
<div class="how-circle">
<img src="bg/logo/quotes.png" data-src="bg/logo/quotes.png" class="b-lazy">
</div>
<div class="main">Get quotes</div>
<p>Receive quotes from multiple doctors that meet your exact needs.</p>
</div>
</div>
<div class="col-xs-12 col-sm-4">
<div class="how-step">
<div class="how-circle">
<img src="bg/logo/pro.png" data-src="bg/logo/pro.png" class="b-lazy">
</div>
<div class="main">Book the right doctor</div>
<p>Compare quotes, message or call doctors, and book only when ready.</p>
</div>
</div>
</div>
</div>
<div class="bread-box gray-bg">
<div class="container-fluid">
<div class="breadcrumbs text-center">
 
<font color="black"> Vetrinary Appointment &nbsp; &raquo; &nbsp;<?php echo $_GET['type']; ?>    </font>
</div>
</div>
</div>
<section class="landing-section grey"  style="background-color:rosybrown">
<div class="container w-990">
<div class="box-header">
<h2>Best  <?php echo $_GET['type']; ?> near you</h2>
</div>
<div class="q-home" >
<?php
$service=$_GET['type'];
$sql="select * from tbl_service where category='$service' and status='Active' ";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
   if($row >= 1)
   {
    while($row = $result->fetch_array())
       {        
           ?>

<div class="pro-box">
<div class="icon-holder get-started">
<img class="b-lazy" src="../controller/serviceprovider/services/<?php echo $row['photo']; ?>" data-src="../controller/serviceprovider/services/<?php echo $row['photo']; ?> " alt="plumber">
</div>
<div class="pro-content">
<h3 class="content-title"><a href="services.php?id=<?php echo $row['id']; ?>"><?php echo $row['service_name']; ?></a>
</h3>
<div class="content-stars">
<span class="pro-rating">5.0</span>
<i class="fa fa-star stars active"></i>
<i class="fa fa-star stars active"></i>
<i class="fa fa-star stars active"></i>
<i class="fa fa-star stars active"></i>
<i class="fa fa-star stars active"></i>
</div>

<div class="content-subtitle">
<span class="about-txt">
<?php echo $row['description']; ?></span>
</div>
<div class="content-facts hidden-xs">
<span><i class="fa fa-map-marker fa-fw"></i><?php echo $row['location']; ?></span><br>
<span><i class="fa fa-user-o fa-fw"></i> <?php echo $row['member']; ?> Member in Business</span>
</div>
</div>
<div class="content-button hidden-xs">
<a href="services.php?id=<?php echo $row['id']; ?>" class="btn btn-blue btn-xl get-started"><font style="color:black"> <i class="fa fa-comment-o fa-fw"></i></font> Make Appointment</a><br>
<a href="services.php?id=<?php echo $row['id']; ?>" class="btn btn-backlead btn-xl hidden-xs"><font style="color:blue">  <i class="fa fa-user-o fa-fw"></i></font><font style="color:black">  View Profile</font></a>
</div>
</div>

       <?php }  }else{ ?>
       <hr>    <h2 align="center">Sorry , No Doctor Are Added</h2> <hr>
      <?php } ?>


</div>
</div>
</section>
 
<?php include('include/footer.php'); ?>