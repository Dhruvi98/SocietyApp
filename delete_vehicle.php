<?php 
	require('connection.php');
	
	$id=$_GET['vehicle_id'];
	$query = "DELETE FROM vehicle WHERE vehicle_id = $id "; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: vehicle_home.php"); 
 ?>