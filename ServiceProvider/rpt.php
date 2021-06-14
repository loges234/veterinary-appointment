<?php include('include/header.php');  ?>
<?php 
if(isset($_SESSION['SP_id']))
{
$pid=$_SESSION['SP_id'];
}
else
{
    $pid=$_SESSION['pro_id'];
} ?>
<script src="../assets/canvasjs.min.js"></script>
<?php

$sql="SELECT count(*) as spnumber FROM `tbl_service`,tbl_appointment WHERE tbl_service.id=tbl_appointment.service_id and tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$appoint=$row['spnumber'];
}



$sql="SELECT count(*) as spnumber FROM `tbl_service`,tbl_booking WHERE tbl_service.id=tbl_booking.service_id and tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$book=$row['spnumber'];
}

$sql="SELECT count(*) as spnumber FROM `tbl_service`,tbl_estimate WHERE tbl_service.id=tbl_estimate.service_id and tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$estimation=$row['spnumber'];
}


$sql="SELECT sum(TXN_AMOUNT) as Sum,MONTHNAME(date) as 'Month Name'
FROM tbl_payment,tbl_service WHERE  tbl_payment.payment_status='TXN_SUCCESS' and YEAR(date) = YEAR(CURDATE()) and
tbl_service.id=tbl_payment.Service_id and tbl_service.sp_id=$pid
GROUP BY YEAR(date),MONTH(date)";
$result=mysqli_query($connect,$sql);
$earning=array();
$p='';
while($r=mysqli_fetch_array($result)){
$sum=$r['Sum'];
if($sum >=$p)
{
$point = array("label" => $r['Month Name'] , "y" => $sum,"indexLabel"=>"gain","markerType"=> "triangle", "markerColor" => "#6B8E23");
array_push($earning, $point); 
}
else{
    $point = array("label" => $r['Month Name'] , "y" => $r['Sum'],"indexLabel"=>"loss","markerType"=> "cross", "markerColor" => "tomato");
    array_push($earning, $point); 
}  
$p=$sum;                           
}   

?>
   <?php
  $sql="SELECT COUNT(*) as Count,MONTHNAME(tbl_appointment.a_date) as 'Month Name' from tbl_appointment,tbl_service where tbl_service.sp_id=$pid and tbl_service.id=tbl_appointment.service_id GROUP BY YEAR(tbl_appointment.a_date),MONTH(tbl_appointment.a_date)";
           $result=mysqli_query($connect,$sql);
           $app=array();
           while($r=mysqli_fetch_array($result))
           {
               $count=$r['Count'];
               $month=$r['Month Name'];
               $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
               array_push($app, $point); 
           }  

$sql="SELECT COUNT(*) as Count,MONTHNAME(tbl_estimate.estimate_date) as 'Month Name' from tbl_estimate,tbl_service where tbl_service.sp_id=$pid and tbl_service.id=tbl_estimate.service_id GROUP BY YEAR(tbl_estimate.estimate_date),MONTH(tbl_estimate.estimate_date)";
$result=mysqli_query($connect,$sql);
$est=array();
while($r=mysqli_fetch_array($result))
{
    $count=$r['Count'];
    $month=$r['Month Name'];
    $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
    array_push($est, $point); 
}  


$sql="SELECT COUNT(*) as Count,MONTHNAME(tbl_booking.b_date) as 'Month Name' from tbl_booking,tbl_service where tbl_service.sp_id=$pid and tbl_service.id=tbl_booking.service_id GROUP BY YEAR(tbl_booking.b_date),MONTH(tbl_booking.b_date)";
$result=mysqli_query($connect,$sql);
$book1=array();
while($r=mysqli_fetch_array($result))
{
    $count=$r['Count'];
    $month=$r['Month Name'];
    $point = array("label" => $r['Month Name'] , "y" => $r['Count']);
    array_push($book1, $point); 
}  
// print_r($est);
        ?>
                        <?php
							$dataPoints = array(
								array("label"=> "Appointment", "y"=>$appoint),
                                array("label"=> "Booking", "y"=>$book),
                                array("label"=> "Estimation", "y"=>$estimation),
							);
						?>

<div class="content-inner">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
              <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="col-md-6">
            <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
        </div>
    </div><br><br>
    <div class="row">
        <div class="col-md-6">
              <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="col-md-6">
            <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
        </div>
    </div><br><br>
    <div class="row">
              <div id="chartContainer4" style="height: 400px; width: 100%;"></div>
        </div>
    </div>
</div>
<?php include('include/footer.php');  ?>                 
    <script>
    window.onload = function () 
    {						
        var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        animationEnabled: true,
                        title:{
                            text: "Over All User Requests"   
                        },
                        axisX: {
                            interval: 1,
                            title: "Requests",   
                            intervalType: "month",
                            valueFormatString: "MMM"
                        },
                        axisY:{
                            title: "Total Count (User)",        
                            includeZero: false
                        },
                        data: [{        
                            type: "line",
                            markerSize: 12,
                            // xValueFormatString: "MMM, YYYY",
                            // yValueFormatString: "$###.#",
                            dataPoints:  <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();


                        var chart3 = new CanvasJS.Chart("chartContainer1", {
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        animationEnabled: true,
                        title:{
                            text: "Monthly Earning"   
                        },
                        axisX: {
                            interval: 1,
                            title: "Months",   
                            intervalType: "month",
                            valueFormatString: "MMM"
                        },
                        axisY:{
                            title: "Price (in Rupees)",        
                            includeZero: false
                        },
                        data: [{        
                            type: "line",
                            markerSize: 12,
                            // xValueFormatString: "MMM, YYYY",
                            // yValueFormatString: "$###.#",
                            dataPoints:  <?php echo json_encode($earning, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart3.render();


                    var chart2 = new CanvasJS.Chart("chartContainer2", {
                    animationEnabled: true,
                    title:{
                        text: "Monthly Appointments For Your Services"
                    },	
                    axisY: [{
                        title: "Total Appintment Request",
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
                        itemclick: toggleDataSeries2
                    },
                    data: [{
                        
                        type: "column",
                        name: "Total Approve Appointment",
                        dataPoints:<?php echo json_encode($app, JSON_NUMERIC_CHECK); ?>
                    }]
                }
                );
                chart2.render();

                
                var chart4 = new CanvasJS.Chart("chartContainer3", {
                    animationEnabled: true,
                    title:{
                        text: "Monthly Estimation For Your Services"
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
                        itemclick: toggleDataSeries3
                    },
                    data: [{
                        type: "column",
                        name: "Total Estimation Request",
                        dataPoints:<?php echo json_encode($est, JSON_NUMERIC_CHECK); ?>
                    }]
                }
                );
                chart4.render();

                var chart5 = new CanvasJS.Chart("chartContainer4", {
                    animationEnabled: true,
                    title:{
                        text: "Monthly Booking For Your Services"
                    },	
                    axisY: [{
                        title: "Total Booking Request",
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
                        itemclick: toggleDataSeries4
                    },
                    data: [{
                        type: "column",
                        name: "Total Booking Request",
                        dataPoints:<?php echo json_encode($book1, JSON_NUMERIC_CHECK); ?>
                    }]
                }
                );
                chart5.render();
    }

                                        
                function toggleDataSeries2(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart2.render();
                }

                function toggleDataSeries3(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart4.render();
                }

                function toggleDataSeries4(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart5.render();
                }

						</script>

  