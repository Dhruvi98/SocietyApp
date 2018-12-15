<?php 
	require('connection.php');
	
	$id=$_GET['member_id'];
	$query = "DELETE FROM member WHERE member_id = $id "; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: home_members.php"); 
 ?>