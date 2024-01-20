<?php
$sql = "

CREATE TABLE IF NOT EXISTS `address_book` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) DEFAULT NULL,
    `email` VARCHAR(100) DEFAULT NULL,
    `created_by` VARCHAR(100) DEFAULT NULL,
    `created_date` DATETIME(6) DEFAULT NULL,
    `mobile` VARCHAR(100) DEFAULT NULL,
    `company` VARCHAR(250) DEFAULT NULL,
    `job_title` VARCHAR(250) DEFAULT NULL,
    `last_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

";

try
{
 $SQLresult = $conn->query($sql);
 echo("<li> <i class='fas fa-check m-2'></i> address book table has been created </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";
     echo "<br/>";
}


?>