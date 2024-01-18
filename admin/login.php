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

    <div class="container d-flex  text-center justify-content-center h-100 align-items-center">

  
     <div class=" bg-light  text-center justify-content-center  p-5  loginBox">
         <img src="../static/img/AKH Logo only.svg" width="100" class="m-5"/>
         <h3>Control Panel Login</h3>
         
         <?php
         if (isset($_SESSION['message']))
         {
            echo(" 
            <div class='row bg-danger'>
            ".$_SESSION['message']."
            </div>
            ");
         }
          ?>
         
        

         <form class="group-control p-5" action="dashboard.php" method="post">

             <input type="email"  class="form-control mb-2 " placeholder="Email" name="email"/>
             <input type="password" class="form-control mb-2 " placeholder="Password" name="password"/>

             <input type="submit" value="Login" class="btn form-control btn-akhBule"/>
         </form>
     </div>
 



    </div>


<script src="../static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="../static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>