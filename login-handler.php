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
   $statement->closeCursor();
}

function createProfile($username, $hashed_password)
{
   global $db;  

   // $count = "SELECT COUNT(*) FROM Users";
   // $statement = $db->prepare($count);
   // $statement->execute();
   // $profileID = $count[0] + 1;
   // $profileID = '2345';

   $query = "INSERT INTO `Users` (`profileID`, `Username`, `Password`, `ProfileType`) VALUES ('234545', '$username', '$hashed_password', 'Base')";
   $statement = $db->prepare($query);
   $statement->execute();
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

function getProfileType($account_user)
{
    global $db;
    $query = "SELECT ProfileType from UsersLogin where Username = '$account_user'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

function updatePassword($user, $pwd)
{
   global $db;
   // $query = "UPDATE `UsersLogin` SET `Password`=:pwd WHERE Username=:user";
   $query = "UPDATE UsersLogin SET Password='$pwd' WHERE Username='$user'";
   $statement = $db->prepare($query); 
   // $statement->bindValue(':pwd', $pwd);
   // $statement->bindValue(':user', $user);
   $statement->execute();
   $statement->closeCursor();
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