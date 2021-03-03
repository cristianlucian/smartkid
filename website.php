<?php

include_once 'test.php';

if(isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  $query = $con->prepare("select * from smartkid_users where Username = ? and Password = ?");

  $success = $query->execute([$username, $password]);



  echo ("<h1>Welcome, $username.</h1>");


}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <style>
  h1 {
    text-align: center;
  }
  </style>
</head>
<body>

</body>
</html>
