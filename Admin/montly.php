<?php include('include/header.php');  ?>

<script src="../assets/canvasjs.min.js"></script>     
<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Graphical Report of pros, Service Provider & User </h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
         
            <div class="row">
                            <div class="col-xl-12">
                                <p style="color:black">
                                <a href="rpt_user.php"> List Of Users </a> |  Graphical Report
                                </p>
                            </div>
                            
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

                            

</div>
                            <?php
           $sql="SELECT COUNT(tbl_user.user_id) as Count,MONTHNAME(tbl_user.reg_date) as 'Month Name' from tbl_user GROUP BY YEAR(tbl_user.reg_date),MONTH(tbl_user.reg_date)";
           $result=mysqli_query($connect,$sql);
           $user=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($user, $point); 
           }  
           $sql="SELECT COUNT(id) as Count,MONTHNAME(reg_date) as 'Month Name' from tbl_serviceprovider GROUP BY YEAR(reg_date),MONTH(reg_date)";
           $result=mysqli_query($connect,$sql);
           $sp=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($sp, $point); 
           }  
           $sql="SELECT COUNT(pro_id) as Count,MONTHNAME(reg_date) as 'Month Name' from tbl_serviceprovider_pro GROUP BY YEAR(reg_date),MONTH(reg_date)";
           $result=mysqli_query($connect,$sql);
           $pro=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($pro, $point); 
           }  
         //  print_r($booking);
?>
                           
<?php include('include/footer.php');  ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Monthly Registered User"
	},	
	axisY: [{
		title: "Total Registered Users",
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
		name: "Total Registered User",
		legendText: "Total User",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($user, JSON_NUMERIC_CHECK); ?>
	},
    {
		type: "column",
		name: "Total Service Provider",
		legendText: "Total service Provider",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($sp, JSON_NUMERIC_CHECK); ?>
	} ,
    {
		type: "column",
		name: "Total Pro Service Provider",
		legendText: "Total Pro Service Provider",
		showInLegend: true, 
		dataPoints:<?php echo json_encode($pro, JSON_NUMERIC_CHECK); ?>
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
