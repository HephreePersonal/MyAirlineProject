<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto; /* Adjust as needed */
  padding: 10px;
}
.grid-item {
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>
</head>
<body>

<div class="grid-container">

<?php
include 'db_SQLCommands.php';

class Airlines {
  private $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function listAirlines() {
    $sql = listAirlines('airlines','AirlineID, AirlineName, AirlineFromDate, AirlineToDate, MergedIntoAirlineID, RenamedToAirlineID');

    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<div class='grid-item'>";
        echo "AirlineID: " . $row["AirlineID"] . "<br>";
        echo "AirlineName: " . $row["AirlineName"];
        echo "AirlineFromDate: " . $row["AirlineFromDate"];
        echo "AirlineToDate: " . $row["AirlineToDate"];
        echo "MergedIntoAirlineID: " . $row["MergedIntoAirlineID"];
        echo "RenamedToAirlineID: " . $row["RenamedToAirlineID"];
        echo "</div>";
      }
    } else {
      echo "0 results";
    }
  }
}

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

$airlines = new Airlines($conn);
$airlines->listAirlines();

$conn->close();
?>

</div>

</body>
</html>