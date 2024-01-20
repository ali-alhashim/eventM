<?php

$name     = $_POST["name"];

$mobile   = $_POST["mobile"];

$email    = $_POST["email"];

$company  = $_POST["company"];

$jobTitle = $_POST["jobtitle"];

$eventId  = $_POST["eventId"];

$currentDate  = date('Y-m-d H:i:s');

require("auth/connection.php");
$id = $conn->real_escape_string($eventId); // Escaping special characters
$id = intval($eventId); // Converting to integer
$stmt = $conn->prepare("SELECT `id`, `subject`, `start_date`,`start_time`, `end_date`,`end_time` FROM `event` WHERE id = ? LIMIT 1;");
$stmt->bind_param("i", $id); // Bind the sanitized value            
// Execute the statement
$stmt->execute();
// Fetch the result
$result = $stmt->get_result();
if($result->num_rows <= 0)
{
    echo("Event Not exist !");
}
else
{
    // check if the event expired or there is not time left !
    // check if new contact exist if not add to our address book
    $sql = $conn->prepare("SELECT `email` FROM `address_book` WHERE email = ? LIMIT 1;");
    $sql->bind_param("s",$email );
    $sql->execute();
    $result2 = $sql->get_result();
    if($result2->num_rows <= 0)
    {
       //Contact not Registred add new contact 
       $sql = "INSERT INTO `address_book`(`name`, `email`, `created_by`, `created_date`, `mobile`, `company`, `job_title`) VALUES('$name', '$email', 'self', '$currentDate', '$mobile', '$company', '$jobTitle');";

            try
                {
                $SQLresult = $conn->query($sql);
                $sql = "SELECT `email` FROM `address_book` WHERE email = ? LIMIT 1;";
                $sql->bind_param("s",$email );
                $sql->execute();
                $result3 = $sql->get_result();
                $row = $result3->fetch_array(MYSQLI_ASSOC);
                $ContactId = $row["id"];
                }
            catch(PDOException $e)
                {
                echo "<p class='bg-warning'>".$e->getMessage()."</p>";
                    echo "<br/>";
                }
    }
    else
    {
        //Contact Exist don't add the contact 
        $row = $result2->fetch_array(MYSQLI_ASSOC);
        $ContactId = $row["id"];
    }
    // add 1 to event for total_registered
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $oldTotalRegistred = $row["total_registered"];
    $updatedTotalRegistred = $oldTotalRegistred + 1;
    $sql = "UPDATE `event` SET `total_registered` = $updatedTotalRegistred WHERE id=$id;";
    $SQLresult = $conn->query($sql);
    // add record in table = attendance but check also if already registred ! 

    $sql = "SELECT `contact_id`, `event_id` FROM `attendance` where `event_id`=$id  AND contact_id=$ContactId LIMIT 1;";
    $result = $conn->query($sql);
    if($result->num_rows <= 0)
    {
       // this first time add him to attendance table
    }
    else
    {
       // he already registred !
    }
     
    //send email for confirmation of registration with QR code 
}
?>