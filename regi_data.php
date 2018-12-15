<?php

  include 'connection.php';

  $flag;

  $email = $_POST['email'];
  $user = $_POST['username'];
  $pass = $_POST['pass'];

  $query = "select * from member";
  $res = mysqli_query($con,$query);

  while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
  {
  	if($email == $row['email'])
  	{
  		$flag = 'true';
	}
  }

  if ($flag == 'true')
  {
  	$query1 = "INSERT into login(Username,password,email)VALUES('$user','$pass','$email')";

    $res1 = mysqli_query($con,$query1);

  
    if($res1)
    {
      ?>
        <script>
            alert('Registration Done.');
            window.location.href='home_user_members.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='registration.php';
        </script>
      <?php 
    }
  }
?>