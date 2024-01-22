<?php
$sql = "

CREATE TABLE IF NOT EXISTS `attendance` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(100) DEFAULT NULL,
    `contact_id` INT(11) DEFAULT NULL,
    `event_id` INT(11) DEFAULT NULL,
    `created_date` DATETIME(6) DEFAULT NULL,
    `attended_date` DATE DEFAULT NULL,
    `attended_time` DATE DEFAULT NULL,
    `last_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`)
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