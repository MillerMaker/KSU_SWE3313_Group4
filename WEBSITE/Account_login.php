<?php session_start();
	include_once 'header.php';
?>
	
    <p >Account Login in</p>
<form action="Account_login.php" method="post">
  <label for "user_name"> User Name</label><br>
  <input type ="text" id="username" name="username"><br><br>
  <label for "password">Password</label></br>
  <input type ="password" id="password" name="password"><br><br>
  <input type="Submit" value ="Search"><br><br>
  </form>
  
  <form action="Account_login.php" method="post">
   <label for "New account">Don't have an account</label><br>
	<input type="Submit" value ="Creat New Account">
	</form>


<div class = "footer">
  <img src = "https://i.pinimg.com/originals/f9/7d/58/f97d58467d1d2ecd4171451db6f954ff.png" alt="Banner" width = 100% height = 50px>
  </div> 

   
  </body>