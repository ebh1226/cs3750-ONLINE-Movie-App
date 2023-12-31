<?php 
require("connect-db.php");
require("login-handler.php");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_POST['updateBtn'])) {
        $user = $_COOKIE['user'];
        $pwd = trim($_POST['pwd']);
        $hash_pwd = password_hash($pwd, PASSWORD_BCRYPT);
        updatePassword($user, $hash_pwd);
        echo 'Password change successful!';
    } else if (!empty($_POST['deleteBtn'])) {
        $user = $_COOKIE['user'];
        deleteAccount($user);
        header('Location: logout.php'); 
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
    <title>Movie App Profile</title>
   
    <style>
      /* Global styles */
      body {
          font-family: 'Helvetica Rounded', 'Arial Rounded MT Bold', sans-serif;
          background-color: #b8d6e0;
          margin: 0;
          padding: 0;
      }

      /* Navigation styles */
      nav {
          background-color: #2E3D51;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 80px;
      }

      nav ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          display: flex;
      }

      nav li {
          margin: 0 20px;
      }

      nav a {
          color: white;
          text-decoration: none;
          font-size: 20px;
          line-height: 10px;
      }

      nav a:hover {
          color: #cccccc;
      }

      /* Main container styles */
      .container-fluid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        /* Title styles */
        h1 {
            font-weight: bolder;
            text-align: center;
            font-size: 60px;
            margin-bottom: 20px;
        }

        /* Form styles */
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #2E3D51;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: auto;
        }

        button[type="submit"]:hover {
            background-color: #4A5C6B;
        }

        /* Class list styles */
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Message styles */
        ul.messages {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        ul.messages li {
            margin-bottom: 5px;
            padding: 8px;
            border-radius: 4px;
        }

        ul.messages li.success {
            background-color: #4CAF50;
            color: white;
        }

        ul.messages li.error {
            background-color: #f44336;
            color: white;
        }

        ul.messages li.warning {
            background-color: #ff9800;
            color: white;
        }

        ul.messages li.info {
            background-color: #2196F3;
            color: white;
        }
    </style>


</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <nav>
      <ul>
          <li><a href="homepage.php">Home</a></li>
          <li><a href="addMovieForm.php">Add A Movie</a></li>
          <li><a href="viewMovies.php">View All Movies</a></li>
          <li><a href="addTimeStamp.php">Add A Time Stamp</a></li>
          <?php
          if (isset($_COOKIE['user']))
          { ?>
          <li><a href="profile.php">Profile</a></li> 
          <li><a href="logout.php">Log Out</a></li>
          <?php
          } else { ?>
        <li><a href="login.php">Log In</a><li>
            <?php } ?>
      </ul>
  </nav>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="container">
    <h1><?php echo $_COOKIE['user']; ?>'s Profile</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      Username: <input type="text" name="username" class="form-control" value="<?php echo $_COOKIE['user']; ?>" disabled /> <br/>
      Profile Type: <input type="text" name="profileType" class="form-control" value="<?php $type = getProfileType($_COOKIE['user']); echo $type[0] ?>" disabled /> <br/>
      Password: <input type="password" name="pwd" class="form-control"/> <br/>
      <input type="submit" value="Update Password" name="updateBtn" class="btn btn-light"  />  
      <input type="submit" value="Delete Account" name="deleteBtn" class="btn btn-danger"  />  
    </form>
  </div>
    </form>
</body>

</html>