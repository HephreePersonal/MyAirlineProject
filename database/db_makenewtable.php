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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $table = $_POST["table"];
  $fields = $_POST["fields"];

  // SQL to create table
  $sql = "CREATE TABLE $table ($fields)";

  if ($conn->query($sql) === TRUE) {
    echo "Table $table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

$conn->close();
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Table name: <input type="text" name="table"><br>
  Fields: <input type="text" name="fields"><br>
  <input type="submit">
</form>