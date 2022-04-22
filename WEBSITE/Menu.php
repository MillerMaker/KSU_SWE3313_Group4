<?php session_start();
	include_once 'header.php';

	?>
	
	
<div class = "itemLookup">
  <form action="Menu.php" method="post">
  <label for "departmentName">Item Search</label><br>
  <input type ="text" id="item_name" name="item_name"><br>
	
  <input type="Submit" value ="Search"></form>
  <br>
  </div>
  
  <div class ="Container">
	<?php
		$host="localhost";
		$database ="magniche_btbdatabase";
		$username="root";
		$password="";
		$charset = "utf8mb4";
		
		try {
		$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
		$pdo = new PDO($dsn, $username, $password);	
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "Connection failed: " .$e->getMessage();
		}


		$stm = $pdo ->query("Select * from ITEM;");
		$rows = $stm->fetchALL(PDO::FETCH_NUM);
		
		foreach($rows as $row){
			echo '<div class = "Image">';
			echo '<image src= "' .$row[3]. '" width = 150px height = 150px>';
			echo'<h3>' . $row[1] . '</h3><p>$' . $row[2] . '</p>';
			echo'<form action = "Template.php"  method = "post">';
			echo '<input type= "hidden" id = "product_id" name = "product_id" value = "'.$row[0].'">';
			echo '<input type="Submit" value="select">';
			echo '</form>';
			echo '</div>';
		}
		
		
		?>
  </div>

  </body>
  
   <div class = "footer">
  <img src = "https://i.pinimg.com/originals/f9/7d/58/f97d58467d1d2ecd4171451db6f954ff.png" alt="Banner"width = 100% height = 50px>
  </div> 
  
</html>