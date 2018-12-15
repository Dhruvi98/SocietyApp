<?php
 	session_start();
	include 'connection.php';

  $flag;

  $user = $_POST['username'];
  $pass = $_POST['pass'];

  $query = "select * from login";
  $res = mysqli_query($con,$query);

  while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
  {
  	if($user == $row['Username'] && $pass == $row['password'])
  	{
  		$flag = 'true';
	}
  }

  if($flag == 'true')
  {
	  	$_SESSION['username'] = $user;
	  	$_SESSION['password'] = $pass;
	  	if($user == "Admin")
	  	{
		?>
        <script>
            alert('Login Done Successfully.');
            window.location.href='home_members.php';
        </script>
     	 <?php 
     	}
     	else
     	{
     		?>
        	<script>
            alert('Login Done Successfully.');
            window.location.href='home_user_members.php';
        	</script>
     	 <?php 
     	}
  }
  else
  {
  	 ?>
        <script>
            alert('Username is not registered.');
            window.location.href='login.php';
        </script>
      <?php 
  }
?>