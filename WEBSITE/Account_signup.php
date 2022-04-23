<?php
	include_once 'header.php';
?>
	<p> Account SIGN UP </p>
	<div class = "signup-form">
		<form action= 'includes//Signup.inc.php' method = "post"> 
			<input type = "text" name = "first_name" placeholder = "first name here"> 
			<input type = "text" name = "last_name" placeholder = "last name here"> <br>
			<input type = "text" name = "user_name" placeholder = "Username"> <br>
			<input type = "password" name = "pwd" placeholder = "Password..."><br>
			<input type = "password" name = "pwdrepeat" placeholder = "Repeat password..."> <br>
			<button type = "submit" name = "submit" > Sign Up </button>
		</form>
	</div>
	
	<?php
		
		if(isset($_GET["error"])) {
			if($_GET["error"] == "emptyinput") {
				echo "<p>Please fill in every field</p>";
			} else if ($_GET["error"] == "invaliduid") {
				echo "<p>Usernames may only contain letters and numbers.</p>";
			} else if ($_GET["error"] == "invaliduid") {
				echo "<p>Usernames may only contain letters and numbers.</p>";
			} else if ($_GET["error"] == "pwdMatch") {
				echo "<p>The passwords you entered do not match.</p>";
			} else if ($_GET["error"] == "uidexists") {
				echo "<p>That username already exists!.</p>";
			} else if ($_GET["error"] == "none") {
				echo "<p>You're all signed up!.</p>";
			}
		}
	?>