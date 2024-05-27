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

// Fetch all airlines
$sql = "SELECT * FROM airlines";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Start table
  echo "<table>";
  
  // Output header row
  echo "<tr><th>AirlineID</th><th>AirlineName</th><th>AirlineFromDate</th><th>AirlineToDate</th><th>MergedIntoAirlineID</th><th>RenamedToAirlineID</th></tr>";
  
  // Output data of each row
   while($row = $result->fetch_assoc()) {
    $fromDate = new DateTime($row["AirlineFromDate"]);
    $toDate = new DateTime($row["AirlineToDate"]);
    echo "<tr><td>" . $row["AirlineID"]. "</td><td>" . $row["AirlineName"]. "</td><td>" . $fromDate->format('Y-m-d') . "</td><td>"  . $toDate->format('Y-m-d') . "</td><td>" . $row["MergedIntoAirlineID"]. "</td><td>" . $row["RenamedToAirlineID"]. "</td></tr>";
}
  
  // End table
  echo "</table>";
} else {
  echo "No airlines found";
}

$conn->close();
?>
