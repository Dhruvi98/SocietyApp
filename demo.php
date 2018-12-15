<?php
    
    include 'connection.php';
    $member_name = "";
    $query = "select * from complaint";

    /*$res = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
      $member_id = $row['member_id'];
      echo $member_id."<br>";*/
      $query1 = "select * from member";
      $res1 = mysqli_query($con,$query1);
      while($row1 = mysqli_fetch_array($res1,MYSQLI_ASSOC))
      {
        echo $row1['name'];
      }


      /*
                         */
?>