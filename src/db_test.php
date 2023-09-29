<?php
$conn = mysqli_connect("mysql-sales-ordering-container","helping_hands","Hnj7Ghb5Fgtyjj","helping_hands");

//$conn = mysqli_connect("localhost","root","","GRP-04-37-HELPINGHANDS");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
