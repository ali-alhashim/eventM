<?php

//Create users table  & add deafult admin user 

$sql = "

create table if not exists `users` (

    `id` int(11) not null auto_increment,
    `name' varchar(100) default null,
   
    `email` varchar(45) default null,
    `password` varchar(45) default null,
  
    `status` varchar(45) default null,
    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),
    primary key (`id),
    UNIQUE KEY `email_UNIQUE` (`email`)

    ) engine=InnoDB default charset=utf8mb4;

";


try
{
 $SQLresult = $conn->exec($sql);
 echo("<li> <i class='fas fa-check m-2'></i> user table has been created </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";
     echo "<br/>";
}

// insert default admin user with password with roles group admin

$sql = "
 INSERT INTO `users` (`email`, `password`,  `status`, `name`) VALUES ('ali-alhashim@outlook.com', '','active', 'ali alhashim');
 ";

 try
 {
  $SQLresult = $conn->exec($sql);
  echo("<li> admin user has been added </li>"); 
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }

      

?>