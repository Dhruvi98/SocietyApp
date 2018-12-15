<?php 

 include 'connection.php';

    $vehicle_no = $_POST['vno'];
    $vehicle_owner = $_POST['owner'];
    $type = $_POST['type'];
    $member_name = $_POST['mname'];

    $query = "UPDATE vehicle SET vehicle_no='$vehicle_no', vehicle_owner='$vehicle_owner', type='$type' , member_name='$member_name' WHERE vehicle_no='$vehicle_no'";

    $sql = mysqli_query($con,$query);

  if ($sql)
  {
    ?>
    <script>
      alert('Vehicle successfully updated.');
      window.location.href='vehicle_home.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='vehicle_home.php';
    </script>
    <?php 
  }
?>