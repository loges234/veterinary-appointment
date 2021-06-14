<?php include('include/header.php');  ?>
<script src="../assets/canvasjs.min.js"></script>
<?php

$pie="select count(*) as count from tbl_serviceprovider";
$result=$connect->query($pie);
while($row = $result->fetch_array())
{     
$sp=$row['count'];
}
$pie="select count(*) as count from tbl_serviceprovider_pro";
$result=$connect->query($pie);
while($row = $result->fetch_array())
{     
$pro=$row['count'];
}
$total_sp=$sp+$pro;
$pie="select count(*) as count from tbl_user";
$result=$connect->query($pie);
while($row = $result->fetch_array())
{     
$user=$row['count'];
}
$pie="select count(*) as count from tbl_plan";
$result=$connect->query($pie);
while($row = $result->fetch_array())
{     
$plan=$row['count'];
}
$pie="select count(*) as count from tbl_category";
$result=$connect->query($pie);
while($row = $result->fetch_array())
{     
$category=$row['count'];
}

	
$servicep="SELECT count(*) as spnumber FROM tbl_plan_purchase where plan_status='Activate' order by purchase_id";
$result=$connect->query($servicep);
while($row = $result->fetch_array())
{     
$activesp=$row['spnumber'];
}


$servicereg="SELECT count(*) as reg FROM tbl_serviceprovider";
$result=$connect->query($servicereg);
while($row = $result->fetch_array())
{     
$regsp=$row['reg'];
}


$proactive="SELECT count(*) as pro FROM tbl_serviceprovider_pro where status='Active'";
$result=$connect->query($proactive);
while($row = $result->fetch_array())
{     
$pro=$row['pro'];
}

$proactive="SELECT count(*)as de_pro FROM tbl_serviceprovider_pro where status='Deactive'";
$result=$connect->query($proactive);
while($row = $result->fetch_array())
{     
$de_pro=$row['de_pro'];
}


$planpurchase="SELECT count(*)as number FROM `tbl_plan_purchase` WHERE plan_id='1' and plan_status='Activate'";
$result=$connect->query($planpurchase);
while($row = $result->fetch_array())
{     
$plan1=$row['number'];
}
$planpurchase="SELECT count(*)as number FROM `tbl_plan_purchase` WHERE plan_id='2' and plan_status='Activate'";
$result=$connect->query($planpurchase);
while($row = $result->fetch_array())
{     
$plan2=$row['number'];
}
$planpurchase="SELECT count(*)as number FROM `tbl_plan_purchase` WHERE plan_id='3' and plan_status='Activate'";
$result=$connect->query($planpurchase);
while($row = $result->fetch_array())
{     
$plan3=$row['number'];
}

$sum="SELECT sum(amount)as amount FROM `tbl_plan_purchase` ";
$result=$connect->query($sum);
while($row = $result->fetch_array())
{     
$profit=$row['amount'];
}
?>

<div class="content-inner">
                    <div class="container-fluid">
                   			
							<?php
							$dataPoints3 = array(
								array("label"=> "Starter", "y"=>$plan1),
								array("label"=> "Basic", "y"=>$plan2),
								array("label"=> "Premium", "y"=>$plan3),
							);
							?>
						<script>
						window.onload = function () {
					
						var chart3 = new CanvasJS.Chart("chartContainer3", {
							theme: "light2",
						animationEnabled: true,
						title:{
								text: "Plan Purchase"
							},
							subtitles: [{
								text: "Count of Service Provider"
							}],
						data: [{
							type: "pyramid",
							indexLabel: "{label} - {y}",
							yValueFormatString: "#,##0",
							showInLegend: true,
							legendText: "{label} : {y}",
							dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
						}]
					});
					chart3.render();

						}
						</script>
						<div clas="row">
							<div id="chartContainer3" style="height: 500px; width: 100%;"></div>
						</div>
					</div>
					
</div>
<?php include('include/footer.php');  ?>