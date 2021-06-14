<?php include('include/header.php');  ?>
<?php 
if(isset($_SESSION['SP_id']))
{   $pid=$_SESSION['SP_id'];  }
else{
    $pid=$_SESSION['pro_id']; 
}
 ?>
<script src="../assets/canvasjs.min.js"></script>
<?php

$sql="SELECT count(*) as spnumber FROM `tbl_service` WHERE tbl_service.sp_id=$pid";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$service_count=$row['spnumber'];
}

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

$sql="SELECT *,tbl_plan.name as pname FROM `tbl_plan_purchase`,tbl_plan WHERE tbl_plan_purchase.sp_id=$pid and tbl_plan_purchase.plan_status='Activate' and tbl_plan_purchase.plan_id=tbl_plan.id";
$result=$connect->query($sql);
$count=mysqli_num_rows($result);
if($count!=0)
{
while($row = $result->fetch_array())
{     
    $pname=$row['pname'];
    $period=$row['period'];
    $sdate=$row['start_date'];
    $edate=$row['end_date'];
}
}
else
{
    $pname='No Any Plan Purchase';
    $period='';
    $sdate='';
    $edate='';
}

$sql="SELECT sum(TXN_AMOUNT)as amount FROM `tbl_service`,tbl_payment WHERE tbl_service.id=tbl_payment.service_id and tbl_service.sp_id=$pid and tbl_payment.payment_status='TXN_SUCCESS'";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$profit=$row['amount'];
}

$sql="SELECT count(*)as spnumber FROM `tbl_service`,tbl_booking,tbl_payment WHERE tbl_service.id=tbl_booking.service_id and tbl_payment.book_id=tbl_booking.book_id and tbl_service.sp_id=$pid and tbl_payment.booking_status='Confirm'";
$result=$connect->query($sql);
while($row = $result->fetch_array())
{     
$hire=$row['spnumber'];
}

?>
<div class="content-inner">
    <div class="container-fluid">
    <div class="row flex-row">
                            <!-- Begin Widget 16 -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                                <div class="widget widget-16 has-shadow" style="background-color:cornflowerblue">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center" >
                                                <div class="total-views" style="color:White"><font size="8"><b>Plan Details</b></font></div>
                                                <h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u></u></b><br>

                                                <b>Start Date :</b> <?php echo $sdate; ?><br>
                                                <b>End Date :</b> <?php echo $edate; ?>  </font> </h2>                                  
                                            </div>
                                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                                <div class="pages-views">
                                                   <i class="la la-ticket"style="font-size:80px; color:Black" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- End Widget 16 -->
							 <!-- Begin Widget 16 -->
							 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                                <div class="widget widget-16 has-shadow" style="background-color:cornflowerblue">
                                    <div class="widget-body">
                                    <div class="row">
                                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center" >
                                                <div class="total-views" style="color:White"><b>Hire On Veterinary Appointment</b></div>    
                                                <div class="counter"> <i class="ion ion-person-stalker">
                                                <?php echo $hire;  ?>
                                                </i></div>
                                            </div>
                                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                                <div class="pages-views">
                                                   <i class="ion ion-bag"style="font-size:80px; color:Black" ></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center" >
                                                <div class="total-views" style="color:White"><b>Total Profit - <a href="status.php" style="color:Pink">Month Wise Here</a></b></div>    
                                                <div class="counter">RM<i class="la la-myr">
                                                <?php    if(isset($profit))
                                                             echo $profit.".00"; 
                                                         else
                                                            echo "0.00";
                                                       ?>
                                                </i></div>
                                            </div>
                                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                                <div class="pages-views"><br>
                                                   <i class="la la-money"style="font-size:80px; color:Black" ></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
							<!-- End Widget 16 -->
						</div>
                        <!-- End Row -->
                        <?php
							$dataPoints = array(
								array("label"=> "Appointment", "y"=>$appoint),
                                array("label"=> "Booking", "y"=>$book),
                                array("label"=> "Estimation", "y"=>$estimation),
							);
						?>
                        <div class="row">
						    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                        
						<script>
						window.onload = function () 
                        {						
						var chart = new CanvasJS.Chart("chartContainer", {
							theme: "light2",
							animationEnabled: true,
							exportEnabled: true,
							title:{
								text: "User Response"
							},
							subtitles: [{
								text: "Appointment / Booking / Estimation"
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

    </div>
</div>
<?php include('include/footer.php');  ?>