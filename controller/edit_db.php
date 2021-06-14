<?php
 include("../db_connect.php");

  // Edit Plan Payment Status by admin
  if(isset($_POST['btnPlan_status']))
  {
      $id=$_GET['id'];
    //   $payment= mysqli_real_escape_string($connect,$_POST['payment']);
      $plan= mysqli_real_escape_string($connect,$_POST['plan']);
     
      $updateSQL ="Update tbl_plan_purchase set plan_status='$plan' where purchase_id='$id'";
      if(mysqli_query($connect, $updateSQL))
      {
          echo "<script>alert('Service Provider Account Permission Status is Updated Successfully!!!')</script>";
          echo "<script>window.location.href='../Admin/addprovider.php';</script>";	
      }
      else
      {
          echo" Error:".$connect->error;
      }
  }

        // Edit Plan by admin
        if(isset($_POST['btnPlan']))
        {
            $id=$_GET['id'];
            $plan_name= mysqli_real_escape_string($connect,$_POST['name']);
            $quarterly= mysqli_real_escape_string($connect,$_POST['quarter']);
            $six_month= mysqli_real_escape_string($connect,$_POST['six_month']); 
            $annual= mysqli_real_escape_string($connect,$_POST['annual']); 

            $updateSQL ="Update tbl_plan set name='$plan_name',quarter='$quarterly',six_month='$six_month',annual='$annual' where id='$id'";
            if(mysqli_query($connect, $updateSQL))
            {
                echo "<script>alert('Plan Updated Successfully!!!')</script>";
                echo "<script>window.location.href='../Admin/Addplans.php';</script>";	
            }
            else
            {
                echo" Error:".$connect->error;
            }
        }
       
        // Edit Category by admin
        if(isset($_POST['btnService']))
        {
            $id=$_GET['id'];
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

            $updateSQL ="Update tbl_category set name='$name',image='$imagetmp' where id='$id'";
            if(mysqli_query($connect, $updateSQL))
            {
                echo "<script>alert('Category Updated Successfully!!!')</script>";
                echo "<script>window.location.href='../Admin/Addservices.php';</script>";	
            }
            else
            {
                echo" Error:".$connect->error;
            }
        } 
        //edit sp by admin
        if(isset($_POST['btnProvider']))
        {
            $id= $_GET['id'];
            $name= mysqli_real_escape_string($connect,$_POST['name']);
          //   $category= mysqli_real_escape_string($connect,$_POST['category']);
            $contact= mysqli_real_escape_string($connect,$_POST['contact']);
            $email= mysqli_real_escape_string($connect,$_POST['email']);
            $status= mysqli_real_escape_string($connect,$_POST['status']);

            $sql="Update tbl_serviceprovider set status='$status',
                name='$name',contact='$contact',email='$email' where id='$id' ";
            $result=mysqli_query($connect,$sql);
            if($result==true)
            {
                 echo"<script> alert('Successfully Updated!!')</script>";
                echo "<script>window.location.href='../Admin/addprovider.php';</script>";	
               
            }
            else{
                echo "Error:".$connect->error;
            }
        }
        //update password service Provider
        if(isset($_POST['btnpassword']))
        {
          $old= mysqli_real_escape_string($connect,$_POST['old']);
          $new= mysqli_real_escape_string($connect,$_POST['password']);

          $id= $_SESSION['SP_id'];
          $old=md5($old);
          $new=md5($new);

          $sql="select * from  tbl_serviceprovider where id='$id'";
          $result=mysqli_query($connect,$sql);
          $row=mysqli_fetch_array($result);
          if($row['password']==$old)
          {
                      $update="update tbl_serviceprovider set password='$new' where id='$id'";                    
                      $result=mysqli_query($connect,$update);
                      if($result==true)
                      {
                        
                      echo "<script>alert('Your password has been Changed to new password')</script>";
                      echo "<script>window.location.href='../ServiceProvider/changepassword.php'</script>";  
                      }
                      else{
                          echo "Error:".$connect->error;
                      }

          }
          else{
                //  echo "Error".$connect->error;
                  echo "<script>alert('Please Try Again')</script>";
                  echo "<script>window.location.href='../ServiceProvider/changepassword.php'</script>";
          }           
        }

        //Update Service Provider Service
        if(isset($_POST['btn_service_update']))
        {  
            $id= mysqli_real_escape_string($connect,$_POST['id']);
            $name= mysqli_real_escape_string($connect,$_POST['name']);
            $Category= mysqli_real_escape_string($connect,$_POST['profession']);
            $Contact= mysqli_real_escape_string($connect,$_POST['Contact']);
            $Location= mysqli_real_escape_string($connect,$_POST['Location']);
            $Description= mysqli_real_escape_string($connect,$_POST['Description']);
            $member= mysqli_real_escape_string($connect,$_POST['member']);
            $appointment_fee= mysqli_real_escape_string($connect,$_POST['appointment_fee']);

            $sql="Update tbl_service set 
            service_name='$name',category='$Category',phone='$Contact',location='$Location',description='$Description',
            member='$member',appointment_fee='$appointment_fee' where id='$id' ";
  
          $result=mysqli_query($connect,$sql);
          if($result==true)
          {
               echo"<script> alert('Successfully Updated Your Service')</script>";
              echo "<script>window.location.href='../ServiceProvider/services.php';</script>";	
             
          }
          else{
              echo "Error:".$connect->error;
          }
      }
      //Update Pro Service Provider Service
      if(isset($_POST['btn_pro_service_update']))
      {  
          $id= mysqli_real_escape_string($connect,$_POST['id']);
          $name= mysqli_real_escape_string($connect,$_POST['name']);
          $Category= mysqli_real_escape_string($connect,$_POST['profession']);
          $Contact= mysqli_real_escape_string($connect,$_POST['Contact']);
          $Location= mysqli_real_escape_string($connect,$_POST['Location']);
          $Description= mysqli_real_escape_string($connect,$_POST['Description']);
          $member= mysqli_real_escape_string($connect,$_POST['member']);
          $appointment_fee= mysqli_real_escape_string($connect,$_POST['appointment_fee']);

          $sql="Update tbl_service set 
          service_name='$name',category='$Category',phone='$Contact',location='$Location',description='$Description',
          member='$member',appointment_fee='$appointment_fee' where id='$id' ";

        $result=mysqli_query($connect,$sql);
        if($result==true)
        {
             echo"<script> alert('Successfully Updated Your Service')</script>";
            echo "<script>window.location.href='../ServiceProvider/services_pro.php';</script>";	
           
        }
        else{
            echo "Error:".$connect->error;
        }
    }
  
           // Update Service Provider Profile
          if(isset($_POST['btn_profileupdate']))
          {
              if(isset($_SESSION['SP_id']))
              {
                $id= $_SESSION['SP_id'];
                $name= mysqli_real_escape_string($connect,$_POST['name']);
                $contact= mysqli_real_escape_string($connect,$_POST['contact']);
                $email= mysqli_real_escape_string($connect,$_POST['email']);
                $city= mysqli_real_escape_string($connect,$_POST['city']);
                $address= mysqli_real_escape_string($connect,$_POST['address']);
                $state= mysqli_real_escape_string($connect,$_POST['state']);
                $pincode=mysqli_real_escape_string($connect,$_POST['pincode']);
    
                $sql="Update tbl_serviceprovider set 
                    name='$name',contact='$contact',email='$email',city='$city',address='$address',
                    state='$state',pincode='$pincode' where id='$id' ";
                $result=mysqli_query($connect,$sql);
                if($result==true)
                {
                    echo"<script> alert('Successfully Updated!!')</script>";
                    echo "<script>window.location.href='../ServiceProvider/profile.php';</script>";	
                    
                }
                else{
                    echo "Error:".$connect->error;
                }
              }
              if(isset($_SESSION['pro_id']))
              {
                $id= $_SESSION['pro_id'];
                $name= mysqli_real_escape_string($connect,$_POST['name']);
                $contact= mysqli_real_escape_string($connect,$_POST['contact']);
                $email= mysqli_real_escape_string($connect,$_POST['email']);
                $city= mysqli_real_escape_string($connect,$_POST['city']);
                $address= mysqli_real_escape_string($connect,$_POST['address']);
                $state= mysqli_real_escape_string($connect,$_POST['state']);
                $pincode=mysqli_real_escape_string($connect,$_POST['pincode']);
    
                $sql="Update tbl_serviceprovider_pro set 
                    name='$name',contact='$contact',email='$email',city='$city',address='$address',
                    state='$state',pincode='$pincode' where pro_id='$id' ";
                $result=mysqli_query($connect,$sql);
                if($result==true)
                {
                    echo"<script> alert('Successfully Updated!!')</script>";
                    echo "<script>window.location.href='../ServiceProvider/profile.php';</script>";	
                    
                }
                else{
                    echo "Error:".$connect->error;
                }
              }
          }
  
           // Add Service details single by Service Provider
           if(isset($_POST['btn_servicedetails']))
           {
            $id=mysqli_real_escape_string($connect,$_POST['id']);
            $name= mysqli_real_escape_string($connect,$_POST['name']);
            $email= mysqli_real_escape_string($connect,$_POST['email']);
            $contact= mysqli_real_escape_string($connect,$_POST['contact']);
            $address= mysqli_real_escape_string($connect,$_POST['address']);
            $country= mysqli_real_escape_string($connect,$_POST['country']);
            $city= mysqli_real_escape_string($connect,$_POST['city']);
            $state= mysqli_real_escape_string($connect,$_POST['state']);
            $pincode= mysqli_real_escape_string($connect,$_POST['pincode']);
            $year= mysqli_real_escape_string($connect,$_POST['year']);
            $date= mysqli_real_escape_string($connect,$_POST['date']);
            $details= mysqli_real_escape_string($connect,$_POST['details']);

          //------------------faq-------------------------------
          $faq1= mysqli_real_escape_string($connect,$_POST['faq1']);
          $faq2= mysqli_real_escape_string($connect,$_POST['faq2']);

        if(isset($_POST['id']))
        {
          $sql="insert into tbl_service_details(service_id,email,city,pincode,exp,start_date,details)values('$id','$email','$city','$pincode','$year','$date','$details')";
          $result=mysqli_query($connect,$sql);

          $fq="insert into tbl_faq(service_id,faq1,faq2)values('$id','$faq1','$faq2')";
          $fq_result=mysqli_query($connect,$fq);
          echo"<script> alert('Successfully Updated!!')</script>";
          if(isset($_SESSION['pro_id']))
          {
            echo "<script>window.location.href='../ServiceProvider/services_pro.php';</script>";
          }
          else
          {
          echo "<script>window.location.href='../ServiceProvider/services.php';</script>";
          }
        }

        }
           // Add Photo into Service by service provider
           if(isset($_POST['btn_servicephoto']))
           {
            $id=mysqli_real_escape_string($connect,$_POST['id']);        
            //-------------------banner img ---------------------
            $target_file='serviceprovider/services/banner/'.$id;
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
            //-------------------- Work 1 -------------------------
              $target_file1='serviceprovider/services/working/'.$id;
              $imagetmp1=basename($_FILES['work1']['name']);
                $location1 = $target_file1.$_FILES['work1']['name']; 
                if($imagetmp1=="")   
                {
                    $work1="No image";
                }   
                else
                {
                    $work1= $imagetmp1;
                }
                move_uploaded_file($_FILES['work1']['tmp_name'], $location1);
           //-------------------- Work 2 -------------------------
            $target_file2='serviceprovider/services/working/'.$id;
                $imagetmp2=basename($_FILES['work2']['name']);
                $location2 = $target_file2.$_FILES['work2']['name']; 
                if($imagetmp2=="")   
                {
                    $work2="No image";
                }   
                else
                {
                    $work2= $imagetmp2;
                }
                move_uploaded_file($_FILES['work2']['tmp_name'], $location2);
            //-------------------- Work 3 -------------------------
            $target_file3='serviceprovider/services/working/'.$id;
            $imagetmp3=basename($_FILES['work3']['name']);
               $location3 = $target_file2.$_FILES['work3']['name']; 
                if($imagetmp3=="")   
                {
                    $work3="No image";
                }   
                else
                {
                    $work3= $imagetmp3;
                }
                move_uploaded_file($_FILES['work3']['tmp_name'], $location3);
        
          $media="insert into tbl_media (service_id,banner,work_image1,work_image2,work_image3) values('$id','$imagetmp','$imagetmp1','$imagetmp2','$imagetmp3')";
          $media_result=mysqli_query($connect,$media);

 
          echo"<script> alert('Successfully Upload Images!!')</script>";

          if(isset($_SESSION['pro_id']))
          {
            echo "<script>window.location.href='../ServiceProvider/services_pro.php';</script>";
          }
          else
          {
          echo "<script>window.location.href='../ServiceProvider/services.php';</script>";
          }
        }

        // Add Video into Service by service provider
        if(isset($_POST['btn_servicevideo']))
        {
         $id=mysqli_real_escape_string($connect,$_POST['id']);        
       $video = $_FILES['video']['name'];
       $tmp_name=$_FILES['video']['tmp_name'];
       $path = "serviceprovider/videos/";
       $target_file = $path .  $video;
       $location="serviceprovider/videos/". $video;
       move_uploaded_file($tmp_name, $path. $video);
     
       $media="update tbl_media set video='$video' where service_id='$id' ";
       $media_result=mysqli_query($connect,$media);

       echo"<script> alert('Successfully Upload Video!!')</script>";
       if(isset($_SESSION['pro_id']))
       {
         echo "<script>window.location.href='../ServiceProvider/services_pro.php';</script>";
       }
       else
       {
       echo "<script>window.location.href='../ServiceProvider/services.php';</script>";
       }
     }


           // Update Service details single by Service Provider
           if(isset($_POST['btn_updateservicedetails']))
           {
            $id=mysqli_real_escape_string($connect,$_POST['id']);
            $name= mysqli_real_escape_string($connect,$_POST['name']);
            $email= mysqli_real_escape_string($connect,$_POST['email']);
            $contact= mysqli_real_escape_string($connect,$_POST['contact']);
            $address= mysqli_real_escape_string($connect,$_POST['address']);
            $country= mysqli_real_escape_string($connect,$_POST['country']);
            $city= mysqli_real_escape_string($connect,$_POST['city']);
            $state= mysqli_real_escape_string($connect,$_POST['state']);
            $pincode= mysqli_real_escape_string($connect,$_POST['pincode']);
            $year= mysqli_real_escape_string($connect,$_POST['year']);
            $date= mysqli_real_escape_string($connect,$_POST['date']);
            $details= mysqli_real_escape_string($connect,$_POST['details']);

          //------------------faq-------------------------------
          $faq1= mysqli_real_escape_string($connect,$_POST['faq1']);
          $faq2= mysqli_real_escape_string($connect,$_POST['faq2']);
        if(isset($_POST['id']))
        {
                        
          $sql="update tbl_service_details
          set email='$email',city='$city',pincode='$pincode',exp='$year',start_date='$date',details='$details' where service_id='$id'";
          $result=mysqli_query($connect,$sql);

          $fq="update tbl_faq set faq1='$faq1',faq2='$faq2' where service_id='$id' ";
          $fq_result=mysqli_query($connect,$fq);

          echo"<script> alert('Successfully Updated Service Details!!');</script>";
          if(isset($_SESSION['pro_id']))
          {
            echo "<script>window.location.href='../ServiceProvider/services_pro.php';</script>";
          }
          else
          {
          echo "<script>window.location.href='../ServiceProvider/services.php';</script>";
          }
        }

        }
      

        // Update User Profile
        if(isset($_POST['btn_profileupdate_user']))
        {
              $id= $_SESSION['user_id'];
              $name= mysqli_real_escape_string($connect,$_POST['name']);
              $contact= mysqli_real_escape_string($connect,$_POST['contact']);
              $email= mysqli_real_escape_string($connect,$_POST['email']);
              $city= mysqli_real_escape_string($connect,$_POST['city']);
              $address= mysqli_real_escape_string($connect,$_POST['address']);
              $state= mysqli_real_escape_string($connect,$_POST['state']);
              $pincode=mysqli_real_escape_string($connect,$_POST['pincode']);
			  $pet_name=mysqli_real_escape_string($connect,$_POST['pet_name']);
			  $pet_age=mysqli_real_escape_string($connect,$_POST['pet_age']);
			  $pet_breed=mysqli_real_escape_string($connect,$_POST['pet_breed']);
			  $pet_gender=mysqli_real_escape_string($connect,$_POST['pet_gender']);
			  $pet_species=mysqli_real_escape_string($connect,$_POST['pet_species']);
  
              $sql="Update tbl_user set 
                  user_name='$name',mobile='$contact',email='$email',city='$city',address='$address',
                  state='$state',pincode='$pincode',pet_name='$pet_name',pet_age='$pet_age',pet_breed='$pet_breed',pet_gender='$pet_gender',pet_species='$pet_species' where user_id='$id' ";
              $result=mysqli_query($connect,$sql);
              if($result==true)
              {
                  echo"<script> alert('Successfully Updated!!')</script>";
                  echo "<script>window.location.href='../user/profile.php';</script>";	
                  
              }
              else
              {
                  echo "Error:".$connect->error;
              }
        }   
          
        if(isset($_POST['btn_userphoto']))
        {
            $id= $_SESSION['user_id'];

        $target_file='../User/profile/';
			
        $imagetmp=basename($_FILES['profile']['name']);
        $location1 = $target_file.$_FILES['profile']['name']; 
        
        if($imagetmp=="")   
        {
            $image_name="No image";
        }   
        else
        {
     
             $image_name= $imagetmp;
        }

        move_uploaded_file($_FILES['profile']['tmp_name'], $location1);

        $sql="Update tbl_user set profile='$image_name' where user_id='$id' ";
    $result=mysqli_query($connect,$sql);
    if($result==true)
    {
        echo"<script> alert('Successfully Updated Profile!!')</script>";
        echo "<script>window.location.href='../user/profile.php';</script>";	
        
    }
    else
    {
        echo "Error:".$connect->error;
    }
}

   //update password User
   if(isset($_POST['btn_userpassword']))
   {
     $old= mysqli_real_escape_string($connect,$_POST['old']);
     $new= mysqli_real_escape_string($connect,$_POST['password']);

     $id= $_SESSION['user_id'];
     $old=md5($old);
     $new=md5($new);
     $sql="select * from  tbl_user where user_id='$id'";
     $result=mysqli_query($connect,$sql);
     $row=mysqli_fetch_array($result);
     if($row['password']==$old)
     {
                 $update="update tbl_user set password='$new' where user_id='$id'";                    
                 $r=mysqli_query($connect,$update) or die(mysqli_error($connect));
                 echo "<script>alert('Your password has been Changed to new password')</script>";
                 echo "<script>window.location.href='../user/changepassword.php'</script>";
     }
     else{
             echo "Error".$connect->error;
             echo "<script>alert('Your Password Not Changed,Please try again..')</script>";
             echo "<script>window.location.href='../user/changepassword.php'</script>";
     }           
   }

   
   //update password UserAdmin
   if(isset($_POST['btn_adminpassword']))
   {
     $old= mysqli_real_escape_string($connect,$_POST['old']);
     $new= mysqli_real_escape_string($connect,$_POST['password']);

     $id= $_SESSION['admin'];
     $old=md5($old);
     $new=md5($new);
     $sql="select * from  tbl_admin where id='$id'";
     $result=mysqli_query($connect,$sql);
     $row=mysqli_fetch_array($result);
     if($row['password']==$old)
     {
                 $update="update tbl_admin set password='$new' where id='$id'";                    
                 $r=mysqli_query($connect,$update) or die(mysqli_error($connect));
                 echo "<script>alert('Your password has been Changed to new password')</script>";
                 echo "<script>window.location.href='../admin/changepassword.php'</script>";
     }
     else{
             echo "Error".$connect->error;
             echo "<script>alert('Your Password Not Changed,Please try again..')</script>";
             echo "<script>window.location.href='../admin/changepassword.php'</script>";
     }           
   }

     //update Appointment Status by SP
     if(isset($_POST['btn_appoint_status']))
     {
        
        $user_phone= mysqli_real_escape_string($connect,$_POST['user_phone']);    
        $appoint_id= mysqli_real_escape_string($connect,$_POST['appoint_id']);        
        $status= mysqli_real_escape_string($connect,$_POST['status']);        
        $service_name= mysqli_real_escape_string($connect,$_POST['service_name']);
        $user_email= mysqli_real_escape_string($connect,$_POST['user_email']);
        
        $sql1="select * from tbl_appointment where id='$appoint_id'";
        $result1=$connect->query($sql1);
        $row=mysqli_num_rows($result1);
        while($row = $result1->fetch_array())
            {
                $a_date=$row['a_date'];
            }
//echo $sql1;
        $sql="Update tbl_appointment set status='$status' where id='$appoint_id' ";
        $result=mysqli_query($connect,$sql);
        if($result==true)
        {
            
            echo"<script> alert('Successfully Updated Appointment Status!!')</script>";
                
                $to = $user_email;
                $subject = "Appointment Status with $service_name";
                $message = "Your Appointment with Mai Service Employee are be $status ";
                $headers = "From :lg.youths@gmail.com";

                if(mail($to, $subject, $message, $headers))
                {
                    echo "<script>alert('Send Mail To User Successfully')</script>";
                }
                else
                {
                    echo "<script>alert('Failed to mail ,try again')</script>";
                }       
          //--------------------- Send Message -------------------  
$textMessage="Your Appointment with $service_name for $a_date are $status";
//echo$textMessage;
$apiKey = urlencode('SZ57J4DhDMQ-25bP9ASjeanByW4uMQwKD94SlhCTks');
   
   // Message details
   $numbers = array($user_phone);
   $sender = urlencode('TXTLCL');
   $message = rawurlencode($textMessage);

   $numbers = implode(',', $numbers);

   // Prepare data for POST request
   $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

   // Send the POST request with cURL
   $ch = curl_init('https://api.textlocal.in/send/');
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);   
   // Process your response here
   //echo $response;

             echo "<script>window.location.href='../ServiceProvider/Appoint.php';</script>";	
        }
        else
        {
            echo "Error:".$connect->error;
        }
     }
     //  Service Provider response to estimation throw Dashboard
     if(isset($_POST['btnestimation_Dashboard']))
     {
        $token=$_POST['token'];
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
                 echo "<script>window.location.href='../ServiceProvider/Estimation_edit.php?token=$token';</script>";	   
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
     //  Service Provider Confirm the Booking
    //  if(isset($_POST['btn_confirmbook']))
    //  {
    //     $book_id=$_POST['book_id'];
    //      $status=$_POST['status'];
    //      $email=$_POST['email'];

    //      if($status=='Done')
    //      {
    //         $booking_status='Confirmed';
    //      }
    //      if($status=='Not Paid')
    //      {
    //         $booking_status='Rejected';
    //      }
    //  $sql="update tbl_booking set payment='$status',booking_status='$booking_status' where book_id ='$book_id'";
    //          $result=mysqli_query($connect,$sql);
    //          if($result==true)
    //          {
    //             $to = $email;
    //             $subject = "Response of your Booking";
    //             $message = "Your Booking is $booking_status
    //             Please Check the Response go through the below link,
    //             http://localhost/mai-service/User/ ";

    //             $headers = "From :'maiservice18@gmail.com'";
            
    //             if(mail($to,$subject,$message,$headers))
    //             {
    //              echo "<script>alert('Successfully Submited Your Response')</script>";
    //              echo "<script>window.location.href='../ServiceProvider/Book_details.php?id=$book_id';</script>";	   
    //             }
    //             else
    //             {
    //                 echo "Mail Not Send to User";
    //             } 
    //          }
    //          else
    //          {
    //              echo "Error:".$connect->error;
    //          }

    //      }


       //Cancle Appointment 
   if(isset($_POST['appointment_cancle']))
   {
    $id= $_GET['id'];

    $update="update tbl_appointment set status='Cancel' where id='$id' ";                    
    $r=mysqli_query($connect,$update) or die(mysqli_error($connect));
    echo "<script>alert('Your Appointment is Cancelled')</script>";
   // echo $update;
   echo "<script>window.location.href='../user/appointment.php'</script>";
   }
    
       //Cancle booking 
       if(isset($_POST['booking_cancle']))
       {
        $id= $_GET['id'];
        $book_id=$_POST['book_id'];

        $update="update tbl_payment set booking_status='Cancel' where book_id='$book_id' ";                    
        $r=mysqli_query($connect,$update) or die(mysqli_error($connect));
        echo "<script>alert('Your Booking is Cancelled')</script>";
       // echo $update;
       echo "<script>window.location.href='../user/Booking.php'</script>";
       }
   
?>