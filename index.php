<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'homepage.php';
      break; 
   case '/homepage.php':     // if you plan to also allow a URL with the file name 
      require 'homepage.php';
      break;              
   case '/viewMovies.php':
      require 'viewMovies.php';
      break;
    case '/addMovieForm.php':
      require 'addMovieForm.php';
      break;
    case '/addTimeStamp.php':
      require 'addTimeStamp.php';
      break;
   case '/login.php':
      require 'login.php';
      break;
   case '/signup.php':
      require 'signup.php';
      break;
   case '/logout.php':
      require 'logout.php';
      break;
   default:
      http_response_code(404);
      exit('Not Found');
}  
?>