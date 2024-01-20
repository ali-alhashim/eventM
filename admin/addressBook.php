<?php require("../auth/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link rel="stylesheet" href="../static/frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../static/css/site.css"/>
    <link href="../static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">


<!--Add New Contact modal--> 
<div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="AddContact.php">


        <div class="row">
            <div class="col">
               Name
            </div>
            <div class="col">
               <input type="text" name="name" class="form-control"/>
            </div>
        </div>

         <hr>
        <div class="row">
            <div class="col">
            Email
            </div>
            <div class="col">
            <input type="email" name="email" class="form-control"/>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col">
            Mobile
            </div>
            <div class="col">
            <input type="text" name="mobile" class="form-control"/>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col">
            Company
            </div>
            <div class="col">
            <input type="text" name="company" class="form-control"/>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col">
            Job Title
            </div>
            <div class="col">
            <input type="text" name="jobTitle" class="form-control"/>
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
    
  

     <div class=" bg-light  text-center justify-content-center  px-5 py-1  loginBox w-100 m-5">
     <div class="row my-2">
      Welcome : <?php echo($_SESSION["name"]); ?>
     </div>
        <div class="row">
          <button class="btn btn-akhBule mx-5 m-2"  data-toggle="modal" data-target="#AddContactModal">Add New Contact</button>  
         
          <a class="btn btn-akhBule mx-5 m-2" href="dashboard.php">Dashboard</a> 
          <form method="GET">
          
            <input type="text" placeholder="Search....." name="Search" />
            <input type="submit" value="search" class="btn btn-akhBule  my-2"/>

          </form>
        </div>

        <table class="table m-3">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Created Date</td>
                    <td>Created By</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Mobile</td>
                    <td>Company</td>
                    <td>Job Title</td>
                </tr>
            </thead>

            <tbody>
                
                <?php 
                  $sql = "select * from `address_book`   order by `id` DESC;";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_array(MYSQLI_ASSOC))
                  {
                    echo("<tr>");
                    echo("<td><a href='#' class='btn btn-akhOrange'>".$row["id"]."</a></td>");
                    echo("<td>".$row["created_date"]."</td>");
                    echo("<td>".$row["created_by"]."</td>");
                    echo("<td>".$row["name"]."</td>");
                    echo("<td>".$row["email"]."</td>");
                    echo("<td>".$row["mobile"]."</td>");
                    echo("<td>".$row["company"]."</td>");
                    echo("<td>".$row["job_title"]."</td>");
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