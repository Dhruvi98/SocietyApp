<?php
  
  include 'connection.php';


    $vehicle_no = $_POST['vno'];
    $vehicle_owner = $_POST['owner'];
    $type = $_POST['type'];
    $member_name = $_POST['mname'];

    $query = "INSERT into vehicle(vehicle_no,vehicle_owner,type,member_name)VALUES('$vehicle_no','$vehicle_owner','$type','$member_name')";

    $res = mysqli_query($con,$query);

  
    if($res)
    {
      ?>
        <script>
            alert('Vehicle had been successfully registered.');
            window.location.href='vehicle_home.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='vehicle_home.php';
        </script>
      <?php 
    }
 
?>