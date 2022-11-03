<?php
$dsn = 'mysql:host=localhost;dbname=teamfoobardatabase';
$username = 'teamfoobar';
$passwords = 'teamfoobarpass';

try{
  $db = new PDO($dsn, $username, $passwords);
}
catch(PDOException $e) {
       echo "Connection failed: " . $e->getMessage();
     }

@$username = $_POST['username'];
@$password = $_POST['password'];
@$repass = $_POST['repassword'];
@$email = $_POST['email'];
@$date = date("Y-m-d");
$query = "SELECT email, username FROM users";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
foreach ($users as $user) :
endforeach;
if(isset($_POST['submit'])) {
    if($email == @$user['email']) {
      header("Location: register.php?status=double");
    }
    else {
    if($username != @$user['username']) {
      if($password == $repass) {
        $query = "INSERT INTO users (username, password, email, date) VALUES (:username, :password, :email, :date)";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $statement->closeCursor();
        header("Location: register.php?status=success");
      }
    }
    else {
      header("Location: register.php?status=username");
    }
}
}


$query = "SELECT username FROM users WHERE email = '$email'";
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
foreach ($users as $user) :
  $username = $user['username'];
endforeach;


@$topic_name = $_POST['topic_name'];
@$topic_content = $_POST['topic_content'];
$topic_creator = $username;
$date = date("Y-m-d");


if(isset($_POST['post'])) {
    $query = "INSERT INTO topics (topic_name, topic_content, topic_creator, date) VALUES (:topic_name, :topic_content, :topic_creator, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':topic_name', $topic_name);
    $statement->bindValue(':topic_content', $topic_content);
    $statement->bindValue(':topic_creator', $topic_creator);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
    header("Location: CreateTopic.php?status=success");

  }

?>
