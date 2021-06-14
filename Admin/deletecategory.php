
<?php	
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$id = $_GET['id'];
		if($id=="")
		{
		?>
        <script language="javascript">
 
 			alert('Nothing Selected.');
 
 		</script>
        <?php
		exit;
	}
	else
	{
?>
 
 <script language="javascript">
 
 var delmsg = confirm("Do you confirm to delete service category <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Service Category Deletion Confirmed');
		
		location.href='../controller/delete_db.php?type=category&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Service Category Deletion Cancelled');
		location.href='../Admin/Addservices.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href=' ../Admin/Addservices.php';</script>

<?php
 }
 
?>



