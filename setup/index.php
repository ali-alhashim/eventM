


<?php
// test connection 

if(isset($_POST["serverName"]))
{

  $serverAddress = $_POST["serverName"];
  $username = $_POST["userName"];
  $password = $_POST["password"];
  $database = $_POST["database"];
  $port = $_POST["port"];
  try
     {

        $conn= new mysqli($serverAddress, $username, $password, $database, $port);

       
        echo("OK");


        
      
        exit;
      }
     catch(mysqli_sql_exception $e)
    {
   
      echo($e);

      
       exit;

    }

}//end if

?>





<!DOCTYPE html>
<html lang="en">
     <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Page</title>
    <link rel="stylesheet" href="../static/frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../static/css/site.css"/>
    <link href="../static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">
  <br/>

  <?php

if(file_exists('../auth/key.php'))
{
   include('../auth/key.php');
}
else
{
  // no key file this first time setup

  $serverAddress ="127.0.0.1";
  $username ="root";
  $password ="";
  $database ="eventm";
  $port ="3306";

}

  ?>


 <form action="install.php" method="post" enctype="multipart/form-data"> 
   <!--Work Space-->

   <div class="container bg-light" id="WorkSpace">
       <br/>
      -
       <br/>
       <hr>
       <h2>Setup Event Management for First Time</h2>
       
       <hr>
    <br/>
    
       <h3 class="text-left">Database [Mysql]</h3>
       <br/>
       
       <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Server Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0">
            <input type="text" value="<?=$serverAddress?>"   class="form-control" required id="serverAddress" name="serverAddress"/>
          </p>
        </div>
      </div>
      <hr>
      <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Database Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0">
            <input type="text" value="<?=$database?>"   class="form-control" required id="databaseName" name="databaseName"/>
          </p>
        </div>
      </div>
      <hr>
      <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">User Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0">
            <input type="text" value="<?=$username?>"  class="form-control" required id="userName" name="username"/>
          </p>
        </div>
      </div>
      <hr>
      <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Password</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="password" class="form-control" id="password" name="password" value="<?=$password?>"/></p>
        </div>
      </div>
      <hr>

      <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Port</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="number" value="<?=$port?>" class="form-control" id="port" name="port"/></p>
        </div>
      </div>
      <hr>


      <div class="row text-center p-3">
          <p class=" btn btn-akhBule " onclick="TestConnectionFunction()">Test Connection </p >
          
           <div  id="testResult" class="alert  alert-info" role="alert"></div>
          
        </div>



       <hr class="bg-dark">

       

      <hr class="bg-dark">


       <h3 class="text-left">System Admin user</h3>
       <br/>


       <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" class="form-control"   name="name" value="Ali Musa Omer Alhashim"/></p>
        </div>
      </div>
      <hr>


       <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Email</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="email" class="form-control" required value="ali-alhashim@outlook.com" name="email"/></p>
        </div>
      </div>
      <hr>


      <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Password</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="password" class="form-control" required value="admin" name="userpassword"/></p>
        </div>
      </div>

       <hr>


       
      <div class="row text-left">
        <div class="col-sm-3">
          <p class="mb-0">Confirm Password</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="password" class="form-control" required value="admin" name="userpassword2"/></p>
        </div>
      </div>

       <hr>


      
     

       <hr>


       <input type="submit" class="btn form-control btn-akhBule " value="INSTALL"/>
<br/>
<hr>

</form>

    </div>
<!--Work Space-->
<p class="text-center">
  Created By Ali Alhashim - IT-Dammmam
</p>


<script src="../static/frameworks/jquery/dist/jquery.min.js"></script>
<script src="../static/frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>



<script>
    function TestConnectionFunction() {
    
    const serverName = document.getElementById("serverAddress").value;
    const database = document.getElementById("databaseName").value;
    const userName = document.getElementById("userName").value;
    const password = document.getElementById("password").value;
    const port = document.getElementById("port").value;

    $.ajax({
            type : "POST",  //type of method
            url  : "index.php",  //your page
            data : { serverName : serverName,
                       database : database,
                       userName : userName,
                       password : password,
                       port : port 
                    },// passing the values
            success: function(res){  
                                    //do what you want here...
                             
                            
                            $("#testResult").text(res);
                    }
        });
    }
    </script>



</body>
</html>