<?php
$server_name = "sql5.freemysqlhosting.net";
$username = "sql5476951";
$password = "imnkJpmp4H";
$dbname = "sql5476951";
//Creating the connection
$conn = new  mysqli($servername, $username, $password, $dbname);
//Checking connection
if ($conn -> connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT * FROM Spoonacular";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Image Link: " . $row["Image Link"]. "- Recipe Link: " . $row["Recipe Link"]. "- Dish: " . $row["row_names"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
