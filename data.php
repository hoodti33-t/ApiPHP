<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Database Page</title>
<style>
header {
  color: black;
  background:  url(images/glassDash.jpg) no-repeat center center;
  text-align: center;
  height: 6.5em;
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
</head>
<body>
<h1>We will Use the information you have provided to deliver your Order in an Hour Or less!!</h1>
    <table border = 1 cellSpacing = 0 cellpadding = 10>
        <tr>
            <td>order #</td>
            <td>Name and food Selection</td>
            <td>Email</td>
            <td>Maps</td>
        </tr>
<?php
   require 'connection.php';
    $rows = mysqli_query($conn, "SELECT * FROM tb_data ORDER BY id DESC");
    $i = 1;

    foreach($rows as $row) :
?>
<tr>
    <td><?php echo $i++; ?> </td>
    <td><?php echo $row["name"] ?> </td>
    <td><?php echo $row["email"] ?> </td>
    <!--call to google api to init the map to diplay the users location in the table-->
    <td style = "width: 450px; height: 450px;"> <iframe src="https://www.google.com/maps?q=<?php echo $row["latitude"];?>,<?php echo $row["longitude"];?>&h1=es;z=14&output=embed" style = "width: 100%; height: 100%;"></iframe></td>
</tr>
    </table>
    <br>

<?php endforeach; ?>
<h3><b>Links</b>
<nav>
<ul>

  <li>
  <button><a href="index.html">Back to The Hompage</a>
  <button><a href="menu.html">Menu</a>
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
