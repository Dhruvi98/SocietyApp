<?php 
	require('connection.php');
	
	$id=$_GET['event_id'];
	$query = "DELETE FROM event WHERE event_id = $id "; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: event_notice.php"); 
 ?>