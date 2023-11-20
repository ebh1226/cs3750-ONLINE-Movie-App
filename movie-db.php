<?php
//function addFriend($name, $major, $year){
    //global $db;
    //$query="insert into friends values ( '" . $name . "' , '" . $major . "' , '" . $year . "')";
    //$db->query($query);
    //$query="insert into friends values (:name, :major, :year) ";
    //$statement = $db->prepare($query);
    //$statement-> bindValue(':name', $name);
    //$statement-> bindValue(':major', $major);
    //$statement-> bindValue(':year', $year);
    //$statement->execute();
    //$statement->closeCursor();
//}

function addMovie($profileID, $movieTitle) 
{
  global $db; 
//   $query = "insert into friends values ('" . $friendname . "', '" . $major . "'," . $year .") ";
  // $db->query($query);  // compile + exe

  $query = "insert into add_movie values (:profileID, :MovieTitle) ";
  //$query = "select * from add_movie";
  // prepare: 
  // 1. prepare (compile) 
  // 2. bindValue + exe
  //$a = "123";
  //$b = "titletitle";
  $statement = $db->prepare($query); 
  $statement->bindValue(':profileID', $profileID);
  $statement->bindValue(':MovieTitle', $movieTitle);
  //echo $query;
  //echo $movieTitle;
  //echo $profileID;
  $statement->execute();
  $statement->closeCursor();
}


function getAllMovies(){
    global $db;
    $query="select * from add_movie;";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getJUSTmovies(){
  global $db;
  $query="select * from Movies;";
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function addTime($profileID, $StartTime, $EndTime) 
{
  global $db; 
//   $query = "insert into friends values ('" . $friendname . "', '" . $major . "'," . $year .") ";
  // $db->query($query);  // compile + exe

  $query = "insert into add_timestamp values (:profileID, :StartTime, :EndTime) ";
  //$query = "select * from add_movie";
  // prepare: 
  // 1. prepare (compile) 
  // 2. bindValue + exe
  //$a = "123";
  //$b = "titletitle";
  $statement = $db->prepare($query); 
  $statement->bindValue(':profileID', $profileID);
  $statement->bindValue(':StartTime', $StartTime);
  $statement->bindValue(':EndTime', $EndTime);
  echo $profileID;
  echo $StartTime;
  echo $EndTime;
  echo $query;
  $statement->execute();
  $statement->closeCursor();
}

function getAllTimes(){
  global $db;
  $query="select * from add_timestamp ORDER BY profileID;";
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function ADMINviewUserInfo(){
  global $db;
  $query="select * from UsersInformationView;";
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}

function viewUserInfo(){
  global $db;
  $query="select * from UsersONLY;";
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}
?>