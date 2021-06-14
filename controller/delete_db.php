<?php
include("../db_connect.php");
 $id = $_GET['id']; 
 $type = $_GET['type']; 
 
switch($type)
{
	case 'category':
				$sql="delete from tbl_category where id='$id'";
				if(mysqli_query($connect,$sql))
				{
					echo "<script>alert('Service Category having id $id has been deleted')</script>";
					echo "<script>window.location.href='../Admin/Addservices.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($connect);
				}
                break;

    case 'plan':
        $sql="delete from tbl_plan where id='$id'";
        if(mysqli_query($connect,$sql))
        {
            echo "<script>alert('Plan having id $id has been deleted')</script>";
            echo "<script>window.location.href='../Admin/Addplans.php'</script>";
        }
        else
        {
            echo "Error deleting record :".mysqli_error($connect);
        }
        break;
    case 'provider':
        $sql="delete from tbl_serviceprovider where id='$id'";
        if(mysqli_query($connect,$sql))
        {
            echo "<script>alert('Service Provider having id $id has been deleted')</script>";
            echo "<script>window.location.href='../Admin/serviceprovider.php'</script>";
        }
        else
        {
            echo "Error deleting record :".mysqli_error($connect);
        }
        break;
    case 'service':
        $sql="delete from tbl_service where id='$id'";
        if(mysqli_query($connect,$sql))
        {
          //  echo "<script>alert('Service having id $id has been deleted')</script>";
            echo "<script>window.location.href='../ServiceProvider/services.php'</script>";
        }
        else
        {
            echo "Error deleting record :".mysqli_error($connect);
        }
        break;
    case 'service_pro':
        $sql="delete from tbl_service where id='$id'";
        if(mysqli_query($connect,$sql))
        {
          //  echo "<script>alert('Service having id $id has been deleted')</script>";
            echo "<script>window.location.href='../ServiceProvider/services_pro.php'</script>";
        }
        else
        {
            echo "Error deleting record :".mysqli_error($connect);
        }
        break;
    
}

?>
