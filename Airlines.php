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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Airlines</title>
  <style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid black;
    padding: 5px;
  }

  th {
    text-align: left;
  }
  th, td {
  min-width: 150px;
}
  </style>  
</head>

<body>
<h2>Show All Airlines</h2>
<button id="showAirlinesButton">Show Airlines</button>
  <div id="airlinesFlexgrid"></div>
  <script>
  document.getElementById('showAirlinesButton').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchAirlines.php', true);
    xhr.onload = function() {
      if (this.status == 200) {
        document.getElementById('airlinesFlexgrid').innerHTML = this.responseText;
      }
    };
    xhr.send();
  });
  </script>


<form action="addAirline.php" method="post">
  <label for="airlineName">Airline Name:</label><br>
  <input type="text" id="airlineName" name="airlineName"><br>
  <label for="beginDate">Begin Date:</label><br>
  <input type="date" id="beginDate" name="beginDate"><br>
  <label for="endDate">End Date:</label><br>
  <input type="date" id="endDate" name="endDate"><br>

  <label for="mergedInto">Merged Into:</label><br>
  <select id="mergedInto" name="mergedInto">
  <option value="">NULL</option>
    <?php
    // Fetch all airlines
    $sql = "SELECT AirlineID,AirlineName FROM airlines";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["AirlineID"] . "'>" . $row["AirlineName"] . "</option>";
      }
    }
    ?>
  </select><br>
  <label for="renamedTo">Renamed To:</label><br>
  <select id="renamedTo" name="renamedTo">
  <option value="">NULL</option>
    <?php
    // Fetch all airlines
    $sql = "SELECT AirlineID,AirlineName FROM airlines";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["AirlineID"] . "'>" . $row["AirlineName"] . "</option>";
      }
    }
    ?>
  </select><br>
  <input type="submit" value="Add Airline">
  <button id="createAirlineButton">Create Airline</button>
</form>


<!-- 
  <h2>Add New Airline</h2>
  <form method="post" action="Airlines.php">
    AirlineID: <input type="text" name="airlineID"><br>
    AirlineName: <input type="text" name="airlineName"><br>
    AirlineFromDate: <input type="date" name="airlineFromDate"><br>
    AirlineToDate: <input type="date" name="airlineToDate"><br>
    MergedIntoAirlineID: <input type="text" name="mergedIntoAirlineID"><br>
    RenamedToAirlineID: <input type="text" name="renamedToAirlineID"><br>
    <input type="hidden" name="action" value="add">
    <input type="submit" value="Add Airline">
  </form>

  <h2>Update Airline</h2>
  <form method="post" action="Airlines.php">
    AirlineID: <input type="text" name="airlineID"><br>
    AirlineName: <input type="text" name="airlineName"><br>
    AirlineFromDate: <input type="date" name="airlineFromDate"><br>
    AirlineToDate: <input type="date" name="airlineToDate"><br>
    MergedIntoAirlineID: <input type="text" name="mergedIntoAirlineID"><br>
    RenamedToAirlineID: <input type="text" name="renamedToAirlineID"><br>
    <input type="hidden" name="action" value="update">
    <input type="submit" value="Update Airline">
  </form>

  <h2>Delete Airline</h2>
  <form method="post" action="Airlines.php">
    AirlineID: <input type="text" name="airlineID"><br>
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Delete Airline">
  </form>
 -->


</body>
</html>

