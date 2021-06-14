<?php include('include/header1.php'); ?>
<style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
<section class="info-section" style="background-image: url('../assets/contact.jpg');  background-repeat: no-repeat, repeat; background-size: cover;" >
<div class="container-fluid" >
<div class="row">
<div class="col-md-6">
<div class="login-holder">
    
<form action="../Controller/add_db.php" method="post">
<h2 class="text-center">Contact Us</h2>
<div class="login-box clearfix">
  
<div class="form-group">
                                <label for="user-name">Enter Name<sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" class="pure-u-1" id="user_name" value="" name="user_name" required placeholder=" Enter Name" onkeypress="return onlyAlphabets(event,this);" autofocus onblur="onLeave()">
                                <p id="name" align="center" style="color:red;"></p>
                            </div>

  <div class="form-group">
                                <label for="mobile">Email<sup style="font-size:16px;color:red">*</sup></label>
                                <input type="email" class="pure-u-1" id="email" name="email" value="" placeholder=" Enter Email" required autofocus>
                                <p id="email" align="center" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number<sup style="font-size:16px;color:red">*</sup></label>
                                <input type="text" class="pure-u-1" id="mobile" name="mobile" value="" placeholder=" Enter Mobile Number" required data-max=10  pattern="\d{10}" minlength="10" maxlength="10"autofocus onchange="myfun1()" onkeypress="return isNumberKey1(event)">
                                <p id="phone" align="center" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label class="msg">Message<sup style="font-size:16px;color:red">*</sup></label>
                                <textarea required class="btn-block" name="message" rows="5" column="5"></textarea>
                            </div>
<input id="loginButton" name="btn_contact" type="submit" value="Send" class="btn btn-blue btn-xl btn-text btn-block">

</div>

</form>

</div>
</div>
<div class="col-md-6">
        <h3>Find Us</h3>
        <p>&nbsp;<b>Email : </b>vet@clinic.com
        &nbsp;&nbsp;&nbsp;&nbsp; <b>Phone :</b> +60175659133</p>
        <p><b>Address : </b>Jabatan Perkhidmatan Veterinar, Putrajaya</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6548254144986!2d101.68194651457547!3d2.9152767978766514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb7b64ab705cb%3A0xd20e7a4481a3693a!2sJabatan%20Perkhidmatan%20Veterinar%20Malaysia!5e0!3m2!1sen!2smy!4v1623615354632!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  
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
                if(textBox.value=='' || textLength<11)
                {
                    document.getElementById('error').innerHTML='Please enter min 10 numbers';
                    alertify.success('Please enter minimum 10 numbers');
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
                    document.getElementById('phone').innerHTML='Please enter min 10 numbers';
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
                    document.getElementById('message').innerHTML = 'Password did not match';
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
                  alertify.success('Please enter more than 6 characters for password');
                }
        }
        function validate101()
        {
            var textBox = document.getElementById("number");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<10)
                {
                  alertify.success('Please enter10 numbers');
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
    