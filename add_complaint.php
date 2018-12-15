<?php
  
  include 'connection.php';


    $complaint_details = $_POST['cdetails'];
    $complaint_title = $_POST['ctitle'];
    $complaint_date = $_POST['cdate'];
    $member_id = $_POST['cid'];

    $query = "INSERT into Complaint(complaint_title,complaint_details,complaint_date,member_id)VALUES('$complaint_title','$complaint_details','$complaint_date','$member_id')";

    $res = mysqli_query($con,$query);

  
    if($res)
    {
      ?>
        <script>
            alert('Complaint Sent');
            window.location.href='usr_complaint.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='usr_complaint.php';
        </script>
      <?php 
    }
 
?>