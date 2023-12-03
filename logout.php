<?php 
require("connect-db.php");
require("login-handler.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Caroline Bell, Ellen Herrera, Esha Nama">
    <meta name="description" content="Movie App Logout Page">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Movie App</title>
</head>
<body>
  
  <div class="container">
    <h1>Movie App</h1>
    Successfully logged out 
  </div>

<?php
if (count($_COOKIE) > 0)
{
   foreach ($_COOKIE as $key => $value)
   {
      // Deletes the variable (array element) where the value is stored in this PHP.
      // However, the original cookie still remains intact in the browser.   	
      unset($_COOKIE[$key]);   
		
      // To completely remove cookies from the client, 
      // set the expiration time to be in the past
      setcookie($key, '', time() - 3600);
   }
	
   // redirect to the login page immediately
      header('Location: homepage.php');
	
   // redirect with 5 seconds delay
//    header('refresh:5; url=homepage.php');
}
?>






</body>
</html>
