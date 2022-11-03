<?php
session_start();
require('connect.php');


$query = "SELECT topic_name FROM topics";
$statement = $db->prepare($query);
$statement->execute();
$topics = $statement->fetchAll();
$statement->closeCursor();
foreach ($topics as $topic) :
    if ($_GET["name"] == $topic['topic_name']){
  $topic_name = $topic['topic_name'];
}
endforeach;
$query = "SELECT * FROM topics WHERE topic_name = '$topic_name'";
$statement = $db->prepare($query);
$statement->execute();
$topics = $statement->fetchAll();
foreach ($topics as $topic) :
  $topic_name = $topic['topic_name'];
  $topic_content = $topic['topic_content'];
  $topic_creator = $topic['topic_creator'];
endforeach;

date_default_timezone_set('America/New_York');




?>

<html>
<head>
  <?php foreach ($topics as $topic) : ?>
    <?php if($_GET['name'] == $topic_name) {
      $query = "SELECT * FROM topics WHERE topic_name = '$topic_name'";
      $statement = $db->prepare($query);
      $statement->execute();
      $topics = $statement->fetchAll();
    } ?>
  <title><?php echo $topic['topic_name']; ?></title>
    <?php endforeach; ?>
</head>
<body>
  <a href = "homepage.php">Homepage</a>
  <a href = "MyAccount.php">My Account</a>
  <a href = "Members.php">Members</a>
  <a href = "logout.php">Logout</a>
  <h1><?php echo $topic_name; ?></h1>
  <p><?php echo $topic_content; ?></p>
  <p>By <a href = "PublicProfile2.php?name=<?php echo $topic_creator;?>"> <?php echo $topic_creator;?></a></p>
  <p> Comments: </p>
  <?php
    echo "<form>
      <input type='hidden' name='uid' value='".@$_SESSION['id']."'>
      <input type='hidden' name='date' value='".date('m-d-Y H:i')."'>
      <textarea name = 'comment'></textarea><br><br>
      <button type = 'submit' name = 'submit'>Comment</button>
  </form>";
?>
</body>
</html>
