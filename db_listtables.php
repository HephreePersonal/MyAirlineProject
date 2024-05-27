<?php
$servername = "localhost";
$username = "root";
$password = "VeryKnies23!";
$dbname = "hephreeair"; // updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to list tables
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["Tables_in_".$dbname] . "\n";
  }
} else {
  echo "No tables found";
}

$conn->close();
