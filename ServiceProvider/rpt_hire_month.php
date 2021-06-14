<?php include('include/header.php');  ?>

<script src="../assets/canvasjs.min.js"></script>     
<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Month Wise Report of Hired </h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
			<?php  
 $service_id=$_GET['id'];
 ?>
            <font color="black"><a href="Hired.php?id=<?php echo $service_id; ?>">Hired</a> | <a href="rpt_booking.php?id=<?php echo $service_id; ?>">Hired Report</a> | <a href="rpt_hire_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a> | <a href="rpt_hire_month.php?id=<?php echo $service_id; ?>">Monthly Hired Report</a></font><br><br>
   
            <div class="row">
                
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

                            

</div>
                            <?php
           $sql="SELECT COUNT('book_id') as Count,MONTHNAME(tbl_booking.b_date) as 'Month Name' from tbl_booking where tbl_booking.service_id=$service_id GROUP BY YEAR(tbl_booking.b_date),MONTH(tbl_booking.b_date)";
           $result=mysqli_query($connect,$sql);
           $app=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($app, $point); 
           }  

?>
                           
<?php include('include/footer.php');  ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Monthly Hire"
	},	
	axisY: [{
		title: "Total Hired Request",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	}],
    axisX: [{
		title: "Months",
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
		name: "Total Hire",
		dataPoints:<?php echo json_encode($app, JSON_NUMERIC_CHECK); ?>
	}]
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
