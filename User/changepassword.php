<?php include("include/sidenavbar.php"); ?>
    <br><br>
    <h2 align="center"><b>Change Password</b></h2><br>
    <form class="form-horizontal" action="../controller/edit_db.php" method="post">
    <div class="form-group">
            <label for="">Old Password <sup style="font-size:16px;color:red">*</sup></label>
             <input type="password" name="old"class="form-control" placeholder="Enter Old Password" required>
    </div>
        <div class="form-group">
            <label for="">New Password<sup style="font-size:16px;color:red">*</sup></label>
            <input id="password" name="password"  onchange="callfunction()" type="password" class="form-control" placeholder="Enter 6 Character Password" minlength="4" required>
        </div>
        <div class="form-group">
            <label for="">Retype Password<sup style="font-size:16px;color:red">*</sup></label>
            <input id="cpassword" name="cpassword" type="password" class="form-control" placeholder="Confirm Password" onkeyup='check();' minlength="6" required>
        </div>
        <p align="center" id="error" style="color:red"></p>
                              
    <div class="em-separator separator-dashed"></div>
    <div class="text-center">
        <button name="btn_userpassword" class="btn btn-primary" type="submit">Change Password</button>
        <!-- <button name="cancle"class="btn btn-shadow" type="reset">Cancel</button> -->
    </div>
    </form>
    <script>
           function callfunction()
        {
            var textBox = document.getElementById("password");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<=6)
                {
                  document.getElementById('error').innerHTML='Please entered more than 6 characters for password';
                }
                else{
                    document.getElementById('error').innerHTML='';
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
                    document.getElementById('error').innerHTML='Password is Not matched'; 
                }
                else
                {
                  document.getElementById('error').innerHTML='Password is matched'; 
                }
            }
        </script>
         </div>
       </div>
       <br><br>
<?php include('include/footer.php'); ?>