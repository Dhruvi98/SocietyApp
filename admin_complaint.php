<?php
  session_start();
  include 'connection.php';
  include 'add_members.php';
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
            <li>
              <a href="home_members.php">Members</a>
            </li>
            <li>
              <a href="event_notice.php">Events/Notice</a>
            </li>
            <li>
              <a href="vehicle_home.php">Vehicles</a>
            </li>
            <li  class="active">
              <a href="admin_complaint.php">Complaints</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <p align="center"><big><b>List of Complaints</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Members's Name</p></th>
                          <th><p align="center">Title</p></th>
                          <th><p align="center">Details</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                        $member_name = "";

                        $query = "select * from complaint";

                        $res = mysqli_query($con,$query);

                        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                          $member_id = $row['member_id'];
                          $query1 = "select name from member where member_id = '$member_id' ";
                          $res1 = mysqli_query($con,$query1);

                        while($row1 = mysqli_fetch_array($res1,MYSQLI_ASSOC))

                        {
                          ?>
                          <tr>
                          <td><p align="center"><?php echo $row1['name']; ?></p></td> 
                          <td><p align="center"><?php echo $row['complaint_title']; ?></p></td> 
                          <td><p align="center"><?php echo $row['complaint_details']; ?></p></td> 
                          <td><p align="center"><?php echo $row['complaint_date']; ?></p></td> 
                           <td align="center">
                            <a class="btn btn-primary" href="complaint_view.php?complaint_id=<?php echo $row['complaint_id']; ?>">Verify</a>
                          </td>
                        </tr>
                          <?php
                        }
                      }
                      ?>
                        
                      </tbody>
                      
                        <tr class="info">
                         <th><p align="center">Name</p></th>
                          <th><p align="center">House No</p></th>
                          <th><p align="center">Email Id</p></th>
                          <th><p align="center">Phone No</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
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

              <form class="form-horizontal" action="update_member.php" name="form" method="post">
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