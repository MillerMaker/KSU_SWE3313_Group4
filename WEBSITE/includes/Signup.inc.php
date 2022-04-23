<?php

	if(isset($_POST["submit"])) {
	
		//create variables from values passed from last page.
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$user_name = $_POST["user_name"];
		$pwd = $_POST["pwd"];
		$pwdRepeat = $_POST["pwdrepeat"];
		
		$host="localhost";
		$database ="magniche_btbdatabase";
		$username="root";
		$password="";
		$charset = "utf8mb4";
		$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
		$pdo = new PDO($dsn, $username, $password);	
		
		require_once 'functions.inc.php';
		
		if(emptyInputSignup($first_name, $last_name, $user_name, $pwd, $pwdRepeat) !== false) {
			//send user back to signup page armed wiht a new error message
			header("location: ../../Account_signup.php?error=emptyinput");
			//stop script from running
			exit();
		}
		
		if(invalidUid($user_name) !== false) {
			//send user back to signup page armed wiht a new error message
			header("location: ../../Account_signup.php?error=invaliduid");
			//stop script from running
			exit();
		}
		
		if(pwdMatch($pwd, $pwdRepeat) !== false) {
			//send user back to signup page armed wiht a new error message
			header("location: ../../Account_signup.php?error=pwdMatch");
			//stop script from running
			exit();
		}
		
		if(uidExists($user_name, $pdo) !== false) {
			//send user back to signup page armed wiht a new error message
			header("location: ../../Account_signup.php?error=uidexists");
			//stop script from running
			exit();
		}		
		
		//if we've made it this far with no errors, create user.
		createUser($first_name, $last_name, $user_name, $pwd, $pdo);
		
		
	} else {
		header("location: ../../Account_signup.php");
		exit();
	}
