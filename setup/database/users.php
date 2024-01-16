<?php

//Create users table & users roles table & add deafult admin user 

$sql = "

create table if not exists `users` (

    `id` int(11) not null auto_increment,
    `full_name' varchar(100) default null,
    `picture_url` varchar(1000) default null,
    `email` varchar(45) default null,
    `password` varchar(45) default null,
    `roles_group` varchar(250) DEFAULT NULL,
    `status` TINYINT(1) default null,
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
 INSERT INTO `users` (`email`, `password`,  `roles_group`, `status`, `full_name`) VALUES ('alhasham', 'admin', 'admin',  'active', 'ali alhashim');
 ";

 try
 {
  $SQLresult = $conn->exec($sql);
  echo("<li><i class='fas fa-check m-2'></i> admin user has been added </li>"); 
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }

      

?>