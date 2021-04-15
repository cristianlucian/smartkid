<?php
include_once 'test.php';

$user=$_POST['user1'];
$password=$_POST['password1'];

try{
  $query = $con->prepare("SELECT * FROM smartkid_users WHERE username = ?
  AND password = ?");
  $query->execute([$user, $password]);
  $count = $query->rowCount();
  if($user=Cristian){
      echo ('Admin is in the house');}
  if ($count > 0){
      echo ('Successfully logged in');
    }else{
      echo ('No user found with these details');
    }
  } catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
    }

  $con=null;
  /*  if($user=Cristian){
      header('Location: admin.php');
  }*/
?>
