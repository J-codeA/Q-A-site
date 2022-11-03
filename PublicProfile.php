<?php
session_start();
require('connect.php');
$query = "SELECT * FROM users";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
foreach ($users as $user) :
  if ($_GET["name"] == $user['username']){
      $username = $user['username'];
  }
endforeach;
$query = "SELECT * FROM users WHERE username = '$username'";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
foreach ($users as $user) :
  $username = $user["username"];
  $date = $user["date"];
  $email = $user["email"];
  $replies = $user["replies"];
  $topic = $user["topics"];
endforeach;
?>

<html>
<head>
</head>
<body>
  <a href = "homepage.php">Homepage</a>
  <a href = "MyAccount.php">My Account</a>
  <a href = "Members.php">Members</a>
  <a href = "logout.php">Logout</a>
  <br>
  <br>
  <h3><?php echo $username; ?></h3>
  <p><h4>Date registered: </h4> <?php echo $date; ?></p>
  <p><h4>Email: </h4> <?php echo $email; ?></p>
  <p><h4>Replies: </h4> <?php echo $replies; ?></p>
  <p><h4>Topics created: </h4> <?php echo $topic; ?></p>
</body>
</html>
