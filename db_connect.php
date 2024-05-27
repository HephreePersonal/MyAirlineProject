<?php
$servername = "localhost"; // replace with your server name if different
$username = "root"; // replace with your username
$password = "VeryKnies23!"; // replace with your password
$dbname = "hephreeair"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Close connection
$conn->close();
