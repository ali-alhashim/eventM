<?php require("../auth/session.php"); ?>

<?php 
$eventSubject = $_POST["eventSubject"];
$startDate    = $_POST["startDate"];
$endDate      = $_POST["endDate"];
$createdBy    = $_SESSION["name"];
$startTime    = $_POST["startTime"];
$endTime      = $_POST["endTime"];
$location     = $_POST["location"];
$message      = $_POST["message"];
$currentDate  = date('Y-m-d H:i:s');
// insert the new event in event table

$sql = "INSERT INTO `event` (`subject`, `created_by`, `start_date`, `end_date`, `created_date`, `start_time`, `end_time`, `location`, `message`) 
         VALUES ('$eventSubject', '$createdBy', '$startDate', '$endDate', '$currentDate', '$startTime', '$endTime', '$location', '$message'); ";


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