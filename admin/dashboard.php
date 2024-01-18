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

    <div class=" d-flex  text-center justify-content-center h-100 align-items-center">

  

     <div class=" bg-light  text-center justify-content-center  p-5  loginBox w-100 m-5">
        <div class="row">
          <button class="btn btn-akhBule mx-5 m-2">Add New Event</button>  
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
                <tr>
                    <td><a href="#" class="btn btn-akhOrange">1</a></td>
                    <td>JAN-16-2024</td>
                    <td>alhasham</td>
                    <td>AKH Electrical Event </td>
                    <td>JAN-31-2024 </td>
                    <td>JAN-31-2024 </td>
                    <td>70</td>
                    <td>65</td>
                </tr>
            </tbody>
       </table>

    </div>
 



    </div>


<script src="../static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="../static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>