<?php
session_start();
require("teamfoobartopicdatabase.php");
require("connect.php");
?>


<html>
<head>
</head>
<body>
<form method = "POST" action = "CreateTopic.php">
<a href = "homepage.php?">Homepage</a>
<h1>Create a Topic</h1>
<p><label>Topic Title:</label>
    <input type="text" name="topic_name" rows="1" cols="22" required/></input>
</p>
<p><label>Content:
    <textarea name="topic_content" rows="4" cols="36" required></textarea>
  </label>
</p>
<button type="submit" name="post">Post</button>
<?php
if (@$_GET['status'] == "success")
echo "<br><br><br>Topic Created";
?>
</form>
</body>
</hthml>
