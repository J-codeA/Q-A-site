<?php
require('teamfoobardatabase.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register an Account</title>
</head>
  <body>
	<h1>Welcome to the FOO-RUM</h1>
	<h2>Please Register/Login</h2>
	<form action = "register.php" method = "post">
		<p><label>Username:
			<input type="text" name="username" id="username" rows="1" cols="22" required/></textarea>
			</label>
		</p>
		<p><label>Password:
			<input type="password" name='password' id="password" rows="1" cols="22" required/></textarea>
			</label>
		</p>
		<p><label>Confirm password:
			<input type="password" name='repassword' id="repassword"rows="1" cols="22" required/></textarea>
			</label>
		</p>
		<p><label>Email:
			<input type="email" name="email" id="email" rows="1" cols="22" required/></textarea>
			</label>
		</p>
		<input type="submit" name = "submit" id ="submit" value="Register"> or <a href="login.php">Login</a>
    <?php
    if (@$_GET['status'] == "success")
    echo "<br>You are registered.  You may now log in";
    ?>
    <?php
    if (@$_GET['status'] == "double")
    echo "<br>Account already exists with that email.  Please log in";
    ?>
    <?php
    if (@$_GET['status'] == "username")
    echo "<br>Username already used.  Please use another one";
    ?>
	</form>
  </body>
</html>
