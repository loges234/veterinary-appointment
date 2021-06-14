<?php
 include("../db_connect.php");

        // Register Service Provider
        if(isset($_POST['btn_SPReg']))
        {
            //$category= mysqli_real_escape_string($connect,$_POST['category']);
            $name= mysqli_real_escape_string($connect,$_POST['name']);
            $contact= mysqli_real_escape_string($connect,$_POST['contact']);
            $email= mysqli_real_escape_string($connect,$_POST['email']);
            $city= mysqli_real_escape_string($connect,$_POST['city']);
            $password= md5(mysqli_real_escape_string($connect,$_POST['password']));
          
            $target_file='serviceprovider/profile/';
			
            $imagetmp=basename($_FILES['photo']['name']);
            $location1 = $target_file.$_FILES['photo']['name']; 
            
            if($imagetmp=="")   
            {
                $image_name="No image";
            }   
            else
            {
         
                 $image_name= $imagetmp;
            }
  
            move_uploaded_file($_FILES['photo']['tmp_name'], $location1);
       
    
            $sql="insert into tbl_serviceprovider(name,contact,email,city,profile,password) 
                values('$name','$contact','$email','$city','$image_name','$password')";
            $result=mysqli_query($connect,$sql);
            if($result==true)
            {
                 echo"<script> alert('Successfully Register!! , Now You Must Login First')</script>";
                echo "<script>window.location.href='../SP_Log.php';</script>";	
               
            }
            else{
                echo "Error:".$connect->error;
                echo $sql;
            }
        }

         // Register Service Provider by Pro
         if(isset($_POST['btn_Pro_Reg']))
         {
             //$category= mysqli_real_escape_string($connect,$_POST['category']);
             $name= mysqli_real_escape_string($connect,$_POST['name']);
             $contact= mysqli_real_escape_string($connect,$_POST['contact']);
             $email= mysqli_real_escape_string($connect,$_POST['email']);
             $city= mysqli_real_escape_string($connect,$_POST['city']);
             $password= md5(mysqli_real_escape_string($connect,$_POST['password']));
           
             $reg_date= date("Y-m-d") ;
             
            $parts = explode('-', $reg_date);
            $end_date = date('Y-m-d',mktime(0, 0, 0, $parts[1], $parts[2] + 5, $parts[0]));
              

             $target_file='serviceprovider/profile/';
             
             $imagetmp=basename($_FILES['photo']['name']);
             $location1 = $target_file.$_FILES['photo']['name']; 
             
             if($imagetmp=="")   
             {
                 $image_name="No image";
             }   
             else
             {
          
                  $image_name= $imagetmp;
             }
   
             move_uploaded_file($_FILES['photo']['tmp_name'], $location1);
        
     
             $sql="insert into tbl_serviceprovider_pro(name,contact,email,city,profile,password,reg_date,end_date) 
                 values('$name','$contact','$email','$city','$image_name','$password','$reg_date','$end_date')";
             $result=mysqli_query($connect,$sql);
             if($result==true)
             {
                  echo"<script> alert('Successfully Register!! , Now You Must Login First')</script>";
                 echo "<script>window.location.href='../SP_Log.php';</script>";	
                
             }
             else{
                 echo "Error:".$connect->error;
             }
         }
 
       
      
          // Add Services of Service Provider 
          if(isset($_POST['btn_service']))
          {  
              if(isset($_SESSION['SP_id']))
              {
                    $id= $_SESSION['SP_id'];
              }
              if(isset($_SESSION['pro_id']))
              {
                    $id= $_SESSION['pro_id'];
              }
            $name= mysqli_real_escape_string($connect,$_POST['name']);
            $Category= mysqli_real_escape_string($connect,$_POST['Profession']);
            $Contact= mysqli_real_escape_string($connect,$_POST['Contact']);
            $Location= mysqli_real_escape_string($connect,$_POST['Location']);
            $Description= mysqli_real_escape_string($connect,$_POST['Description']);
            $member= mysqli_real_escape_string($connect,$_POST['member']);
            $appointment_fee= mysqli_real_escape_string($connect,$_POST['appointment_fee']);
            
            
            $target_file='serviceprovider/services/';
			
            $imagetmp=basename($_FILES['photo']['name']);
            $location1 = $target_file.$_FILES['photo']['name']; 
            
            if($imagetmp=="")   
            {
                $image_name="No image";
            }   
            else
            {
         
                 $image_name= $imagetmp;
            }
  
            move_uploaded_file($_FILES['photo']['tmp_name'], $location1);
       
    
            $sql="insert into tbl_service(sp_id,service_name,category,phone,location,description,photo,member,appointment_fee) 
                values('$id','$name','$Category','$Contact','$Location','$Description','$image_name','$member','$appointment_fee')";

            $result=mysqli_query($connect,$sql);
            if($result==true)
            {
                 echo"<script> alert('Successfully Added Your Service')</script>";
                 if(isset($_SESSION['pro_id']))
                 {
                echo "<script>window.location.href='../ServiceProvider/services_pro.php';</script>";	
                 }
                 else
                 {                     
                echo "<script>window.location.href='../ServiceProvider/services.php';</script>";	
                 }
               
            }
            else{
                echo "Error:".$connect->error;
            }
        }
         //add Appointment by User
         if(isset($_POST['appoint']))
         {
            if(isset($_SESSION['user_id']))
            {
                  $userid= $_SESSION['user_id'];
            }
            else
             {
                $userid='';
            }
            $service_id= mysqli_real_escape_string($connect,$_POST['service_id']);
            $name= mysqli_real_escape_string($connect,$_POST['name']);
             $email= mysqli_real_escape_string($connect,$_POST['email']);
             $contact= mysqli_real_escape_string($connect,$_POST['contact']); 
             $address= mysqli_real_escape_string($connect,$_POST['address']); 
             $a_date= mysqli_real_escape_string($connect,$_POST['a_date']); 
             $time= mysqli_real_escape_string($connect,$_POST['time']); 
			 $pet_name=mysqli_real_escape_string($connect,$_POST['pet_name']);
			  $pet_age=mysqli_real_escape_string($connect,$_POST['pet_age']);
			  $pet_breed=mysqli_real_escape_string($connect,$_POST['pet_breed']);
			  $pet_gender=mysqli_real_escape_string($connect,$_POST['pet_gender']);
			  $pet_species=mysqli_real_escape_string($connect,$_POST['pet_species']);
 
             $sql="SELECT * FROM `tbl_service`,tbl_service_details WHERE  tbl_service.id=tbl_service_details.service_id and tbl_service.id='$service_id' ";
             $result=$connect->query($sql);
             $row=mysqli_num_rows($result);
                 while($row = $result->fetch_array())
                 {
                     $sp_email=$row['email'];
                 }
     
             
                 $to = $sp_email;
                 $subject = "Appointment Request To You";
                 $message = " 
                 Request For Appointment please response to that by clicking on the following link : 
                 http://localhost/mai-service/SP_Log.php ";
     
                 $headers = "From :lg.youths@gmail.com";
                 if(mail($to, $subject, $message, $headers))
                 {
                  //   echo "<script>alert('Your appoint request is Send to Service Provider')</script>";
                 }
                 else
                 {
                     echo "<script>alert('Failed to mail')</script>";
                 }
                 
             $sql="insert into tbl_appointment(service_id,userid,name,pet_name,pet_gender,pet_age,pet_breed,pet_species,email,contact,address,a_date,time) 
                 values('$service_id','$userid','$name','$pet_name','$pet_gender','$pet_age','$pet_breed','$pet_species','$email','$contact','$address','$a_date','$time')";
             $result=mysqli_query($connect,$sql);
             if($result==true)
             {
                  echo"<script> alert('Your appoint request send to service provider wait for response')</script>";
                 
                    echo "<script>window.location.href='../User/services.php?id=$service_id';</script>";	
                 
             }
             else{
                 echo "Error:".$connect->error;
             }
         }

       //add Booking by User
       if(isset($_POST['book']))
       {
        $uid=$_SESSION['user_id'];
          $service_id= mysqli_real_escape_string($connect,$_POST['service_id']);
          $b_date= mysqli_real_escape_string($connect,$_POST['b_date']);
          $requirement= mysqli_real_escape_string($connect,$_POST['requirement']);
        //   $issue= mysqli_real_escape_string($connect,$_POST['issue']); 
          $name= mysqli_real_escape_string($connect,$_POST['name']);
           $email= mysqli_real_escape_string($connect,$_POST['email']);
           $contact= mysqli_real_escape_string($connect,$_POST['contact']); 
           $address= mysqli_real_escape_string($connect,$_POST['address']); 

             
           $target_file='../User/bg/issue/';
			
           $imagetmp=basename($_FILES['issue']['name']);
           $location1 = $target_file.$_FILES['issue']['name']; 
           
           if($imagetmp=="")   
           {
               $image_name="No image";
           }   
           else
           {
        
                $image_name= $imagetmp;
           }
 
           move_uploaded_file($_FILES['issue']['tmp_name'], $location1);
      
           $sql="SELECT * FROM `tbl_service`,tbl_service_details WHERE  tbl_service.id=tbl_service_details.service_id and tbl_service.id='$service_id' ";
           $result=$connect->query($sql);
           $row=mysqli_num_rows($result);
               while($row = $result->fetch_array())
               {
                   $sp_email=$row['email'];
               }
   
           
               $to = $sp_email;
               $subject = "Booking Request To You";
               $message = " 
               Request For Booking please response to that by clicking on the following link : 
               http://localhost/mai-service/SP_Log.php ";
   
               $headers = "From :lg.youths@gmail.com";
               if(mail($to, $subject, $message, $headers))
               {
                //   echo "<script>alert('Your appoint request is Send to Service Provider')</script>";
               }
               else
               {
                   echo "<script>alert('Failed to mail')</script>";
               }
               
           $sql="insert into tbl_booking(service_id,user_id,b_date,requirement,issue,name,email,contact,address) 
               values('$service_id','$uid','$b_date','$requirement','$image_name','$name','$email','$contact','$address')";
           $result=mysqli_query($connect,$sql);
           if($result==true)
           {
                echo"<script> alert('Your Successfully Book Service Provider')</script>";
               echo "<script>window.location.href='../payment/TxnTest.php?id=$uid&sid=$service_id';</script>";	
              
           }
           else{
               echo "Error:".$connect->error;
           }
       }


        //add plan by admin
        
        if(isset($_POST['btnplan']))
        {
            $plan_name= mysqli_real_escape_string($connect,$_POST['plan_name']);
            $quarterly= mysqli_real_escape_string($connect,$_POST['quarterly']);
            $six_month= mysqli_real_escape_string($connect,$_POST['six_month']); 
            $annual= mysqli_real_escape_string($connect,$_POST['annual']); 

            $sql="insert into tbl_plan(name,quarter,six_month,annual) 
                values('$plan_name','$quarterly','$six_month','$annual')";
            $result=mysqli_query($connect,$sql);
            if($result==true)
            {
                 echo"<script> alert('New Plan Added Successfully')</script>";
                echo "<script>window.location.href='../Admin/Addplans.php';</script>";	
               
            }
            else{
                echo "Error:".$connect->error;
            }
        }
       //add Service Category by admin
        
        if(isset($_POST['btncategory']))
        {
            $name= mysqli_real_escape_string($connect,$_POST['name']);
             //-------------------banner img ---------------------
             $target_file='../User/bg/';
             $imagetmp=basename($_FILES['banner']['name']);
             
                 $location = $target_file.$_FILES['banner']['name']; 
                 if($imagetmp=="")   
                 {
                     $banner="No image";
                 }   
                 else
                 {
                     $banner= $imagetmp;
                 }
                 move_uploaded_file($_FILES['banner']['tmp_name'], $location);

            $sql="insert into tbl_Category(name,image) values('$name','$imagetmp')";
            $result=mysqli_query($connect,$sql);
            if($result==true)
            {
                 echo"<script> alert('New Service Category Added Successfully')</script>";
                echo "<script>window.location.href='../Admin/Addservices.php';</script>";	
               
            }
            else{
                echo "Error:".$connect->error;
            }
        }
        
           //Request for estimation by user
           if(isset($_POST['estimate']))
           {
               $id=$_SESSION['user_id'];
               $service_id= mysqli_real_escape_string($connect,$_POST['service_id']);
               $date= mysqli_real_escape_string($connect,$_POST['date']);
               $requirement1= mysqli_real_escape_string($connect,$_POST['requirement1']);
               $requirement2= mysqli_real_escape_string($connect,$_POST['requirement2']);
               $name= mysqli_real_escape_string($connect,$_POST['name']);
               $email= mysqli_real_escape_string($connect,$_POST['email']);
               $contact= mysqli_real_escape_string($connect,$_POST['contact']);

                //-------------------issue img ---------------------
                $target_file='../User/bg/issue/';
                $imagetmp=basename($_FILES['issue']['name']);
                
                    $location = $target_file.$_FILES['issue']['name']; 
                    if($imagetmp=="")   
                    {
                        $issue="No image";
                    }   
                    else
                    {
                        $issue= $imagetmp;
                    }
                    move_uploaded_file($_FILES['issue']['tmp_name'], $location);
   
                    
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length=10;
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < $length; $i++)
         {
            $token .= $characters[rand(0, $charactersLength - 1)];
        }
      //  echo $token;

      $sql="SELECT * FROM `tbl_service`,tbl_service_details WHERE  tbl_service.id=tbl_service_details.service_id and tbl_service.id='$service_id' ";
       $result=$connect->query($sql);
        $row=mysqli_num_rows($result);
            while($row = $result->fetch_array())
            {
                $sp_email=$row['email'];
            }

        
            $to = $sp_email;
            $subject = "New Estimation Request";
            $message = " 
            Request For Quotation .
            Please give the best possible rate.
            The Request for quotation can be accessed by clicking on the following link : 
            http://localhost/mai-service/User/quotation_get.php?token=$token ";

            $headers = "From :lg.youths@gmail.com";
            if(mail($to, $subject, $message, $headers))
            {
                echo "<script>alert('Your Estimation Request is Send to Service Provider')</script>";
            }
            else
            {
                echo "<script>alert('Failed to mail ,try again')</script>";
            }
            $sql="insert into tbl_estimate(service_id,user_id,date,problem1,problem2,issue,name,email,contact,token) values
            ('$service_id','$id','$date','$requirement1','$requirement2','$imagetmp','$name','$email','$contact','$token')";
            $result=mysqli_query($connect,$sql);
            if($result==true)
            {
               //  echo"<script> alert('Request for estimation are send to service provider ')</script>";
                echo "<script>window.location.href='../User/services.php?id=$service_id';</script>";	
               
            }
            else{
                echo "Error:".$connect->error;
            }
           }

        // Service Provider response to estimation throw email
        if(isset($_POST['btnestimation']))
        {
            $token=$_GET['token'];
            $rate=$_POST['rate'];
            $email=$_POST['email'];

        $sql="update tbl_estimate set rate='$rate' where token ='$token'";
                $result=mysqli_query($connect,$sql);
                if($result==true)
                {
                    $to = $email;
                    $subject = "Response of your Estimation";
                    $message = "Please Check the Response go through the below link,
                    http://localhost/mai-service/User/ ";

                    $headers = "From :'lg.youths@gmail.com'";
                
                    if(mail($to,$subject,$message,$headers))
                    {
                    echo "<script>alert('Successfully Submited Your Response')</script>";
                    echo "<script>window.location.href='http://www.gmail.com';</script>";	  
                    }
                    else
                    {
                        echo "Mail Not Send to User";
                    }  
                }
                else
                {
                    echo "Error:".$connect->error;
                }

            }
            // User Registration
            if(isset($_POST['btnUserReg']))
            {
                $user_name= mysqli_real_escape_string($connect,$_POST['user_name']);
                $mobile= mysqli_real_escape_string($connect,$_POST['mobile']);
                $email= mysqli_real_escape_string($connect,$_POST['email']);
                $address= mysqli_real_escape_string($connect,$_POST['address']);
                $password= md5(mysqli_real_escape_string($connect,$_POST['pass']));
                $sql="insert into tbl_user(user_name,mobile,address,password,email) 
                values('$user_name','$mobile','$address','$password','$email')";
                $result=mysqli_query($connect,$sql);
                if($result==true)
                {
                  echo"<script> alert('Successfully Register,Now you Can Login')</script>";
                  echo "<script>window.location.href='../User/login.php';</script>";	    
                }
                else{
                    echo "Error:".$connect->error;
                }
            }
            //contact form
            if(isset($_POST['btn_contact']))
            {
                $user_name= mysqli_real_escape_string($connect,$_POST['user_name']);
                $mobile= mysqli_real_escape_string($connect,$_POST['mobile']);
                $email= mysqli_real_escape_string($connect,$_POST['email']);
                $message= mysqli_real_escape_string($connect,$_POST['message']);
                $sql="insert into tbl_contact(name,email,phone,message) values('$user_name','$email','$mobile','$message')";
                $result=mysqli_query($connect,$sql);
                if($result==true)
                {
                  echo"<script> alert('Successfully Submited')</script>";
                  echo "<script>window.location.href='../User/index.php';</script>";	    
                }
                else{
                    echo "Error:".$connect->error;
                }
            }
              //Review form user
              if(isset($_POST['btn_review']))
              {
                  $id=$_SESSION['user_id'];

                  $sql="select * from tbl_user where user_id=$id";
                  $result=$connect->query($sql);
                  while($row=$result->fetch_array())
                  {
                      $name=$row['user_name'];
                  }                  
                $review= mysqli_real_escape_string($connect,$_POST['review']);
                $service_id= mysqli_real_escape_string($connect,$_POST['service_id']);

                $sql="insert into tbl_review(user_id,service_id,name,message) values('$id','$service_id','$name','$review')";
                $result=mysqli_query($connect,$sql);
                if($result==true)
                {
                  echo"<script> alert('Successfully Review Submited')</script>";
                  echo "<script>window.location.href='../User/services.php?id=$service_id';</script>";	    
                }
                else{
                    echo "Error:".$connect->error;
                } 
              }
