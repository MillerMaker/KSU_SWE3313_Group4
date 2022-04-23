<?php
	session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>DB Project</title>
    <meta name="author" content="Phillip Magnicheri">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="Home.css" rel="stylesheet" type="text/css" />
	<?php

	?>
  </head>
  <body>
    <div class ="banner">
       <img src = "https://i.pinimg.com/originals/f9/7d/58/f97d58467d1d2ecd4171451db6f954ff.png" alt="Banner" width = 100% height = 200px>
     <h1>
      <a class = "Home" href="Home.php">Between The Buns</a></h1> 
	  <?php
	  if(isset($_SESSION["customerID"])) {
		echo "<a class='AccountLogout' href='includes//Logout.inc.php'>LogOut</a>";
		echo "<a class='Profile' href='menu.php'>Profile</a>";
	  } else {
		  echo "<a class='AccountLogin' href='Account_login.php'>Account Login</a>";
	  }
	  ?>
  <a class = "Cart" href= "Cart.php"><ion-icon name ="cart-outline"></ion-icon> Cart <span></span></a>
  <div class = "navbar">
  <a href="Menu.php">Menu</a>
  <a href="About.php">About</a>
  <a href="Contact.php">Contact</a>
  </div>
</div>
  <p>  Attention! This not a real restuarant website. all names, numbers, and information used are fake for the purpose of a university project. This project was for the Intro to Software Engineering course at Kennesaw State University.</p><br>
