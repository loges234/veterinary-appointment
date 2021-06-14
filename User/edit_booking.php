<?php include("include/sidenavbar.php"); ?>
    <br><br>
    <h2 align="center"><b>Cancle Booking</b></h2><hr>
    <h3 align="center"><font color="red">Note :</font> I’m very sorry, but we can't able to return your advance payment.</h3><hr><br>
    <?php
    $app_id=$_GET['id'];
           ?>
    <form role="form" method="post" action="../controller/edit_db.php?id=<?php echo $app_id; ?>">  
    <table id="sorting-table" class="table mb-0">
        <tbody>
            <tr>
                <td><b>Sr.No</b></td>
                <td><b>Service Name</b></td>
                <td><b>Booking Date</b></td>
                <!-- <td><b>Requirement</b></td> -->
                <!-- <td><b>issue</b></td> -->
                <td><b>Amount</b></td>
                <td><b>Booking Status</b></td>
                <td><b>Cancle Booking</b></td>
            </tr>
    <?php
 if(isset($_SESSION['user_id']))
  {  
    $i=1;
	$id=$_SESSION['user_id'];
   $sql="select * from tbl_service,tbl_booking,tbl_payment where user_id='$id' and  tbl_service.id=tbl_booking.service_id and tbl_booking.book_id=tbl_payment.book_id and tbl_payment.book_id='$app_id'";
   $result=$connect->query($sql);
   $row=mysqli_num_rows($result);
   while($row = $result->fetch_array())
       {
          
           ?>
            <tr>
                <td><?php echo $i; $i++;  ?></td>
                <td> <?php echo $row['service_name']; ?> </td>
                <td> <?php echo $row['b_date']; ?></td>
                <!-- <td> <?php //echo $row['requirement']; ?></td> -->
                
                   <td><font color="blue"> <?php echo $row['TXN_AMOUNT']; ?></font></td>
              
                   <td>
                    <select id="" name="" class="form-control" required>
                        <option value=""></option>
                        <option value="Cancel">Cancel</option>
                    </select>
                </td><input type="hidden"name="book_id" value="<?php echo $app_id; ?>">
                <td align="center">
                    <input type="submit" name="booking_cancle" value="Update" class="btn btn-primary">
                </td>
            </tr>
        
       <?php } } ?>

       </tbody>
    </table> 
    </div>
       </div>
       <br><br>
<?php include('include/footer.php'); ?>