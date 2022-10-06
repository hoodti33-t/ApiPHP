<!Doctype html>
<html>
<head>
<html lang="en" dir="ltr">
<header>
  <p></p>
</header>
   <head>
     <meta charset="utf-8">
     <title>Spoonacular Api Website</title>
      <link rel="stylesheet" href="Menu.CSS">
   </head>
   <body>
<?php
$server_name = "sql5.freemysqlhosting.net";
$username = "sql5476951";
$password = "imnkJpmp4H";
$dbname = "sql5476951";
//Creating the connection
$conn = new  mysqli($server_name, $username, $password, $dbname);
//Checking connection
if ($conn -> connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT * FROM Spoonacular";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Image Link: " . $row["Image Link"]. "- Recipe Link: " . $row["Recipe Link"]. " - Dish: " . $row["row_names"] ;
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<h3><b>Links</b></h3>
<nav>
<ul>

  <li>
  <button><a href="index.html">Back to The Hompage</a>
  <button><a href="menu.php">Menu</a>
  <button><a href="apply.html">Apply Online</a>
  <button><a href="hours.html">See Our Hours</a>
 </li>

</ul>
</nav>
   </body>
<footer></footer>
  </html>
