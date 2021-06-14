<?php include('include/header.php');  ?>
<script src="../assets/canvasjs.min.js"></script>
<div class="content-inner">
    <div class="container-fluid">
   
  <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Graphical Report of Hired </h1>
                <!-- </div> -->
            </div>
            </div>
            <?php  
 $service_id=$_GET['id'];
 ?>
            <font color="black"><a href="Hired.php?id=<?php echo $service_id; ?>">Hired</a> | <a href="rpt_booking.php?id=<?php echo $service_id; ?>">Hired Report</a> | <a href="rpt_hire_graphical.php?id=<?php echo $service_id; ?>">Graphical Report</a> | <a href="rpt_hire_month.php?id=<?php echo $service_id; ?>">Monthly Hired Report</a></font><br><br>
   
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
</div>

<?php
   $service_id=$_GET['id'];
   
    $sql1 = "SELECT count(*) as confirm FROM tbl_booking,tbl_payment where tbl_booking.service_id=$service_id and tbl_booking.book_id=tbl_payment.book_id  and tbl_payment.booking_status='Confirm'  ";
    $result=$connect->query($sql1);
    while($row = $result->fetch_array())
    {     
        $confirm=$row['confirm'];
    }

    $sql2 = "SELECT count(*) as cancle FROM tbl_booking,tbl_payment where tbl_booking.service_id=$service_id and tbl_booking.book_id=tbl_payment.book_id  and tbl_payment.booking_status='Cancel' ";
    $result=$connect->query($sql2);
    while($row = $result->fetch_array())
    {     
        $cancle=$row['cancle'];
    }
//   echo $sql;
//   echo $sql1;
//   echo $sql2;

    $dataPoints = array(
        array("label"=> "Confirm Booking", "y"=>$confirm),
        array("label"=> "Cancel Booking", "y"=>$cancle),
    );

    ?>

<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Hired"
        },
        subtitles: [{
            text: "Confirm/ Cancel "
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