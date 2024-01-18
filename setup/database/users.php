<?php

//Create users table  & add deafult admin user 

$sql = "

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) DEFAULT NULL,
    `email` VARCHAR(100) DEFAULT NULL,
    `password` VARCHAR(100) DEFAULT NULL,
    `status` VARCHAR(100) DEFAULT NULL,
    `last_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

";


try
{
 $SQLresult = $conn->query($sql);
 echo("<li> <i class='fas fa-check m-2'></i> user table has been created </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";
     echo "<br/>";
}

// insert default admin user with password with roles group admin
$systemEmail = $_POST["email"];
$userName    = $_POST["name"];
$ThePassword = password_hash($_POST["userpassword"], PASSWORD_DEFAULT);

$sql = "
 INSERT INTO `users` (`email`, `password`,  `status`, `name`) VALUES ('$systemEmail', '$ThePassword','active', '$userName');
 ";

 try
 {
  $SQLresult = $conn->query($sql);
  echo("<li> admin user has been added </li>"); 
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }

      

?>