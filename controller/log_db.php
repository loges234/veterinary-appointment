<?php include("../db_connect.php");

    //Service Provder Login
    if(isset($_POST['btn_splog']))
    {
        $email=$_POST['email'];
        $passsword=md5($_POST['password']);          
        $sql="select * from tbl_serviceprovider where email='$email' and password='$passsword' ";
        $result=$connect->query($sql);
        $row=mysqli_num_rows($result);
        if($row==1)
        {
            while($row = $result->fetch_array())
            {
                    $sp_id=$row['id'];
                    $profile_logo=$row['profile'];

                    $_SESSION['SP_id']=$sp_id;
                    $_SESSION['Profile']=$profile_logo;
                echo "<script>alert('Welcome To Veterinary Appointment')</script>";
                echo "<script>window.location.href='../ServiceProvider/index.php';</script>";                   
            }
        }
        else
        {
        //    echo "<script>alert('Invalid Email id & Password,Please try again')</script>";
        //    echo "<script>window.location.href='../SP_Log.php';</script>";  
        }
            //Service Provder Pro Login
        $sql1="select * from tbl_serviceprovider_pro where email='$email' and password='$passsword' and status='Active' ";
        $result1=$connect->query($sql1);
        $row1=mysqli_num_rows($result1);
        if($row1==1)
        {
            while($row1 = $result1->fetch_array())
            {
                $id=$row1['pro_id'];
                $today_date=date("Y-m-d");
                $end_date=$row1['end_date'];
              
                if($end_date <=  $today_date)
                {
                    $update="update tbl_serviceprovider_pro set status='Deactive' where pro_id='$id'";                    
                    $result=mysqli_query($connect,$update);
                    if($result==true)
                    {
                        $service="update tbl_service set status='Deactive' where sp_id='$id'";                    
                        $r=mysqli_query($connect,$service) or die(mysqli_error($connect));

                        echo "<script>alert('Sorry Your Free Trial of Service is Expire..! Build Your Profile as Provider')</script>";
                        echo "<script>window.location.href='../User/signup.php';</script>";  
                    }
                    else{
                        echo "Error:".$connect->error;
                    }
                   
                }
                else
                {
                    $pro_id=$row1['pro_id'];
                    $profile_logo=$row1['profile'];

                    $_SESSION['pro_id']=$pro_id;
                    $_SESSION['Profile']=$profile_logo;

                    // echo $today_date;
                    // echo $end_date;
                echo "<script>window.location.href='../ServiceProvider/index.php';</script>";  
                }                 
            }
        }
        else
        {
            echo "<script>alert('Sorry Your Free Trial of Service is Expire..! Build Your Profile as Provider')</script>";
            echo "<script>window.location.href='../SP_Log.php';</script>";	                
        }
    }
    //User Login
    if(isset($_POST['btn_userlog']))
    {
        $email=$_POST['email'];
        $passsword=md5($_POST['password']);          
        $sql="select * from tbl_user where email='$email' and password='$passsword' ";
        $result=$connect->query($sql);
        $row=mysqli_num_rows($result);
        if($row==1)
        {
            while($row = $result->fetch_array())
            {
                    $user_id=$row['user_id'];
                    
                    $_SESSION['user_id']=$user_id;

                   // echo  $_SESSION['user_id'];
                   echo "<script>alert('Welcome To Veterinary Appointment..')</script>";
                echo "<script>window.location.href='../User/index.php';</script>";                   
            }
        }
        else
        {
            echo "<script>alert('Invalid Email id & Password,Please try again')</script>";
            echo "<script>window.location.href='../user/login.php';</script>";    
        }
        $sql2="select * from tbl_serviceprovider where email='$email' and password='$passsword' ";
        $result2=$connect->query($sql2);
        $row2=mysqli_num_rows($result2);
        if($row2==1)
        {
            while($row2 = $result2->fetch_array())
            {
                    $sp_id=$row2['id'];
                    $profile_logo=$row2['profile'];

                    $_SESSION['SP_id']=$sp_id;
                    $_SESSION['Profile']=$profile_logo;
                echo "<script>window.location.href='../ServiceProvider/index.php';</script>";                   
            }
        }
        $sql1="select * from tbl_serviceprovider_pro where email='$email' and password='$passsword' and status='Active' ";
        $result1=$connect->query($sql1);
        $row1=mysqli_num_rows($result1);
        if($row1==1)
        {
            while($row1 = $result1->fetch_array())
            {
                $id=$row1['pro_id'];
                $today_date=date("Y-m-d");
                $end_date=$row1['end_date'];
              
                if($end_date <=  $today_date)
                {
                    $update="update tbl_serviceprovider_pro set status='Deactive' where pro_id='$id'";                    
                    $result=mysqli_query($connect,$update);
                    if($result==true)
                    {
                        $service="update tbl_service set status='Deactive' where sp_id='$id'";                    
                        $r=mysqli_query($connect,$service) or die(mysqli_error($connect));

                        echo "<script>alert('Sorry Your Free Trial of Service is Expire..! Build Your Profile as Provider')</script>";
                        echo "<script>window.location.href='../User/signup.php';</script>";  
                    }
                    else{
                        echo "Error:".$connect->error;
                    }
                   
                }
                else
                {
                    $pro_id=$row1['pro_id'];
                    $profile_logo=$row1['profile'];

                    $_SESSION['pro_id']=$pro_id;
                    $_SESSION['Profile']=$profile_logo;

                    // echo $today_date;
                    // echo $end_date;
                echo "<script>window.location.href='../ServiceProvider/index.php';</script>";  
                }                 
            }
        }
        else
        {
            echo "<script>alert('Sorry Your Free Trial of Service is Expire..! Build Your Profile as Provider')</script>";
            echo "<script>window.location.href='../SP_Log.php';</script>";	                
        }
    }
    //admin login
    if(isset($_POST['btnadmin']))
    {
        $email=$_POST['email'];
        $passsword=md5($_POST['password']);          
        $sql="select * from tbl_admin where email='$email' and password='$passsword' ";
        $result=$connect->query($sql);
        $row=mysqli_num_rows($result);
        if($row==1)
        {
            while($row = $result->fetch_array())
            {
                    $id=$row['id'];
                    $_SESSION['admin']=$id;
                echo "<script> alert('Welcome Veterinary Admin..')</script>";
                echo "<script>window.location.href='../Admin/index.php';</script>";                   
            }
        }
        else
        {
            echo "<script> alert('Email id and password are incorrect.. Please try Again')</script>";
            echo "<script>window.location.href='../admin/login.php';</script>";	                
        }
    }