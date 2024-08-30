<?php
$servername = "localhost";
$username = "root";
$password = "VeryKnies23!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to get MySQL version and hostname
$sql = "SELECT VERSION() as version, @@hostname as hostname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Version: " . $row["version"] . ", Hostname: " . $row["hostname"] . "\n";
  }
} else {
  echo "No result found";
}

$conn->close();
