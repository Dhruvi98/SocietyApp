<?php
  
  include 'connection.php';


    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];

    $query = "INSERT into event(title,details,date)VALUES('$title','$desc','$date')";

    $res = mysqli_query($con,$query);

  
    if($res)
    {
      ?>
        <script>
            alert('Events had been successfully added.');
            window.location.href='event_notice.php';
        </script>
      <?php 
    }
    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='event_notice.php';
        </script>
      <?php 
    }
 
?>