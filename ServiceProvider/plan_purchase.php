<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>
<?php include('include/header.php');  ?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <!-- Begin Content -->
 <div class="content-inner ">
                    <div class="container-fluid">
                         <!-- Begin Page Header-->
                         <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
                                <h2 class="page-header-title">Plans Purchase</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
			                                <li class="breadcrumb-item active">Plan Purchase</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                           <!-- Begin Row -->
                           <div class="row">
                            <div class="col-xl-12">
                                <div class="widget has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h2>Plans Purchase</h2>
                                    </div>
                                    <!-- End Widget Header -->
<?php  
 $id= $_SESSION['SP_id'];
$plan_id=$_GET['id'];
 $sql = "SELECT * FROM tbl_plan where id=$plan_id";
            $result=$connect->query($sql);
            while($row = $result->fetch_array())
            {    ?>
                                    <!-- Begin Widget Body -->
                                    <div class="widget-body" style="padding:10px 0;">
                                        <div class="container-fluid">
                                        <form method="post" action="payment/pgRedirect.php">
                                           
                                            <input type="hidden"  class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                                            <input type="hidden" class="form-control" id="CHANNEL_ID" tabindex="4" maxlength="12"size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                                                
                                                    <div class="form-group">
                                                        <label for="text"><b>Plan Name:</b></label>
                                                        <input type="text" name="planname" id="planname" class="form-control input-lg" value="<?php echo $row['name']; ?>" autofocus readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text"><b>Plan Time Period:</b><sup style="font-size:16px;color:red">*</sup></label>
                                                        <select class='form-control' id='period' name='period' onchange="changeFunc();" required>
                                                            <option value="">Select</option>
                                                            <option value="quarter">Quarter</option>
                                                            <option value="six_month">Six Month</option>
                                                            <option value="annual">Annual</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label><b>Plan Amount</b><sup style="font-size:16px;color:red">*</sup></label>
                                                        <input name="quarter_amt"value="<?php echo $row['quarter']; ?>" class="form-control" type="text" style="display: none" id="quarter_amt" readonly>
                                                        <input name="six_amt"value="<?php echo $row['six_month']; ?>" class="form-control" type="text" style="display: none" id="six_amt" readonly>
                                                        <input name="annual_amt"value="<?php echo $row['annual']; ?>"class="form-control" type="text" style="display: none" id="annual_amt" readonly>
                                                     
                                                        <input  class="form-control"type="text" id="amt"value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Order Id</b><sup style="font-size:16px;color:red">*</sup></label>
                                                        <input  class="form-control" id="ORDER_ID" tabindex="1" maxlength="20" size="20"name="ORDER_ID" autocomplete="off"value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>User Id</b><sup style="font-size:16px;color:red">*</sup></label>
                                                        <input class="form-control" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $id; ?>"readonly>
                                                    </div>
                                                   
                                                   <center> <input type="submit" class="btn btn-md btn-primary"  name="btn_plan_purchase" value="Purchase"> </center>
                                            </form>
                                        </div>
                                    </div>
<?php } ?>
                                </div>
                            </div>
                           </div>
                    </div>
 </div>
<?php  include('include/footer.php');  ?>

<script type="text/javascript">
    function changeFunc()
     {
        var selectBox = document.getElementById("period");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        if (selectedValue=="quarter")
        {
            $('#amt').hide();
            $('#quarter_amt').show();
            $('#six_amt').hide();
            $('#annual_amt').hide();
        }
        if (selectedValue=="six_month")
        {
            $('#amt').hide();
            $('#six_amt').show();
            $('#annual_amt').hide();
            $('#quarter_amt').hide();
        }
        if (selectedValue=="annual")
        {
            $('#amt').hide();
            $('#annual_amt').show();
            $('#six_amt').hide();
            $('#quarter_amt').hide();
        }
    }
</script>