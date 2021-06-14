<?php include("include/sidenavbar.php"); ?>
    <br><br>
    <h2 align="center"><b>Estimation Details with Doctor</b></h2><br>
    <table id="sorting-table" class="table mb-0">
        <tbody>
            <tr>
                <td><b>Sr.No</b></td>
                <td><b>Service Name</b></td>
                <td><b>Date</b></td>
                <td></td>
            </tr>
    <?php
 if(isset($_SESSION['user_id']))
  {  
    $i=1;
	$id=$_SESSION['user_id'];
   $sql="select * from tbl_service,tbl_estimate where user_id='$id' and  tbl_service.id=tbl_estimate.service_id ";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
   while($row = $result->fetch_array())
       {
          
           ?>
            <tr>
                <td><?php echo $i; $i++;  ?></td>
                <td> <?php echo $row['service_name']; ?> </td>
                <td> <?php echo $row['estimate_date']; ?></td>
                <td> <a href="readmore.php?token=<?php echo $row['token']; ?>"><i class="fa fa-plus-circle"></i> About More </a></td>
            </tr>
        
       <?php } } ?>

       </tbody>
    </table> 
    </div>
       </div>
       <br><br>
<?php include('include/footer.php'); ?>