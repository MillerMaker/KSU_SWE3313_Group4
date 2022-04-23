<?php
		
	
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}


function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
	$result;
if ($pwd !== $pwdRepeat) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function uidExists($username, $pdo) {
	$result; 
	$stmt = $pdo->prepare("SELECT * FROM CUSTOMER WHERE Username = ?");
	$stmt->execute(array($username));

	//note, only if we return TRUE will the error fire. 
	if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		return $row;
	} else {
		$result = false;
	}
	return $result;

}

function createUser( $first_name, $last_name, $username, $pwd, $pdo) {

	//initializing new prepared statement
	$stmt = $pdo ->prepare("INSERT INTO CUSTOMER (FirstName, LastName, Username, UserPassword) VALUES (?, ?, ?, ?);");
	
		
	//hash password
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	$stmt->bindParam(1, $first_name);
	$stmt->bindParam(2, $last_name);
	$stmt->bindParam(3, $username);
	$stmt->bindParam(4, $hashedPwd);

	
	if (!$stmt->execute()) {
		header("location: ../../Account_signup.php?error=stmtFailed");
		exit();
	}
	

	
	/*this is where we pass parameters to the prepared statement. The
	  SQL statment has two string inputs, hence the perameter 'ss'
	  they are username and email, respectively. So basically,
	  all this does is replace the two strings in the sql statement with
	  values in username and email.
	*/
	
	header("location: ../../Account_signup.php?error=none");
	exit();
	
} 

function emptyInputLogin($username, $pwd) {
	if(empty($username) || empty($pwd)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}


function userLogin($username, $pwd, $pdo) {
	$uidExists = uidExists($username, $pdo);
	
	if($uidExists === false) {
	//username doesn't exist
	header("location: ../../Account_login.php?error=uiddoesntexist"); 
	exit();
	}
	
	$pwdHashed = $uidExists['UserPassword'];
	$checkPwd = password_verify($pwd, $pwdHashed);
	
	if ($checkPwd === false) {
		header("location: ../../Account_login.php?error=wronglogin");
		exit();
	}
	else if($checkPwd === true) {
		session_start();
		$_SESSION["customerID"] = $uidExists["CustomerID"];
		$_SESSION["user_name"] = $uidExists["Username"];
		header("location: ../../Menu.php");
		exit();
	}
}
