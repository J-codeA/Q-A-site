<?php
session_start();
require('connect.php');

$query = "SELECT * FROM users";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
foreach ($users as $user) :
  $username = $user['username'];
endforeach;

 ?>


 <html>
 <head>
   <title>Homepage</title>
 </head>
 <body>
   <a href = "homepage.php">Homepage</a>
   <a href = "MyAccount.php">My Account</a>
   <a href = "Members.php">Members</a>
   <a href = "logout.php">Logout</a>
  <h1>Members</h1>
  <table>
    <form method = "GET">
  <?php foreach ($users as $user) : ?>
  <tr>
    <td><a href = "PublicProfile.php?name=<?php echo $user['username'];?>"><?php echo $user['username']; ?></a></td>
  </tr>
<?php endforeach; ?>
</form>
  </table>
</body>
