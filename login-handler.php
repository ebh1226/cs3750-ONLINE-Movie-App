<?php

function getAccountInfo($account_user)
{
    global $db;
    $query = "SELECT * from UsersLogin where Username = '$account_user'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

function createAccount($username, $hashed_password)
{
   global $db;
   $query = "INSERT INTO `UsersLogin` (`Username`, `Password`, `ProfileType`) VALUES ('$username', '$hashed_password', 'Base')";
   $statement = $db->prepare($query);
   $statement->execute();
   $results = $statement->fetch();
   $statement->closeCursor();
}

function getUsername($account_user)
{
    global $db;
    $query = "SELECT * from UsersLogin where Username = '$account_user'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

$name = $password = NULL;
$name_msg = $pwd_msg = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['username']) && !empty($_POST['pwd'])) {
      $name_msg = "Please enter your username!";
   }
   else if (empty($_POST['pwd']) && !empty($_POST['username'])) {
      $pwd_msg = "Please enter your password!";
   }
   else {
      $name = trim($_POST['username']);
      $password = trim($_POST['pwd']);
   }
}
?>