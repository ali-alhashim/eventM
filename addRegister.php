<?php

$name     = $_POST["name"];

$mobile   = $_POST["mobile"];

$email    = $_POST["email"];

$company  = $_POST["company"];

$jobTitle = $_POST["jobtitle"];

$eventId  = $_POST["eventId"];



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
    }
    else
    {
        //Contact Exist don't add the contact 
    }
    // add 1 to event for total_registered
    // add record in table = attendance but check also if already registred ! 
}
?>