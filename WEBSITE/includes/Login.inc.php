<?php

	if(isset($_POST["submit"])) {
		
			//create variables from values passed from last page.
			$user_name = $_POST["username"];
			$pwd = $_POST["password"];
			
			$host="localhost";
			$database ="magniche_btbdatabase";
			$username="root";
			$password="";
			$charset = "utf8mb4";
			$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
			$pdo = new PDO($dsn, $username, $password);	
			
			require_once 'functions.inc.php';
			
			if(emptyInputLogin($user_name, $pwd) !== false) {
				header("location: ../../Account_login.php?error=emptyinput");
				//stop script from running
				exit();
			}
			
			userLogin($user_name, $pwd, $pdo); 
			
	}else {
		header("location: ../../Account_login.php");
		exit();
	}
		
		
