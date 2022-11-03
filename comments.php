<?php

@$topic_name = $_POST['comment'];

function setComments($db) {
  if (isset($_POST['commentSubmit'])) {
    $sql = "INSERT INTO topics (comments) VALUES (:comments) WHERE topic_name = '$topic_name' ";
    $statement = $db->prepare($sql);
    $statement->bindValue(':comments', $comments);
    $statement->execute();
    $statement->closeCursor();
    header("Topic.php?name=<?php echo $topic['topic_name'];?>");
  }
}

function getComments($db) {
  $sql = "SELECT comments FROM topics WHERE topic_name = '$topic_name'";
  $result = $db->query($sql);
  while ($row = $result->fetch_assoc()){
    echo "<div class>";
    echo $row['message']. "<br><br>";
    echo "<div>";
  }

}
