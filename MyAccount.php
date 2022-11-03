<?php
session_start();
require('connect.php');


$query = "SELECT username, email, date FROM users WHERE email = '$email'";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
?>


     <html>
     <head>
       <title>Account Page</title>
     </head>
     <body>
       <a href = "homepage.php">Homepage</a>
       <a href = "MyAccount.php">My Account</a>
       <a href = "Members.php">Members</a>
       <a href = "logout.php">Logout</a>
     <h1>My Account</h1>
     <form>
     <table>
       <?php foreach ($users as $user) : ?>
       <tr>
         <td>Username: <input type = "text" placeholder="<?php echo $user['username'];?>"></input>
      </tr>
      <tr>
        <td>Email: <input type = "text" placeholder="<?php echo $user['email'];?>"></input>
     </tr>
     <tr>
       <td>Date Joined: <?php echo $user['date'];?></td>
    </tr>
         <?php endforeach; ?>
  </table>
</form>
     </body>
     </html>
