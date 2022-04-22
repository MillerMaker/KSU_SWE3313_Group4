<?php session_start();
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
		$host="localhost";
		$database ="magniche_btbdatabase";
		$username="root";
		$password="";
		$charset = "utf8mb4";
		$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
		$pdo = new PDO($dsn, $username, $password);	
	?>
	
  </head>
  <body>
    <div class ="banner">
       <img src = "https://i.pinimg.com/originals/f9/7d/58/f97d58467d1d2ecd4171451db6f954ff.png" alt="Banner" width = 100% height = 200px>
 <h1>
      <a class = "Home" href="Home.php">Between The Buns</a></h1> 
  <a class="AccountLogin" href="Account_login.php">Account Login</a>
  <a class = "Cart" href= "Cart.php"><ion-icon name ="cart-outline"></ion-icon> Cart <span></span></a>
  <div class = "navbar">
  <a href="Menu.php">Menu</a>
  <a href="About.php">About</a>
  <a href="Contact.php">Contact</a>
  </div>
</div>
  <p> Disclaimer: This not a real hospital website all names, numbers, and information used are fake for the purpose of a university project. This project was for Database Systems course at Kennesaw State University.</p><br>

  <?php	
			
				$product_id = $_POST["product_id"];
				
				$stm = $pdo ->query("Select * from ITEM;");
				$rows = $stm->fetchALL(PDO::FETCH_NUM);
				
		foreach($rows as $row){
			if($row[0] == $product_id){
			echo '<div class = "Image2">';
			echo '<image src= "' .$row[3]. '" width = 300px height = 300px>';
			echo'<h3>' . $row[1] . '</h3><p>$' . $row[2] . '</p>';
			echo'<form action = "Cart.php"  method = "post">';
			echo '<input type= "hidden" id = "product_id" name = "product_id" value = "'.$row[0].'">';
			echo '<input type= "hidden" id = "product_name" name = "product_name" value = "'.$row[1].'">';
			echo '<input type= "hidden" id = "product_price" name = "product_price" value = "'.$row[2].'">';
			echo '<input type= "hidden" id = "product_Image" name = "product_Image" value = "'.$row[3].'">';
			echo '<input type= "hidden" id = "quantity" name = "quantity" value = "1">';
			echo '<input type="Submit" value="Add to cart">';
			echo '</div>';
			}
		}
		
				
				?>
		

  <div class = "footer">
  <img src = "https://i.pinimg.com/originals/f9/7d/58/f97d58467d1d2ecd4171451db6f954ff.png" alt="Banner"width = 100% height = 50px>
  </div> 
		
	
  </body>
</html>