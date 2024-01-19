<?php require("../auth/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login C-Panel</title>
    <link rel="stylesheet" href="../static/frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../static/css/site.css"/>
    <link href="../static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">


<!--Add New Event modal--> 
<div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="AddEvent.php">
        <div class="row">
            <div class="col">
               Event Subject
            </div>
            <div class="col">
               <input type="text" name="eventSubject" class="form-control"/>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
               Start Date
            </div>
            <div class="col">
               <input type="date" name="startDate" class="form-control"/>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
            End Date
            </div>
            <div class="col">
            <input type="date" name="endDate" class="form-control"/>
            </div>
        </div>


      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Add" />
      </div>
      </form>
    </div>
  </div>
</div>
<!---->

    <div class=" d-flex  text-center justify-content-center h-100 align-items-center">

  

     <div class=" bg-light  text-center justify-content-center  p-5  loginBox w-100 m-5">
        <div class="row">
          <button class="btn btn-akhBule mx-5 m-2"  data-toggle="modal" data-target="#AddEventModal">Add New Event</button>  
          <button class="btn btn-akhBule mx-5 m-2">Attend guest with QR code</button> 
          <button class="btn btn-akhBule mx-5 m-2">Address Book</button> 
        </div>

        <table class="table m-3">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Created Date</td>
                    <td>Created By</td>
                    <td>Event Subject</td>
                    <td>Start Date</td>
                    <td>End Date</td>
                    <td>Event total Registered</td>
                    <td>Event total Registered Attended</td>
                </tr>
            </thead>

            <tbody>
                
                <?php 
                  $sql = "select * from `event`   order by `id`;";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_array(MYSQLI_ASSOC))
                  {
                    echo("<tr>");
                    echo("<td><a href='#' class='btn btn-akhOrange'>".$row["id"]."</a></td>");
                    echo("<td>".$row["created_date"]."</td>");
                    echo("<td>".$row["created_by"]."</td>");
                    echo("<td>".$row["subject"]."</td>");
                    echo("<td>".$row["start_date"]."</td>");
                    echo("<td>".$row["end_date"]."</td>");
                    echo("<td>".$row["total_registered"]."</td>");
                    echo("<td>".$row["total_attended"]."</td>");
                    echo("</tr>");
                  }
                ?>
            </tbody>
       </table>

    </div>
 



    </div>


<script src="../static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="../static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>