<?php
 include("../db_connect.php");

$token=$_GET['token'];

$sql="select * from tbl_estimate,tbl_Service where token='$token' and tbl_service.id=tbl_estimate.service_id"; 
$result=$connect->query($sql);
 while($row = $result->fetch_array())
    {

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Mai Service</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;
    }
</style>
</head>
<body>
    <div class="container">
<div class="bs-example">
    <div class="row">
        <div class="col">
            <img src="../assets/logo.png" alt="logo" height="100">
        </div>
        <div class="col" align="right">
            <h3 class="name">To,</h3>
                <?php echo $row['name']; ?><br>
            <?php echo $row['email']; ?><br><?php echo $row['contact']; ?><br>
           </div>
    </div><br>
   

    <form action="../controller/add_db.php?token=<?php echo $token; ?>" method="post">
        <table id="sorting-table" class="table mb-0">
            
            <tbody> <input type="hidden" value="<?php echo $row['email']; ?>" name="email">
                    <tr>
                        <td colspan="4"><h3 align="center"><?php echo $row['service_name']; ?></h3>
                        <p align="center">Request for the estimation of service requirement are below,</p></td>
                    </tr>
                    <tr>
                        <td colspan="3"  align="right"><b>Service Required On </b></td>
                        <td align="right"><input type="text" name="rdate" value="<?php echo $row['date']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td colspan="3"  align="right"><b>Requirement 1</b></td>
                        <td align="right"><input type="text" name="requirement" value="<?php echo $row['problem1']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td colspan="3"  align="right"><b>Requirement 2</b></td>
                        <td align="right"><input type="text" name="requirement" value="<?php echo $row['problem2']; ?>" class="form-control"  readonly></td>
                    </tr>
                    <tr>
                        <td colspan="3"  align="right"><b>About issue</b></td>
                        <td><img src="bg/issue/<?php echo $row['issue']; ?>" height="100" width="150"></td>
                    </tr>
                    <?php if($row['rate']!='') { ?>
                    <tr>
                        <td colspan="3"  align="right"><b>Rate</b></td>
                        <td align="right"><input type="number" name="rate" class="form-control" value="<?php echo $row['rate']; ?>"readonly></td>
                    </tr>
                    <tr>               
                        <td colspan="4"> <h4 align="center">Your Request Quotation Already Submitted.. </h4></td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td colspan="3"  align="right"><b>Rate</b></td>
                        <td align="right"><input type="number" name="rate" class="form-control"></td>
                    <tr>
                    <tr>
                        <td colspan="4" align="center"><br>
                             <input type="submit" name="btnestimation" class="btn btn-primary" value="Save">
                        </td>
                    </tr>
                    <?php } ?>
                    
             </tbody>
        </table>
    </form>
</div>
</div>
</body>
</html>
<?php 
    }
?>