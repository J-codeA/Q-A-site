<?php
require("connect.php");


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
