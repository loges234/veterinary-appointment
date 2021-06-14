<?php include("include/sidenavbar.php"); ?>
    <br><br>
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
           $profile=$row['profile'];
           ?><br>
<h2 align="center"><b>My Profile</b></h2>
<?php if($profile!=''){ ?>
<h4 align="right"><a href="profile_img.php?id=<?php echo $id; ?>"><p class="btn btn-default">Edit Profile Photo</p></a></h4>
<?php } else { ?>
<h4 align="right"><a href="profile_img.php?id=<?php echo $id; ?>"><p class="btn btn-default">Add Profile Photo</p></a></h4>
<?php } ?>
<hr>
    <div class="widget-body">
        <div class="col-10 ml-auto">
            <div class="section-title mt-3 mb-3">
                <h4><u>01. Personnal Informations</u></h4>
            </div>
        </div>
        <form class="form-horizontal" action="../controller/edit_db.php" method="post">
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Full Name</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['user_name']; ?>" required>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                <div class="col-lg-8">
                    <input type="email" class="form-control"name="email" value="<?php echo $row['email']; ?>"required>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone</label>
                <div class="col-lg-8">
                    <input type="number" class="form-control"name="contact" value="<?php echo $row['mobile']; ?>"required>
                </div>
            </div>
        <div class="col-10 ml-auto">
            <div class="section-title mt-3 mb-3">
                <h4><u>02. Address Informations</u></h4>
            </div>
        </div>
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Address</label>
                <div class="col-lg-8">
                   <input type="text"name="address" class="form-control"value="<?php echo $row['address']; ?>"required>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
                <div class="col-lg-8">
                    <?php
                   $city=$row['city'];
                     if($city!=''){ ?>
                    <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" required>
                    <?php } else
                    { ?>
                      <input type="text" name="city" class="form-control" value="" required>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">State</label>
                <div class="col-lg-8">
                <select id="state" name="state" class="form-control">
					<option value="Kuala Lumpur">Kuala Lumpur</option>
					<option value="Selangor">Selangor</option>
					<option value="Putrajaya">Putrajaya</option>
                    <option value="Johor">Johor</option>
					<option value="Kedah">Kedah</option>
					<option value="Kelantan">Kelantan</option>
					<option value="Melaka">Melaka</option>
					<option value="Negeri Sembilan">Negeri Sembilan</option>
					<option value="Pahang">Pahang</option>
					<option value="Penang">Penang</option>
					<option value="Perak">Perak</option>
					<option value="Sabah">Sabah</option>
					<option value="Sarawak">Sarawak</option>
					<option value="Terengganu">Terengganu</option>
                </select>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Postcode</label>
                <div class="col-lg-8">
                <?php
                   $pincode=$row['pincode'];
                     if($pincode!=''){ ?>
                   <input type="number"name="pincode" class="form-control" value="<?php echo $pincode ?>" maxlength="5" minlength="5"required>
                <?php } else
                    { ?>
                     <input type="number"name="pincode" class="form-control" value="" maxlength="5" minlength="5" required>
                <?php } ?>
                
                    </div>
            </div>
			  <div class="col-10 ml-auto">
            <div class="section-title mt-3 mb-3">
                <h4><u>03. Pet's Informations</u></h4>
            </div>
        </div>
	<div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Pet's Name</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="pet_name" value="<?php echo $row['pet_name']; ?>" required>
                </div>
  </div>		
	<div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Pet's Age</label>
                <div class="col-lg-8">
                    <input type="number" class="form-control" name="pet_age" value="<?php echo $row['pet_age']; ?>" required>
                </div>
  </div>
  
  	<div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Pet's Breed</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="pet_breed" value="<?php echo $row['pet_breed']; ?>" required>
                </div>
  </div>
  
   <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Pet's Gender</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="pet_gender" value="<?php echo $row['pet_gender']; ?>" required>
                </div>
  </div>
  
  <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-lg-2"></div>
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Pet's Species</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="pet_species" value="<?php echo $row['pet_species']; ?>" required>
                </div>
  </div>
  	
        <div class="em-separator separator-dashed"></div>
        <div class="text-center">
            <button name="btn_profileupdate_user" class="btn btn-primary" type="submit">Save Changes</button>
        </div><br><br>
        </form>
    </div>
    </div>
    </div>

                <?php }  }  } ?>

<?php include('include/footer.php'); ?>