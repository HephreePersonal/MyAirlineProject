<?php
$servername = "localhost";
$username = "root";
$password = "VeryKnies23!";
$dbname = "hephreeair";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize POST data
$airlineName = $conn->real_escape_string($_POST['airlineName']);
$beginDate = $conn->real_escape_string($_POST['beginDate']);
$endDate = $conn->real_escape_string($_POST['endDate']);
$mergedInto = !empty($_POST['mergedInto']) ? $conn->real_escape_string($_POST['mergedInto']) : NULL;
$renamedTo = !empty($_POST['renamedTo']) ? $conn->real_escape_string($_POST['renamedTo']) : NULL;

// Insert new airline
$sql = "INSERT INTO airlines (AirlineName, AirlineFromDate, AirlineToDate, MergedIntoAirlineID, RenamedToAirlineID) VALUES ('$airlineName', '$beginDate', '$endDate', ".($mergedInto !== NULL ? "'$mergedInto'" : "NULL").", ".($renamedTo !== NULL ? "'$renamedTo'" : "NULL").")";

if ($conn->query($sql) === TRUE) {
  echo "New airline added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
