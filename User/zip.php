<?php include('include/header1.php'); ?>
<section class="landing-section grey">
<div class="container w-990">
<div class="box-header">
<h2>Best  <?php echo $_GET['type']; ?> near you</h2>
</div>
<div class="q-home">
<?php
$service=$_GET['type'];
$pincode=$_POST['zip'];
$sql="select * from tbl_service_details,tbl_service where  tbl_service.id=tbl_service_details.service_id and pincode='$pincode' and category='$service'";
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
<span><i class="fa fa-map-marker fa-fw"></i><?php echo $row['location']; ?></span>
<span><i class="fa fa-user-o fa-fw"></i> <?php echo $row['member']; ?> Member in Business</span>
</div>
</div>
<div class="content-button hidden-xs">
   
<a href="services.php?id=<?php echo $row['id']; ?>" class="btn btn-blue btn-xl get-started"><font style="color:black"> <i class="fa fa-comment-o fa-fw"></i></font> Make Appointment</a><br>
<a href="services.php?id=<?php echo $row['id']; ?>" class="btn btn-backlead btn-xl hidden-xs"><font style="color:blue">  <i class="fa fa-user-o fa-fw"></i></font><font style="color:black">  View Profile</font></a>
</div>
</div>

       <?php }  }else{ ?>
       <hr>    <h2 align="center">Sorry , No Any Service Provider Are Added</h2> <hr>
      <?php } ?>


</div>
</div>
</section>
<?php include('include/footer.php'); ?>