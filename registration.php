<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./static/frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./static/css/site.css"/>
    <link href="./static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">

    <div class=" d-flex  text-center justify-content-center h-100 align-items-center">

  

     <div class=" bg-light  text-center justify-content-center  p-5  loginBox w-100 m-5">
       
        <div class="row justify-content-center">
            <h3>
                <?php 
                if(isset($_GET["id"]))
                {
                    require("auth/connection.php");
                    $sql = "select `id`, `subject`,  `start_date`, `end_date` from event where id ='".$_GET["id"]."'  LIMIT 1;";
                    $result = $conn->query($sql);
                    if($result->num_rows <= 0)
                    {
                        echo("Event Not exist !");
                    }
                    else
                    {
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo("Registration to attend ".$row["subject"]." Start in ".$row["start_date"]." End in ".$row["end_date"].""); 
                    }
                }
                else
                {
                    echo("Registration to attend [-] Start in [-] End in [-]");
                }
                
                ?>
            </h3>
        </div>
         <form method="post" action="">
        <table class="table m-3">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" class="form-control" name="name">
                    </td>
                </tr>

                <tr>
                    <td>Mobile</td>
                    <td>
                        <input type="text" class="form-control" name="mobile">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" class="form-control" name="email">
                    </td>
                </tr>

                <tr>
                    <td>Company</td>
                    <td>
                        <input type="text" class="form-control" name="company">
                    </td>
                </tr>

                <tr>
                    <td>Job Title</td>
                    <td>
                        <input type="text" class="form-control" name="jobtitle">
                    </td>
                </tr>
            </thead>

           
       </table>
       <hr>

       <div class="row justify-content-center">
        <button class="btn btn-akhBule">Register</button>
       </div>
    </form>

    </div>
 



    </div>


<script src="./static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="./static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>