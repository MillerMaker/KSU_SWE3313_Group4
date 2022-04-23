<?php 
	include_once 'header.php';

	?>

<div class ="Container">
	<?php
	
			error_reporting(0);
			$host="localhost";
			$database ="magniche_btbdatabase";
			$username="root";
			$password="";
			$charset = "utf8mb4";
			$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
			$pdo = new PDO($dsn, $username, $password);		
		
			$product_id = $_POST['product_id'];
			$product_name = $_POST['product_name'];
			$product_price = $_POST['product_price'];
			$product_image = $_POST['product_Image'];
			$remove_id = $_POST['remove_id'];
			
	
		class item{
			public $item_id;
			public $item_name;
			public $item_price;
			public $item_image;
		}
		
		$cart = array();
		$Print_cart = array();
		
if($product_id !=  null){	
if(isset($_SESSION['cart'] ) ) {
	$i = 0;
	foreach($_SESSION ['cart'] as $Item){
		$cart[$i] = $Item; 
		++$i;
	}

	   $i = $_SESSION['counter'];
	   $cart [$i] = new item();
	   $cart [$i]  -> item_id = $product_id;
	   $cart [$i]-> item_name = $product_name;
	   $cart [$i] -> item_price = $product_price;
	   $cart [$i] -> item_image = $product_image;
	   $_SESSION ['cart'] =  $cart;
	   $_SESSION['counter'] += 1;
	
   }else {
	   $cart ['counter'] = new item();
	   $cart ['counter']  -> item_id = $product_id;
	   $cart ['counter']-> item_name = $product_name;
	   $cart ['counter'] -> item_price = $product_price;
	   $cart ['counter'] -> item_image = $product_image;
	   $_SESSION ['cart'] =  $cart;
	   $_SESSION['counter'] = 1;
}
}


$y = 0;
foreach($_SESSION ['cart'] as $Item){
		$control_cart[$y] = $Item; 
		++$y;
	}
if($remove_id !=  null){
	for( $x = 0; $x < count($control_cart); $x++){
		if($remove_id == $x){
		unset($control_cart[$remove_id]);
		$control_cart2 = array_values($control_cart);
		goto end;
		}
	}
	end: $_SESSION ['cart'] =  $control_cart2;
}
	




$i = 0;
foreach($_SESSION ['cart'] as $Item){
		$Print_cart[$i] = $Item; 
		++$i;
	}
	$Grand_total = 0;
for($x = 0; $x < count($Print_cart); ++$x){
		$item_position = $x;
		echo '<div class = "Image">';
		echo '<image src= "' .$Print_cart[$x]->item_image . '" width = 150px height = 150px>';
		echo'<h3>' . $Print_cart[$x]->item_name . '</h3><p>Total $' . $Print_cart[$x] -> item_price . '</p>';
		echo'<form action = "Cart.php"  method = "post">';
		echo '<input type= "hidden" id = "remove_id" name = "remove_id" value = "'. $item_position .'">';
		echo '<input type="Submit" value="Remove">';
		echo '</form>';
		echo '</div>';
		
		$Grand_total = $Grand_total + $Print_cart[$x] -> item_price;
	}
	echo '<h4>Final Total $' . $Grand_total . '</h4>';



	
		
?>

	</div>
  </body>
</html>