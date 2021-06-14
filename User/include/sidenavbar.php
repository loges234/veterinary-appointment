<?php include("include/header1.php"); ?>
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
               
  ?>
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="content-box noborder">
<h3 class="text-center mt-3 mb-1">
<div class="mt-5">
<div class="avatar rounded-circle d-block mx-auto">
    <?php 
    $profile=$row['profile'];
    if($profile!='') { ?>
  <img src="profile/<?php echo $profile; ?>" alt="..." height="150" width="200" >
    <?php } else { ?>
<i class="fa fa-user fa-5x"></i>
    <?php } ?>
  </div>
</div>
    <?php echo $row['user_name'];; ?></h3>
<p class="text-center"><?php echo $row['email']; ?></p>
<div class="em-separator separator-dashed"></div>
<ul class="nav flex-column" style="border:solid ">
<li class="nav-item" >
        <a class="nav-link" href="Profile.php"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Profile</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="changepassword.php"><i class="fa fa-bell"></i>&nbsp;&nbsp;Notifications</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="Appointment.php"><i class="fa fa-comments"></i>&nbsp;&nbsp;Your Appointment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="Estimation.php"><i class="fa fa-dollar"></i>&nbsp;&nbsp;&nbsp;Estimations Rate</a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="../changepassword.php"><i class="fa fa-bolt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Activity</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="changepassword.php"><i class="fa fa-gears"></i>&nbsp;&nbsp;Change Password</a>
    </li>
</ul>
</div>
</div>
       <?php } } } ?>
<div class="col-md-9">