<?php include('include/header.php');  ?>
<script src="../assets/canvasjs.min.js"></script>
<div class="content-inner">
    <div class="container-fluid">
    <?php  
 $service_id=$_GET['id'];
 ?>
  <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Graphical Report of Appointment </h1>
                <!-- </div> -->
            </div>
            </div>
    <font color="black"><a href="Appointment.php?id=<?php echo $service_id; ?>">Appointments</a> | <a href="rpt_appoint.php?id=<?php echo $service_id; ?>">Appointment Report</a> | <a href="rpt_appoint_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a>  | <a href="rpt_appoint_month.php?id=<?php echo $service_id; ?>">Monthly Appointment Report</a></font><br><br>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
</div>

<?php
   $service_id=$_GET['id'];
   
    $sql = "SELECT count(*)as approve FROM tbl_appointment,tbl_service where tbl_appointment.status='Approve' and tbl_appointment.service_id=$service_id and tbl_appointment.service_id=tbl_service.id ";
    $result=$connect->query($sql);
    while($row = $result->fetch_array())
    {     
        $approve_count=$row['approve'];
    }

    $sql1 = "SELECT count(*)as reject FROM tbl_appointment,tbl_service where tbl_appointment.status='Reject' and tbl_appointment.service_id=$service_id and tbl_appointment.service_id=tbl_service.id ";
    $result=$connect->query($sql1);
    while($row = $result->fetch_array())
    {     
        $reject_count=$row['reject'];
    }

    $sql2 = "SELECT count(*)as wait FROM tbl_appointment,tbl_service where tbl_appointment.status='Cancel' and tbl_appointment.service_id=$service_id and tbl_appointment.service_id=tbl_service.id ";
    $result=$connect->query($sql2);
    while($row = $result->fetch_array())
    {     
        $wait_count=$row['wait'];
    }
//   echo $sql;
//   echo $sql1;
//   echo $sql2;

    $dataPoints = array(
        array("label"=> "Approve Appointment", "y"=>$approve_count),
        array("label"=> "Reject Appointment", "y"=>$reject_count),
        array("label"=> "Cancel Appointment", "y"=>$wait_count),
    );

    ?>

<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Appointment"
        },
        subtitles: [{
            text: " Approve / Reject / Cancel"
        }],
        data: [{
            type: "pie",
            yValueFormatString: "#,##0.00\"%\"",
            indexLabel: "{label} ({y})",
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    }
</script>
<?php include('include/footer.php');  ?>