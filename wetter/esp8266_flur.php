<?php
$servername = "HOST";
$username = "NAME";
$password = "PASSWORT";
$dbname = "DATENBANK";
$tblname = "";
$area = $_REQUEST['areaplace'];
$temp = $_REQUEST['temp'];
$humi = $_REQUEST['humi'];
$datum =  date("d.m.Y");
$zeit = date("H:i:s");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql = "INSERT INTO flur (datum, zeit, temp, humi, area) VALUES (CURRENT_DATE(), NOW(), '$temp', '$humi', '$area')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>