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

     $email = $_SESSION['email'];
     $password = $_SESSION['password'];
?>
