<?php

include 'connection.php';
	
	$complaint_id = $_REQUEST['complaint_id'];

	echo $complaint_id;

	$query = "UPDATE complaint SET complaint_status = 'Seen' WHERE complaint_id='$complaint_id'";

    $sql = mysqli_query($con,$query);
     if ($sql)
  {
    ?>
    <script>
      alert('Complaint Seen.');
      window.location.href='admin_complaint.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Complaint not Seen.');
      window.location.href='admin_complaint.php';
    </script>
    <?php 
  }
?>