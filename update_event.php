<?php 

 include 'connection.php';

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];

    $query = "UPDATE event SET title='$title', details='$desc', date='$date'WHERE title='$title'";

    $sql = mysqli_query($con,$query);

  if ($sql)
  {
    ?>
    <script>
      alert('Event successfully updated.');
      window.location.href='event_notice.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='event_notice.php';
    </script>
    <?php 
  }
?>