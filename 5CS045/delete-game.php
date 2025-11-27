<?php
  
  // Read values from the URL
  $game_id = $_GET['id'];
  
  // Connect to database
  include("db.php");
  
  // Define SQL query
  $sql = "DELETE FROM videogames WHERE game_id = " . $game_id;
  
  // Run SQL statement and report errors
  if(!$mysqli -> query($sql)) {
      echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
  }
  
  // Redirect to list
  header("location: list-games.php");  
  
?>