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
        echo "AirlineID: " . $row["AirlineID"]. " - AirlineName: " . $row["AirlineName"]. " - BeginDate: " . $row["AirlineFromDate"]. " - EndDate: ". $row["AirlineToDate"]. " - Merged Into: ". $row["MergedIntoAirlineID"]. " - Renamed To: ". $row["RenamedToAirlineID"]. "<br>";
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $airlines->listAirlines();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" name="submit" value="Show Me Airlines">
</form>

</body>
</html>