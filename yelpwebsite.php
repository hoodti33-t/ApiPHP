<html lang="en" dir="ltr">
<header>
  <p></p>
</header>
   <head>
     <meta charset="utf-8">
     <title>Yelp Api Website</title>


    <link rel="stylesheet" href="Menu.CSS">
    <style media="screen">

      .Results{
        text-align: center;
        color: #E6E6E3;
        background-color: #8B0000;
        margin-left: 20em;
        margin-right: 20em;
      }




    </style>
   </head>
   <body>

     <h1>List of restaurants located near the glassboro area</h1>

     <section class= "sort">
     <button onclick="High();"><a>Highest Rating First</a></button>
     <button onclick="Normal();"><a>Unsort</a></button>
     <button onclick="Low();"><a>Lowest Rating First</a></button>
     </section>

     <script> //script is used to have buttons hide and display datta
       function High() {
         document.getElementById("High").removeAttribute("hidden");
         document.getElementById("Normal").setAttribute("hidden", "hidden");
         document.getElementById("Low").setAttribute("hidden", "hidden");
      }

      function Low() {
        document.getElementById("Low").removeAttribute("hidden");
        document.getElementById("Normal").setAttribute("hidden", "hidden");
        document.getElementById("High").setAttribute("hidden", "hidden");
      }

      function Normal() {
        document.getElementById("Normal").removeAttribute("hidden");
        document.getElementById("Low").setAttribute("hidden", "hidden");
        document.getElementById("High").setAttribute("hidden", "hidden");
      }
     </script>

     <br>
     <br>

     <section class="Results">

       <!-- Lines 62-91 are for printing the results straight from the database unordered-->
     <section id= "Normal">
     <?php
     $servername = "sql5.freemysqlhosting.net";
     $username = "sql5476951";
     $password = "imnkJpmp4H";
     $dbname = "sql5476951";


     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT * FROM yelp";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        //echo data from mysql table
      echo "<br>".$row["row_names"]."<br> Rating is " .$row["Rating"]. " stars out of 5 <br> ". $row["Address"]." ".$row["City"]." ". $row["State"]. " ". $row["Zip Code"]. "<br>";
      }
      echo "<br>";
     } else {
      echo "0 results";
     }
     $conn->close();
     ?>
    </section>

<!-- Lines 94-123 are for printing the results ordered from highest to lowest -->
    <section id= "High" hidden>
    <?php
    $servername = "sql5.freemysqlhosting.net";
    $username = "sql5476951";
    $password = "imnkJpmp4H";
    $dbname = "sql5476951";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM yelp ORDER BY Rating DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

     while($row = $result->fetch_assoc()) {
       //echo data from mysql table
     echo "<br>".$row["row_names"]."<br> Rating is " .$row["Rating"]. " stars out of 5 <br> ". $row["Address"]." ".$row["City"]." ". $row["State"]. " ". $row["Zip Code"]. "<br>";
     }
     echo "<br>";
    } else {
     echo "0 results";
    }
    $conn->close();
    ?>
   </section>

   <!-- Lines 126-155 are for printing the results ordered from lowest to highest -->
       <section id= "Low" hidden>
       <?php
       $servername = "sql5.freemysqlhosting.net";
       $username = "sql5476951";
       $password = "imnkJpmp4H";
       $dbname = "sql5476951";


       $conn = new mysqli($servername, $username, $password, $dbname);

       if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT * FROM yelp ORDER BY Rating ASC";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          //echo data from mysql table
        echo "<br>".$row["row_names"]."<br> Rating is " .$row["Rating"]. " stars out of 5 <br> ". $row["Address"]." ".$row["City"]." ". $row["State"]. " ". $row["Zip Code"]. "<br>";
        }
        echo "<br>";
       } else {
        echo "0 results";
       }
       $conn->close();
       ?>
      </section>

   </section>


<h3><b>Links</b></h3>
<nav>
<ul>

  <li>
  <button><a href="index.html">Back to The Hompage</a></button>
  <button><a href="menu.php">Menu</a></button>
  <button><a href="apply.html">Apply Online</a></button>
  <button><a href="hours.html">See Our Hours</a></button>
 </li>

</ul>
</nav>
   </body>
<footer></footer>
  </html>
