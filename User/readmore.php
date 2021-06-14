<?php include("include/sidenavbar.php"); ?>
    <br><br>
    <?php
 if(isset($_SESSION['user_id']))
  {  
    $i=1;
    $token=$_GET['token'];
	$id=$_SESSION['user_id'];
   $sql="select * from tbl_service,tbl_estimate where user_id='$id' and  tbl_service.id=tbl_estimate.service_id and token='$token'";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
   while($row = $result->fetch_array())
       {
          
           ?>
    <h2 align="center"><b>Estimation Details of <?php echo $row['service_name']; ?></b></h2><br>
    <table id="sorting-table" class="table mb-0">
            <tbody>
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
                        <td colspan="3"  align="right"><b>Pet Photo</b></td>
                        <td><img src="bg/issue/<?php echo $row['issue']; ?>" height="100" width="150"></td>
                    </tr>
                    <?php if($row['rate']!='') { ?>
                    <tr>
                        <td colspan="3"  align="right"><b>Rate</b></td>
                        <td align="right"><input type="number" name="rate" class="form-control" value="<?php echo $row['rate']; ?>"readonly></td>
                    </tr>
                    <tr>
                            <td colspan="4" align="center"><b>Do You Want To Book This Service ?   </b><a href="services.php?id=<?php echo $row['service_id'];?>" class="btn btn-primary"> Book Service</td>
                        </tr>
                    <?php } else { ?>
                    <tr>
                        <td colspan="3"  align="right"><b>Rate</b></td>
                        <td> <h4>Waiting For Doctor Response.. <i class="fa fa-spinner"></i></h4></td>
                    <tr>
                       
                   <?php } ?>
                    
             </tbody>
        </table>
       <?php } } ?>
       </div>
       </div>
       
<?php include('include/footer.php'); ?>