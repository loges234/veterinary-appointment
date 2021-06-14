<?php include('include/header.php');  ?>

<script src="../assets/canvasjs.min.js"></script>     
<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Month Wise Report of Appointment </h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
            <?php  
 $service_id=$_GET['id'];?>
            <font color="black"><a href="Appointment.php?id=<?php echo $service_id; ?>">Appointments</a> | <a href="rpt_appoint.php?id=<?php echo $service_id; ?>">Appointment Report</a> | <a href="rpt_appoint_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a>  | <a href="rpt_appoint_month.php?id=<?php echo $service_id; ?>">Monthly Appointment Report</a></font><br><br>
  
            <div class="row">
                
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

                            

</div>
                            <?php
           $sql="SELECT COUNT(*) as Count,MONTHNAME(tbl_appointment.a_date) as 'Month Name' from tbl_appointment,tbl_service where tbl_appointment.status='Approve' and tbl_appointment.service_id='$service_id' and tbl_appointment.service_id=tbl_service.id GROUP BY YEAR(tbl_appointment.a_date),MONTH(tbl_appointment.a_date) ";
           $result=mysqli_query($connect,$sql);
           $app=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($app, $point); 
           }  

           $sql="SELECT COUNT(*) as Count,MONTHNAME(tbl_appointment.a_date) as 'Month Name' from tbl_appointment,tbl_service where tbl_appointment.status='Reject'and tbl_appointment.service_id='$service_id' and tbl_appointment.service_id=tbl_service.id GROUP BY YEAR(tbl_appointment.a_date),MONTH(tbl_appointment.a_date) ";
           $result=mysqli_query($connect,$sql);
           $rej=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($rej, $point); 
           }  

           $sql="SELECT COUNT(*) as Count,MONTHNAME(tbl_appointment.a_date) as 'Month Name' from tbl_appointment,tbl_service where tbl_appointment.status='Waiting' and tbl_appointment.service_id='$service_id' and tbl_appointment.service_id=tbl_service.id GROUP BY YEAR(tbl_appointment.a_date),MONTH(tbl_appointment.a_date) ";
           $result=mysqli_query($connect,$sql);
           $wait=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($wait, $point); 
           }  
?>
                           
<?php include('include/footer.php');  ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Monthly Appointments"
	},	
	axisY: [{
		title: "Total Appointment Request",
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
		name: "Total Approve Appointment",
		legendText: "Total Approve",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($app, JSON_NUMERIC_CHECK); ?>
	},
    {
		type: "column",
		name: "Total Reject Appointment",
		legendText: "Total Reject",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($rej, JSON_NUMERIC_CHECK); ?>
	} ,
    {
		type: "column",
		name: "Total Waiting Appointment",
		legendText: "Total Waiting",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($wait, JSON_NUMERIC_CHECK); ?>
	} ]
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
