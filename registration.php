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
                   // Sanitize the input
                    $id = $_GET["id"];
                    $id = $conn->real_escape_string($id); // Escaping special characters
                    $id = intval($id); // Converting to integer
                    
                    // Prepare the statement
                    $stmt = $conn->prepare("SELECT `id`, `subject`, `start_date`,`start_time`, `end_date`,`end_time` FROM event WHERE id = ? LIMIT 1;");
                    $stmt->bind_param("i", $id); // Bind the sanitized value
                    
                    // Execute the statement
                    $stmt->execute();
                    
                    // Fetch the result
                    $result = $stmt->get_result();
                    if($result->num_rows <= 0)
                    {
                        echo("Event Not exist !");
                    }
                    else
                    {
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo("Registration to attend ".$row["subject"]." Start in ".$row["start_date"]."<sup>".$row["start_time"]."</sup>"." End in ".$row["end_date"]."<sup>".$row["end_time"]."</sup>"); 
                    }

                       // Close the statement and connection
                        $stmt->close();
                        $conn->close();
                }
                else
                {
                    echo("Registration to attend [-] Start in [-] End in [-]");
                }
                
                ?>
            </h3>
        </div>
        <form method="post" action="addRegister.php">
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

       <?php
       if(isset($_GET["id"]))
       {
       echo("<input type='hidden' name='eventId' value='$id'>");
       }
       ?>
    </form>

    </div>
 



    </div>


<script src="./static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="./static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>