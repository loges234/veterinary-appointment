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
                    <h1 align="center">Graphical Report of Estimation </h1>
                <!-- </div> -->
            </div>
            </div>
            <font color="black"><a href="Estimation.php?id=<?php echo $service_id; ?>">Estimation</a> | <a href="rpt_estimation.php?id=<?php echo $service_id; ?>">Estimation Report</a> | <a href="rpt_estimate_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a> | <a href="rpt_estimate_month.php?id=<?php echo $service_id; ?>">Monthly Estimation Report</a></font><br><br>
   
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
</div>

<?php
   $service_id=$_GET['id'];
   
    $sql = "SELECT count(*) as notdone FROM tbl_estimate where service_id=$service_id and rate IS NULL ";
    $result=$connect->query($sql);
    while($row = $result->fetch_array())
    {     
        $notdone_count=$row['notdone'];
    }

    $sql = "SELECT count(*) as done FROM tbl_estimate where service_id=$service_id and rate!='' ";
    $result=$connect->query($sql);
    while($row = $result->fetch_array())
    {     
        $done_count=$row['done'];
    }

    $dataPoints = array(
        array("label"=> "Response Not Send", "y"=>$notdone_count),
        array("label"=> "Response Send", "y"=>$done_count),
    );

    ?>

<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light1",
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Estimation Graphical Report"
        },
        subtitles: [{
            text: " Response Send / Response Not Send"
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