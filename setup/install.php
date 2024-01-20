

<!DOCTYPE html>
<html lang="en">
     <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install</title>
    <link rel="stylesheet" href="../static/frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../static/css/site.css"/>
    <link href="../static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">

    <div class="container d-flex  text-center justify-content-center  align-items-center">

  
     <div class=" bg-light  text-center justify-content-center  p-5 loginBox">


     <?php 

   // Create Database 
    $mysqli = new mysqli($_POST['serverAddress'], $_POST['username'], $_POST['password']);

    if ($mysqli->query("CREATE DATABASE IF NOT EXISTS ".$_POST["databaseName"] .";")) {
        printf("Database ".$_POST["databaseName"]." created successfully.<hr>");


      


          // create auth/key.php 
          
          $myfile = fopen("../auth/key.php", "w");
          fwrite($myfile,"<?php \n");
          fwrite($myfile,"\$serverAddress =\"".$_POST['serverAddress']."\";\n");
          fwrite($myfile,"\$username =\"".$_POST['username']."\";\n");
          fwrite($myfile,"\$password =\"".$_POST['password']."\";\n");
          fwrite($myfile,"\$database =\"".$_POST['databaseName']."\";\n");
          fwrite($myfile,"\$port =\"".$_POST['port']."\";\n");
         
          fwrite($myfile,"?>");
          fclose($myfile);
       

     }






     ?>


    <!----------import the files ------>
    <?php require("../auth/connection.php"); ?>


         
    <!------------- Create users table ------------>
     <?php require("database/users.php"); ?>

     <!-- Create log Table ---->
     <?php require("database/log.php"); ?>

       <!-- Create event Table ---->
       <?php require("database/event.php"); ?>

        <!-- Create address_book Table ---->
        <?php require("database/address_book.php"); ?>
      
    
                     


       <!----------------Back Button-------------------->
       <hr>
       <a class="btn btn-akhBule" href="../admin/login.php">Login</a>
       <hr>
     </div>
    </div>


<script src="../static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="../static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>