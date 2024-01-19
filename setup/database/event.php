<?php


$sql = "

CREATE TABLE IF NOT EXISTS `event` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `subject` VARCHAR(100) DEFAULT NULL,
    `created_by` VARCHAR(100) DEFAULT NULL,
    `start_date` DATETIME(6) DEFAULT NULL,
    `end_date` DATETIME(6) DEFAULT NULL,
    `created_date` DATETIME(6) DEFAULT NULL,
    `status` VARCHAR(100) DEFAULT NULL,
    `total_registered` INT(13) DEFAULT(0),
    `total_attended` INT(13) DEFAULT(0),
    `last_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`)
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

";

try
{
 $SQLresult = $conn->query($sql);
 echo("<li> <i class='fas fa-check m-2'></i> event table has been created </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";
     echo "<br/>";
}



?>