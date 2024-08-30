<?php
require_once 'database/db_SQLCommands.php';

class Airlines {
  private $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function listAirlines() {
    $sql = ListAirlines('airlines','AirlineID, AirlineName, AirlineFromDate, AirlineToDate, MergedIntoAirlineID, RenamedToAirlineID');

    $result = $this->conn->query($sql);

    $html = '';

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $html .= "<div class='grid-item'>";
        $html .= "AirlineID: " . htmlspecialchars($row["AirlineID"]) . "<br>";
        $html .= "AirlineName: " . htmlspecialchars($row["AirlineName"]) . "<br>";
        $html .= "AirlineFromDate: " . htmlspecialchars($row["AirlineFromDate"]) . "<br>";
        $html .= "AirlineToDate: " . htmlspecialchars($row["AirlineToDate"]) . "<br>";
        $html .= "MergedIntoAirlineID: " . htmlspecialchars($row["MergedIntoAirlineID"]) . "<br>";
        $html .= "RenamedToAirlineID: " . htmlspecialchars($row["RenamedToAirlineID"]);
        $html .= "</div>";
      }
    } else {
      $html = "0 results";
    }

    return $html;
  }
}