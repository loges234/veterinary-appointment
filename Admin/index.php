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
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Dashboard</h2>
	                             </div>
                            </div>
                        </div>
						<!-- End Page Header -->
						<div class="row flex-row">
                            <!-- Begin Widget 16 -->
                            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12" >
                                <div class="widget widget-16 has-shadow" style="background-color:cornflowerblue">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center" >
                                                <div class="counter"><?php echo $user; ?></div>
                                                <div class="total-views" style="color:White"><b>Total Registered User</b></div>
                                            </div>
                                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                                <div class="pages-views">
                                                   <i class="la la-street-view"style="font-size:80px; color:Black" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- End Widget 16 -->
							 <!-- Begin Widget 16 -->
							 <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12" >
                                <div class="widget widget-16 has-shadow" style="background-color:cornflowerblue">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center" >
                                                <div class="counter"> <i class="la la-myr">RM <?php echo $profit.".00"; ?></i></div>
                                                <div class="total-views" style="color:White"><b>Total Profit</b></div>
                                            </div>
                                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                                <div class="pages-views">
                                                   <i class="la la-money"style="font-size:80px; color:Black" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- End Widget 16 -->
						</div>
						<div class="row flex-row">
                            <!-- Begin Widget 16 -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12" >
                                <div class="widget widget-16 has-shadow" style="background-color:bisque">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center" >
                                                <div class="counter"><?php echo $category; ?></div>
                                                <div class="total-views" style="color:black"><b>Total Service Category</b></div>
                                            </div>
                                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                                <div class="pages-views">
                                                   <i class="ti ti-world"style="font-size:80px; color:blue" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 16 -->
                            <!-- Begin Widget 17 -->
     
							<!-- End Widget 17 -->
							 <!-- Begin Widget 17 -->
							 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="widget widget-17 has-shadow" style="background-color: bisque">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-7 d-flex flex-column justify-content-center align-items-center">
                                                <div class="counter"><?php echo $total_sp;?></div>
                                                <div class="total-visitors"style="color:black"><b>Total Service Providers</b></div>
                                            </div>
                                            <div class="col-xl-5 d-flex justify-content-center align-items-center">
                                                <div class="visitors">
												<i class="ti ti-user"style="font-size:80px; color:black" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 17 -->
                        </div>
						<!-- End Row -->	 
						<div class="row">
							<div class="col-md-6">
					
					
</div>
<?php include('include/footer.php');  ?>