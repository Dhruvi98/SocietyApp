<?php
session_start();
  include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Society Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body background="img.jpg">

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a style="color:white">Society Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b style="color:white"><?php echo $_SESSION['username']; ?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="">Members</a>
            </li>
            <li>
              <a href="usr_complaint.php">Complaints</a>
            </li>
            <li>
              <a href="user_notice_board.php">Notice Board</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
              <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#updateMember" class="btn btn-success">Update Information</button>
             <?php
  include 'connection.php';
  
  $Username = $_SESSION['username'];
  $query = "select * from login ";
  $res = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        $user = $row['Username'];
        if($Username == $user)
        {
            $email = $row['email'];
            $query = "select * from member where email = '$email' ";

        $res = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
        {
           ?>
                  
            <div class="modal-header" style="padding:20px 50px;">
              <center><h1><?php echo $row['name']; ?></h1></center>   
            </div>
            <br>
            <br>
            <table class="table table-bordered table-hover table-condensed" id="myTable">
             
            <tr align="center">
              <td class="info">House No</td>
              <td><?php echo $row['house_no']; ?></td>
            </tr>
             <tr align="center">
              <td class="info">Email ID</td>
              <td><?php echo $row['email']; ?></td>
            </tr>
              <tr align="center">
              <td class="info">Phone No</td>
              <td><?php echo $row['phone']; ?></td>
            </tr>
              <tr align="center">
              <td class="info">Gender</td>
              <td><?php echo $row['gender']; ?></td>
            </tr>
              <tr align="center">
              <td class="info">DOB</td>
              <td><?php echo $row['DOB']; ?></td>
            </tr>
              <tr align="center">
              <td class="info">Total Members</td>
              <td><?php echo $row['total_members']; ?></td>
            </tr>
              <tr align="center">
              <td class="info">Total Vehicles</td>
              <td><?php echo $row['total_vehicle']; ?></td>
            </tr>
              <tr align="center">
              <td class="info">Status</td>
              <td><?php echo $row['active']; ?></td>
            </tr>
            <?php
          }
        }
      }
            ?>
          </table>
            <!-- this modal is for update members -->
      <div class="modal fade" id="updateMember" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Update Member</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_member" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">House No</label>
                  <div class="col-sm-8">
                    <input type="text" name="hno" class="form-control" placeholder="House No" required="required">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Phone No</label>
                  <div class="col-sm-8">
                    <input type="text" name="phone" class="form-control" placeholder="+91....." required="required">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">DOB</label>
                  <div class="col-sm-8">
                    <input type="date" name="dob" class="form-control"  required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Total Members</label>
                  <div class="col-sm-8">
                    <input type="number" name="members" class="form-control"  required="required">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Total Vehicles</label>
                  <div class="col-sm-8">
                    <input type="number" name="vehicles" class="form-control"  required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
           Modal content
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>