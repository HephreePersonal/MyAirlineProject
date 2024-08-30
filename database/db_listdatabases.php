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

// Query to list databases
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["Database"] . "\n";
  }
} else {
  echo "No databases found";
}

$conn->close();
