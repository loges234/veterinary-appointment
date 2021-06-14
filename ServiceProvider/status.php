<?php include('include/header.php');  ?>

<script src="../assets/canvasjs.min.js"></script>     
<div class="content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <!-- <div class="d-flex align-items-center"> -->
                    <h1 align="center">Graphical Report of Profit & Loss </h1>
                <!-- </div> -->
            </div>
            </div>
            <!-- End Page Header -->
         
            <div class="row">                            
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
<?php
        $sql="SELECT sum(TXN_AMOUNT) as Sum,MONTHNAME(date) as 'Month Name'
        FROM tbl_payment WHERE  payment_status='TXN_SUCCESS' and YEAR(date) = YEAR(CURDATE())
        GROUP BY YEAR(date),MONTH(date)";
        $result=mysqli_query($connect,$sql);
        $earning=array();
        $p='';
        while($r=mysqli_fetch_array($result)){
        $sum=$r['Sum'];
        if($sum >$p)
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
                           
<?php include('include/footer.php');  ?>
<script>
window.onload = function () {
    var chart3 = new CanvasJS.Chart("chartContainer", {
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
}


</script>
