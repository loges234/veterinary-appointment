<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Mai Service</title>
	<meta name="GENERATOR" content="Evrsoft First Page">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
	<h1>Check Out Page</h1>
	<h2 align="center">You must pay a advance for the booking this service(Only 1/- rupee )</h2>
	<div class="container">
	<form method="post" action="pgRedirect.php">
		<table border="1" class="table table-hover">
			<tbody>
				<tr>
					<th><center><h4><b>S.No</b></h4></center></th>
					<th><center><h4><b>Label</b></h4></center></th>
					<th><center><h4><b>Value</b></h4></center></th>
				</tr>
				<tr align="center">
					<td>1</td>
					<td><label>ORDER_ID :: *</label></td><input name="Service_id" type="hidden" value="<?php echo $_GET['sid']; ?>">
					<td><input  class="form-control" id="ORDER_ID" tabindex="1" maxlength="20" size="20"name="ORDER_ID" autocomplete="off"value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
					</td>
				</tr>
				<tr align="center">
					<td>2</td>
					<td><label>CUSTID :: *</label></td>
					<td><input class="form-control" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_GET['id']; ?>"readonly></td>
				</tr>
						<input type="hidden"  class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
				
						<input type="hidden" class="form-control" id="CHANNEL_ID" tabindex="4" maxlength="12"size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
					
				<tr align="center">
					<td>5</td>
					<td><label>txnAmount :: *</label></td>
					<td><input  class="form-control" title="TXN_AMOUNT" tabindex="10"	type="text" name="TXN_AMOUNT"value="1" readonly>
					</td>
				</tr>
				<tr align="center">
					<td colspan="3"><input  class="btn btn-primary" name="payment_book"value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>
	</center>
</body>
</html>