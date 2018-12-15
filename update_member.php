<?php 

 include 'connection.php';

    $name = $_POST['name'];
    $house_no = $_POST['hno'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $total_members = $_POST['members'];
    $total_vehicles = $_POST['vehicles'];
    $dob = $_POST['dob'];

    $query = "UPDATE member SET name='$name', house_no='$house_no', gender='$gender', email='$email', phone='$phone', total_members='$total_members',total_vehicle = '$total_vehicles' WHERE name='$name'";

    $sql = mysqli_query($con,$query);

  if ($sql)
  {
    ?>
    <script>
      alert('Member successfully updated.');
      window.location.href='home_members.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_members.php';
    </script>
    <?php 
  }
?>