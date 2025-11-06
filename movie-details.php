<?php
  // Connect to database and run SQL query
  include("db1.php");

  // Grabs id value from URL
  $id = $_GET['id'];

  $sql = "SELECT * FROM movie WHERE movie_id = {$id}";
  $rst = mysqli_query($mysqli, $sql);
  $a_row = mysqli_fetch_assoc($rst);
?>

<h1><?=$a_row['movie_name']?></h1>
<p><?=$a_row['movie_description']?></p>

<a href="list-movie.php"><< Back to list</a>
