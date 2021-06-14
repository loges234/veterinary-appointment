<?php include('include/header1.php'); ?>

<div class="gray-bg clearfix">
<div id="wrapper">
<div class="w2">
<div class="page join">
<h2 class="text-center">Welcome back to Veterinary Appointment</h2>
<section class="info-section gray-bg">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="login-holder">
<form action="../controller/log_db.php" method="post" enctype="multipart/form-data">
<fieldset>
<div class="login-box clearfix">
    <div class="group material-input">
      <label for="email">Email<sup style="font-size:16px;color:red">*</sup></label>
      <input type="email" name="email" required>
    </div>
    <div class="group material-input">
      <label for="password">Password<sup style="font-size:16px;color:red">*</sup></label>
      <input type="password"name="password" required>
    </div><br>
  <br>
    <div class="sign-btn text-center">
        <input type="submit" name="btn_userlog" value="Sign In"  class="btn btn-blue btn-xl btn-text btn-block">
    </div>
</div>
</fieldset>
  </form>  

</div>
</div>
</div>
</div>
</section>
</div>
</div>

</div>
</div>
<?php include('include/footer.php'); ?>