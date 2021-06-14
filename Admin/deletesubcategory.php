
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
 
 var delmsg = confirm("Do you confirm to delete Subcatgory <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Service Provider Deletion Confirmed');
		
		location.href='../controller/delete_db.php?type=subcategory&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Subcatgory Deletion Cancelled');
		location.href='../Admin/addsubcategory.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href=' ../Admin/addsubcategory.php';</script>

<?php
 }
 
?>



