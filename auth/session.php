<?php
session_start();
//ob_start();

require("connection.php");


if(!isset($_SESSION["session"]))
{
// set session after verify user Credential 



$sql = "select `id`, `email`,  `name`, `password` from users where email ='".$_POST["email"]."'  LIMIT 1;";

$result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

if ( password_verify( $_POST["password"] , $row["password"]) )
{
    // 'Password is valid!';
    $_SESSION["name"] = $row["name"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["email"] = $row["email"];
    
    $_SESSION["session"] = "valid";
    


     // add action to log table

     $sql = "insert into `log`( `name`,  `email`, `action`) values('".$_SESSION["name"]."', '".$_SESSION["email"]."','User Login');";
     $conn->query($sql);

   // end adding action


} 
else {

       // 'Invalid password.';
      //back to login
      header("Location: login.php");
}

}


?>