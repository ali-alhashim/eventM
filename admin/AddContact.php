<?php require("../auth/session.php"); ?>

<?php 
$name = $_POST["name"];

$createdBy    = $_SESSION["name"];
$email    = $_POST["email"];
$mobile      = $_POST["mobile"];
$company     = $_POST["company"];
$jobTitle      = $_POST["jobTitle"];
$currentDate  = date('Y-m-d H:i:s');
// insert the new event in event table

$sql = "INSERT INTO `address_book` (`name`, `created_by`, `email`, `mobile`, `created_date`, `company`, `job_title`) 
         VALUES ('$name', '$createdBy', '$email', '$mobile', '$currentDate', '$company', '$jobTitle'); ";


try
 {
  $SQLresult = $conn->query($sql);
  header("Location: addressbook.php");
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }



?>