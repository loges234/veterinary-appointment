<?php include('include/header1.php');?>

<section class="info-section gray-bg">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2 class="text-center">Register </h2>
<form class="app-contact-form mt40 pure-form" action="../Controller/add_db.php" method="post">
                       
                            <div class="form-group">
                                <label for="user-name">Enter Name<sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" class="pure-u-1" id="user_name" value="" name="user_name" required placeholder=" Enter Name" onkeypress="return onlyAlphabets(event,this);" autofocus onblur="onLeave()">
                                <p id="name" align="center" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number<sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" class="pure-u-1" id="mobile" name="mobile" value="" placeholder=" Enter Mobile Number" required data-max=10  pattern="\d{10}" minlength="10" maxlength="10"autofocus onchange="myfun1()" onkeypress="return isNumberKey1(event)">
                                <p id="phone" align="center" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Email<sup style="font-size:16px;color:red">*</sup></label>
                                <input type="email" class="pure-u-1" id="email" name="email" value="" placeholder=" Enter Email" required autofocus>
                                <p id="email" align="center" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label class="address">Address<sup style="font-size:16px;color:red">*</sup></label>
                                <textarea required class="btn-block" name="address" rows="5" column="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="text"><b>Password:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="password" name="pass" id="pass"class="pure-u-1" required  placeholder=" Enter Password" autofocus minlength="5" onchange="callfunction()">
                                <p id="passlen" align="center" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label for="text"><b>Confirm Password:</b><sup style="font-size:16px;color:red">*</sup></label>
                                <input type="password" name="cpass" id="cpass" class="pure-u-1" placeholder=" Enter Confirm Password"  required  autofocus onkeyup='check();'>
                                <span id='message'></span>
                            </div>
                          <input type="submit"  class="btn btn-blue btn-xl btn-text btn-block" name="btnUserReg" value="Register">
                  </form>
                  </div>
</div>
</div>
</section>
<?php include('include/footer.php'); ?>
                       
 <!---------------------------------------   Validation   ------------------------------------------>
 <script>
        function isNumberKey1(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {    
			document.getElementById('error').innerHTML="This is required only numbers!!";
            alertify.success('This is required only numbers!!');
			return false;
		 }
		 document.getElementById('error').innerHTML=" ";
		   return true;
        }
        function myfun()
        {
            var textBox = document.getElementById("mobile");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<10)
                {
                    document.getElementById('error').innerHTML='Please entered 10 numbers';
                    alertify.success('Please entered 10 numbers');
                }
                else
                {
                    document.getElementById('error').innerHTML = '';
                }
        }
        function myfunction(element) 
        {
                max = parseInt(element.dataset.max)
                if (element.value.length >= max) 
                {
                    document.getElementById("password").focus();  
                }
        }
 
		function onlyAlphabets(e,t)
		  {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e)
					{
                    var charCode = e.which;
                }
                else { document.getElementById('name').innerHTML="";return true;}
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
				{
					
					    document.getElementById('name').innerHTML="";
					   return true;
					 						 
				}
                else
					document.getElementById('name').innerHTML="This is required only Alphabets!!";
					return false;
					
            }
            catch (err) {
                alert(err.Description);
            }
        }
		function onLeave()
		{
			var input = document.getElementById("user_name");  
          var string = input.value; 
          input.value = string.charAt(0).toUpperCase() + 
           string.slice(1); 
}
function myfun1()
        {
            var textBox = document.getElementById("mobile");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<10)
                {
                    document.getElementById('phone').innerHTML='Please entered 10 numbers';
                }
                else
                {
                    document.getElementById('phone').innerHTML = '';
                }
        }
    
        function isNumberKey1(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {    
			document.getElementById('phone').innerHTML="This is required only numbers!!";
			return false;
		 }
		 document.getElementById('phone').innerHTML=" ";
		   return true;
      }
      function callfunction()
        {
            var textBox = document.getElementById("pass");
            var textLength = textBox.value.length;

                if(textBox.value=='' || textLength<=6)
                {
                    document.getElementById('passlen').innerHTML='Please entered more than 6 characters for password';
                }
                else
                {
                    document.getElementById('passlen').innerHTML = '';
                }
        }
        function check()
            {
                var pass=document.getElementById('pass').value;
                var cpass=document.getElementById('cpass').value;
                if(pass!=cpass)
                {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Password do not match';
                }
                else
                {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Password is matched'; 
                }
            }


            function onlyAlphabets15(e,t)
		  {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e)
					{
                    var charCode = e.which;
                }
                else { document.getElementById('name').innerHTML="";return true;}
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
				{
					
					    document.getElementById('name').innerHTML="";
					   return true;
					 						 
				}
                else
					document.getElementById('name').innerHTML="This is required only Alphabets!!";
					return false;
					
            }
            catch (err) {
                alert(err.Description);
            }
        }
		function onLeave15()
		{
			var input = document.getElementById("user_name");  
          var string = input.value; 
          input.value = string.charAt(0).toUpperCase() + 
           string.slice(1); 
}

function onlyAlphabets16(e,t)
		  {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e)
					{
                    var charCode = e.which;
                }
                else { document.getElementById('venue').innerHTML="";return true;}
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
				{
					
					    document.getElementById('venue').innerHTML="";
					   return true;
					 						 
				}
                else
					document.getElementById('venue').innerHTML="This is required only Alphabets!!";
					return false;
					
            }
            catch (err) {
                alert(err.Description);
            }
        }
		function onLeave16()
		{
			var input = document.getElementById("venue");  
          var string = input.value; 
          input.value = string.charAt(0).toUpperCase() + 
           string.slice(1); 
}








function onlyAlphabets101(e,t)
		  {
            try {
                if (window.event) { var charCode = window.event.keyCode; }
                else if (e)
					      { var charCode = e.which;}
                else { return true;}
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
			    	    {  return true; }		
                else
                  alertify.success("This is required only Alphabets!!");
					        return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
		function onLeave101()
		{
			var input = document.getElementById("user_name");  
          var string = input.value; 
          input.value = string.charAt(0).toUpperCase() + 
           string.slice(1);
        var input = document.getElementById("venue_name");  
          var string = input.value; 
          input.value = string.charAt(0).toUpperCase() + 
           string.slice(1); 
    }
		function isNumberKey101(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {    
          alertify.success("This is required only numbers!!");
			    return false;
         }
		   return true;
      }
      function callfunction101()
        {
            var textBox = document.getElementById("pass");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<=6)
                {
                  alertify.success('Please entered more than 6 characters for password');
                }
        }
        function validate101()
        {
            var textBox = document.getElementById("number");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<10)
                {
                  alertify.success('Please entered 10 numbers');
                }
            var txtmobile= document.getElementById("number").value;
            var dbmobile= document.getElementById("mobile").value;
              if(txtmobile==dbmobile)
              {
                  alertify.success('Number Already Registered!!! Please Enter Another Number');
             }
        }
        function showfocus101(element) 
        {
                max = parseInt(element.dataset.max)
                if (element.value.length >= max) 
                {
                    document.getElementById("landline").focus();  
                }
        }
        function check101()
            {
                var pass=document.getElementById('pass').value;
                var cpass=document.getElementById('cpass').value;
                var plength=length.pass;
                var clength=length.cpass;
                if(plength!= clength || pass!=cpass)
                {
                   //alertify.success('Password do not match');
                }
                else
                {
                    alertify.success('Password is matched'); 
                }
            }
            $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    