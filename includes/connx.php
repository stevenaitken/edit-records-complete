<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbase = "company";

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // for error reporting
try {
  $conn = new mysqli($servername, $username, $password, $dbase);

} catch(Exception $e) {
  error_log($e->getMessage());
  exit('Error connecting to the database'); //Should be a message a typical user could understand
}



?>