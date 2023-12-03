<?php 
require("connect-db.php");
require("login-handler.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['username']) > 0 && !empty($_POST['pwd'])) {
    $user = trim($_POST['username']);
    $results = getUsername($user);
    if (!empty($results)) {
        echo '<script>window.alert("Username already exists. Try different username!")</script>';
    } else {
        $pwd = trim($_POST['pwd']);
        $hash_pwd = password_hash($pwd, PASSWORD_BCRYPT);
        createAccount($user, $pwd, $hash_pwd);
        setcookie('user', $_POST['username'], time() + 3600);
        setcookie('pwd', password_hash($_POST['pwd'], PASSWORD_BCRYPT), time() + 3600);
        header('Location: homepage.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Caroline Bell, Ellen Herrera, Esha Nama">
    <meta name="description" content="Movie App Sign Up Page">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Movie App Sign Up</title>
   
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php //include('header.html') ?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="container">
    <h1>Movie App Sign Up</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      Username: <input type="text" name="username" class="form-control" autofocus required /> <br/>
      Password: <input type="password" name="pwd" class="form-control" required /> <br/>
      <input type="submit" value="Sign in" class="btn btn-light"  />   
    </form>
    <h4>Already have an account? Log in <a href="login.php">here!</a></h4>
  </div>
    </form>
</body>

</html>