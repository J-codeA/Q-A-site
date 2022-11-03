Ω<?php
session_start();
if(isset($_SESSION["email"]) && $_SESSION["password"] === true){
    header("location: homepage.php");
}
?>
<html>
<head>
  <title>Log In</title>
</head>
<body>
<h1>Welcome to the FOO-RUM</h1>
<h2>Please Login</h2>
<form method = "GET" action = "homepage.php">
<p><label>Email:
    <input type="text" name="email" rows="1" cols="22" required/></textarea>
  </label>
</p>
<p><label>Password:
    <input type="password" name='password' rows="1" cols="22" required/></textarea>
  </label>
</p>

<button type="submit" value="login">Log in</button>
<p>You must login to view this site.</p>
<a href = "register.php">Don't have an account?  Click here</a>
<?php
error_reporting(0);
if ($_GET['status'] == "invalid")
echo "<br>Error: Invalid credential, you must correctly login to view this site";
?>
<?php
error_reporting(0);
if ($_GET['status'] == "email")
echo "<br>Error: Invalid email, email is not in system";
?>
</body>
</html>
