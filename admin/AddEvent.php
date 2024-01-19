<?php require("../auth/session.php"); ?>

<?php 
$eventSubject = $_POST["eventSubject"];
$startDate    = $_POST["startDate"];
$endDate      = $_POST["endDate"];
$createdBy    = $_SESSION["name"];
$currentDate  = date('Y-m-d H:i:s');
// insert the new event in event table

$sql = "INSERT INTO `event` (`subject`, `created_by`, `start_date`, `end_date`, `created_date`) 
         VALUES ('$eventSubject', '$createdBy', '$startDate', '$endDate', '$currentDate'); ";


try
 {
  $SQLresult = $conn->query($sql);
  header("Location: dashboard.php");
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }



?>