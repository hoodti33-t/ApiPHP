<?php
//post to DB
require 'connection.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

//insert user inputed data into the tb_data database
    $query = "INSERT INTO tb_data VALUES('','$name', '$email', ' $latitude', '$longitude')";
    mysqli_query($conn, $query);

//alert message to prove that data has been added to the tb_data databse
    echo
    "
 <script>
    alert('Data Added Succesfully');
    document.location.href = 'data.php';
    </script>
    "
 ;
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Food Delivery App</title>
<style>


header {
  color: black;
  background:  url(images/glassDash.jpg) no-repeat center center;
  text-align: center;
  height: 7em;
  width: auto;
}

/*body Styles*/
body {
  background-color: #E6E6E3;
  margin: 0 10%;
  font-family: sans-serif;
  text-align: center;
  }


h1 {
  text-align: center;
  font-family: serif;
  font-weight: normal;
  font-size: 3em;
  text-transform: uppercase;
  border-bottom: 3px solid #8B0000;
  margin-top: 30px;
}
h2 {
  text-align: center;
  font-size: 2em;
  font-family: serif;
  font-weight: normal;

}
h3 {
  font-size: .5em;
  border-top: 1px solid #8B000;
}

/*footer Styles*/y
footer {
border-top: 1px solid #8B0000;
text-align: center;
padding-top: 1em;
}
footer img {
width: 40px;
height: 40px;
margin-left: .5em;
margin-right: .5em;
}

@keyframes dropdown {
0% {
  transform: translateX(-300px);
}
100% {
  transform: translateX(0);
}
}

nav {

animation: 1s ease-out 0s 1 dropdown;
background: #8B0000;
width: 100%;
padding: 5px;
}

 a {
   text-decoration: none;
   color: #030303;
   padding: 5px;
   font-family: sans-serif;
   font-weight: bolder;
   display:inline-block;
 }

 a:hover {
   color: #FFFF00;
 }

</style>
<header><p></p></header>
</head>
<body onload = "getLocation();">

    <h1>Food delivery App</h1>
    <h2>
        <Ol>
            <li>Pizza</li>
            <li>Hot Dog and Fries</li>
            <li>Burger and Fries</li>
        </ol>
</h2><!--forms for user to subit data-->
    <p>please fill out these fields so that we can fulfill your order</p>
    <form class="myForm" action="" method="post" autocomplete="off">
        <label for="">Name and the Number of your Food Selection</label>
        <input type="text" name="name" required value=""><br>
        <label for="">Email</label>
        <input type="email" name="email" required value=""><br>
        <input type="hidden" name="latitude" value="">
        <input type="hidden" name="longitude" value="">
        <button type="submit" name="submit">Submit</button>
</form>
<!--javascript code to run the google geocode.getCurrentLocation api to return the current lat, and lon of user-->
<script type="text/javascript">
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }
    }
    //function to input the results of the last function
    function showPosition(position){
        document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;

    }
//error handler
    function showError(error){
        switch(error.code){
            case error.PERMISSION_DENIED:
            alert("you must allow your location to be tracked to use the App");
            location.reload();
            break;
        }
    }
</script>
<h3><b>Links</b>
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

<footer>find us on
<p><a href="https://www.facebook.com/TheHarborDiner/"><img src="facebook-svgrepo-com.svg" alt="facebook logo" class="center"></a>
</footer>

</body>
</html>
