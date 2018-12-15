<?php
  
  include 'connection.php';

  if(isset($_POST['submit'])!="")
  {
    $name = $_POST['name'];
    $house_no = $_POST['hno'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $total_members = $_POST['members'];
    $total_vehicles = $_POST['vehicles'];
    $dob = $_POST['dob'];

    $query = "INSERT into member(name, house_no, email, phone, gender,dob,total_members,total_vehicle,active)VALUES('$name','$house_no','$email', '$phone', '$gender','$dob','$total_members','$total_vehicles','Active')";

    $res = mysqli_query($con,$query);

    if($res)
    {
      ?>
        <script>
            alert('Member had been successfully added.');
            window.location.href='home_members.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='home_members.php';
        </script>
      <?php 
    }
  }
?>