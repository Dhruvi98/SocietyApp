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
            <li>
              <a href="home_members.php">Members</a>
            </li>
            <li class="active">
              <a href="event_notice.php">Events/Notice</a>
            </li>
            <li>
              <a href="vehicle_home.php">Vehicles</a>
            </li>
            <li>
              <a href="admin_complaint.php">Complaints</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Add Event/Notice</button>
                <p align="center"><big><b>List of Events/Notices</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Title</p></th>
                          <th><p align="center">Description</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                        $query = "select * from event";

                        $res = mysqli_query($con,$query);

                        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
                        {
                          ?>
                          <tr>
                          <td><p align="center"><?php echo $row['title']; ?></p></td> 
                          <td><p align="center"><?php echo $row['details']; ?></p></td> 
                          <td><p align="center"><?php echo $row['date']; ?></p></td> 
                           <td align="center">
                            <a class="btn btn-danger" href="delete_event.php?event_id=<?php echo $row['event_id']; ?>">Delete</a>
                            <button type="button" data-toggle="modal" data-target="#updateEvent" class="btn btn-success">Update</button>
                          </td>
                        </tr>
                          <?php
                        }
                      ?>
                      </tbody>
                      
                        <tr class="info">
                          <th><p align="center">Title</p></th>
                          <th><p align="center">Description</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Events/Notice</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="add_events.php" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Title</label>
                  <div class="col-sm-8">
                    <input type="text" name="title" class="form-control" placeholder="title" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Description</label>
                  <div class="col-sm-8">
                    <textarea  name="desc" class="form-control" placeholder="........." required="required"></textarea>
                  </div>
                </div>
                 
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Date</label>
                  <div class="col-sm-8">
                    <input type="date" name="date" class="form-control"  required="required">
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
      <div class="modal fade" id="updateEvent" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Update Events/Notice</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_event.php" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Title</label>
                  <div class="col-sm-8">
                    <input type="text" name="title" class="form-control" placeholder="title" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Description</label>
                  <div class="col-sm-8">
                    <textarea  name="desc" class="form-control" placeholder="........." required="required"></textarea>
                  </div>
                </div>
                 
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Date</label>
                  <div class="col-sm-8">
                    <input type="date" name="date" class="form-control"  required="required">
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