<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require_once("../../db_connect.php");
$paytmChecksum = "";
$paramList = array();

$paramList = $_POST;
$isValidChecksum = "FALSE";
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

if($isValidChecksum == "TRUE")
 {
 
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
			$id=  $_SESSION['SP_id'];
			$user="select contact from tbl_serviceprovider where id='$id'";
			$r=mysqli_query($connect,$user);
			while($row=mysqli_fetch_array($r)){
				$mobile=$row['contact'];
            }
            // $payment_mode='$_POST[PAYMENTMODE]';
			// $trans_id='$_POST[TXNID]';
			// $date='$_POST[TXNDATE]' ;

			$sql="update tbl_plan_purchase set plan_status='Activate',payment='$_POST[STATUS]'where ORDER_ID='$_POST[ORDERID]' ";
			if(mysqli_query($connect,$sql))
			{
				echo "<script>alert('Successfully Plan Purchase!!!')</script>";
				echo "<script>alert('Transaction Successfully!!!')</script>"; 
				echo "<script>window.location.href='../plan_status.php';</script>"; 
			}
			else{
			echo "Error:".$connect->error;
			}
		//echo "<b>Transaction status is success</b>" . "<br/>";
	}
	else {
		$sql="update tbl_plan_purchase set plan_status='Deactivate',payment='$_POST[STATUS]' where ORDER_ID='$_POST[ORDERID]' ";
		//echo $sql;
		if(mysqli_query($connect,$sql))
		{
			echo "<script>alert('Transaction Failed !!')</script>";
			echo "<script>window.location.href='../plans.php';</script>"; 
		}
		else{
		echo "Error:".$connect->error;
		}
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>