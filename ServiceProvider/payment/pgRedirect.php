<?php



header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

include("../../db_connect.php");

$checkSum = "";
$paramList = array();

//Payment of Plan Purchase
if(isset($_POST['btn_plan_purchase']))
{

   $sp_id= $_SESSION['SP_id'];
   $planname= mysqli_real_escape_string($connect,$_POST['planname']); 
   $period=mysqli_real_escape_string($connect,$_POST['period']); 
   $ORDER_ID= mysqli_real_escape_string($connect,$_POST['ORDER_ID']);
   
   $sql = "select * from tbl_plan where name='$planname'";
   $result=$connect->query($sql);
   while($row = $result->fetch_array())
   {
	   if($period=='quarter'){	   $period_rs=$row['quarter'] ; }
	   if($period=='six_month'){	   $period_rs=$row['six_month'] ; }
	   if($period=='annual'){	   $period_rs=$row['annual'] ; }

	   $plan_id=$row['id'];
   }
//  echo $sql;
//  echo $period_rs;

$sql = "select * from tbl_serviceprovider where id='$sp_id'";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{
	$EMAIL=$row['email'];
	$MOBILE=$row['contact'];
}
$start_date=date('Y-m-d');
if($period=='quarter')
{	
		$date = new DateTime('now');
		$date->modify('+3 month'); 
		$end_date = $date->format('Y-m-d');
}
if($period=='six_month')
{	
		$date = new DateTime('now');
		$date->modify('+6 month'); 
		$end_date = $date->format('Y-m-d');
}
if($period=='annual')
{	
		$date = new DateTime('now');
		$date->modify('+12 month'); 
		$end_date = $date->format('Y-m-d');
}

	$sql1="insert into tbl_plan_purchase(sp_id,plan_id,period,order_id,amount,start_date,end_date) 
		values('$sp_id','$plan_id','$period','$ORDER_ID','$period_rs','$start_date','$end_date')";
	$result=mysqli_query($connect,$sql1);
	if($result==true)
	{
		 echo"<script> alert('Wait for response')</script>";
	 
	}
	else{
		echo "Error:".$connect->error;
	}
}


$ORDER_ID = $ORDER_ID;
$CUST_ID = $sp_id;
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $period_rs;

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "http://localhost/mai-service/serviceprovider/payment/pgResponse.php";
$paramList["MSISDN"] = $MOBILE; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //
//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
//echo $checkSum;

?>
<html>
<head>
<title>MaiService</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>