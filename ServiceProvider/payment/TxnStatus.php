<?php

include("../../db_connect.php");

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mai Service</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php  
 $purchase_id=$_GET['id'];
 $order_id=$_GET['oid'];
 ?>
	<h2 align="center">Verify The Payment Of Plan Purchase And Manage It</h2>
	<h3 align="center"><a href="../../Admin/Payment.php?id=<?php echo $purchase_id; ?>" class="btn btn-primary">Manage Account</a> </h3>
	<form method="post" action="">
		<table border="1" align="center">
			<tbody>
				<tr>
					<td style="padding: 5px"><label>&nbsp;&nbsp;ORDER_ID :: * &nbsp;&nbsp;</label></td>
					<td style="padding: 5px"><input  class="form-control" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $order_id ?>" readonly></td>
				</tr>
				
				<tr align="center">
				<br><td colspan="2" style="padding: 5px"><input value="Status Query" class="btn btn-primary" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 		?>
		<div class="container">
			<div class="container-fluid">	<hr>	
		<table style=" border: 1px solid black;  border-collapse: collapse;" align="center">
			<tbody>
				<?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
				<tr >
					<td style="border: 1px solid ;  padding: 2px;" ><label><?php echo $paramName?></label></td>
					<td style="border: 1px solid;    padding: 2px;" ><?php echo $paramValue?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table></div>
		</div>
		<?php
		}
		?>
	</form>
</body>
</html>