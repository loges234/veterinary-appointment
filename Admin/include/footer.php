   <!-- End Page Footer -->
   <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
  <script src="../assets/vendors/js/base/jquery.min.js"></script>
        <script src="../assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="../assets/vendors/js/datatables/datatables.min.js"></script>
        <script src="../assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/vendors/js/datatables/jszip.min.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/vendors/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/vendors/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/vendors/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="../assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="../assets/js/components/tables/tables.js"></script>
        
</body>
</html>
<script>
		function onlyAlphabets(e,t)
		  {
            try {
                if (window.event) { var charCode = window.event.keyCode; }
                else if (e)
					      { var charCode = e.which;}
                else {document.getElementById('error').innerHTML=''; return true;  }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||(charCode ==32))
			    	    {  document.getElementById('error').innerHTML='';return true;}		
                else
                 document.getElementById('error').innerHTML='This is required only Alphabets!!';
					        return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
	function isNumberKey1(evt)
        {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         {    
            document.getElementById('error').innerHTML="This is required only numbers!!";
			    return false;
         }
         document.getElementById('error').innerHTML='';
		   return true;
      }
      function callfunction()
        {
            var textBox = document.getElementById("password");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<=6)
                {
                  document.getElementById('error').innerHTML='Please enter minimum of 6 characters for password';
                }
               
        }
        function validate()
        {
            var textBox = document.getElementById("contact");
            var textLength = textBox.value.length;
                if(textBox.value=='' || textLength<11)
                {
                  document.getElementById('error').innerHTML='Please enter minimum of 10 numbers';
                }
        }
        function showfocus(element) 
        {
                max = parseInt(element.dataset.max)
                if (element.value.length >= max) 
                {
                    document.getElementById("email").focus();  
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
                   //alertify.success('Password do not match');
                }
                else
                {
                  document.getElementById('error').innerHTML='Password is matched'; 
                }
            }
            $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    