<?php include('include/header.php');  ?>

<script src="../assets/canvasjs.min.js"></script>     
<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Month Wise Report of Estimation </h1>
                <!-- </div> -->
            </div>
			</div>
			<?php  
 $service_id=$_GET['id'];
 ?>
            <!-- End Page Header -->
			<font color="black"><a href="Estimation.php?id=<?php echo $service_id; ?>">Estimation</a> | <a href="rpt_estimation.php?id=<?php echo $service_id; ?>">Estimation Report</a> | <a href="rpt_estimate_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a> | <a href="rpt_estimate_month.php?id=<?php echo $service_id; ?>">Monthly Estimation Report</a></font><br><br>
   
            <div class="row">
                
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

                            

</div>
                            <?php
           $sql="SELECT COUNT('est_id') as Count,MONTHNAME(tbl_estimate.estimate_date) as 'Month Name' from tbl_estimate where tbl_estimate.service_id='$service_id' and rate!='' GROUP BY YEAR(tbl_estimate.estimate_date),MONTH(tbl_estimate.estimate_date)";
           $result=mysqli_query($connect,$sql);
           $app=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($app, $point); 
           }  

		   $sql="SELECT COUNT('est_id') as Count,MONTHNAME(tbl_estimate.estimate_date) as 'Month Name' from tbl_estimate where tbl_estimate.service_id='$service_id'and rate IS NULL GROUP BY YEAR(tbl_estimate.estimate_date),MONTH(tbl_estimate.estimate_date)";
           $result=mysqli_query($connect,$sql);
           $app1=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($app1, $point); 
           }  
?>
                           
<?php include('include/footer.php');  ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Monthly Estimations"
	},	
	axisY: [{
		title: "Total Estimation Request",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	}],
    
    toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries1
	},
	data: [{
		type: "column",
		name: "Total Estimation Response Send",
		legendText: "Total Estimation",
		// showInLegend: true, 
		dataPoints:<?php echo json_encode($app, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "column",
		name: "Total Estimation Response Not Send",
		legendText: "Total Estimation",
		// showInLegend: true, 
		dataPoints:<?php echo json_encode($app1, JSON_NUMERIC_CHECK); ?>
	}
	]
}
);
chart.render();
 
}

function toggleDataSeries1(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

</script>
