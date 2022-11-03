<?php
session_start();
$_SESSION['email'] = $_GET['email'];
$_SESSION['password'] = $_GET['password'];
require('connect.php');

$query = "SELECT * FROM users WHERE email = '$email'";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
foreach ($users as $user) :

  if ($email != $user['email']) {
    header("Location: login.php?status=invalid");
    exit();
  }
else{
  if ($password == $user['password']) {
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

}
else{
    header("Location: login.php?status=invalid");
    exit();
  }
}
endforeach;
$statement->closeCursor();



$query = 'SELECT topic_id, topic_name, views, topic_creator, date FROM topics';
$statement = $db->prepare($query);
$statement->execute();
$topics = $statement->fetchAll();
$statement->closeCursor();
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
        <?php foreach ($users as $user) : ?>
     <h1>Welcome to the FOO-RUM <?php echo $user["username"]; ?></h1>
     <?php echo $_SESSION['email']; ?>
         <?php endforeach; ?>
     <h2>Home</h2>
     <table>
       <form method = "GET">
       <tr>
         <td> ID </td>
         <td> Topic </td>
         <td> Views </td>
         <td> Creator </td>
         <td> Date </td>
       </tr>
  <?php foreach ($topics as $topic) : ?>
    <tr>
      <td><?php echo $topic['topic_id']; ?></td>
      <td><a href = "Topic.php?name=<?php echo $topic['topic_name'];?>"><?php echo $topic['topic_name']; ?></a></td>
      <td><?php echo $topic['views']; ?></td>
      <td><a href = "PublicProfile.php?name=<?php echo $topic['topic_creator']; ?>"><?php echo $topic['topic_creator'];?></a></td>
      <td><?php echo $topic['date']; ?></td>
    </tr>
    <?php endforeach; ?>
  </form>
  </table>
  <p>Have something to share?</p>
  <a href = "CreateTopic.php">Post your topic now!</a>
     </body>
     </html>
