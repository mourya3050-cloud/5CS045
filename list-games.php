<!doctype html>
<html lang="en">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btn {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


</style>
  <body>
  
    <h1>List of ALL my games!!!</h1>
    <?php
      // Connect to database
      include 'db.php';
	
      // Run SQL query
      $sql = "SELECT * FROM videogames ORDER BY released_date";
      $results = mysqli_query($mysqli, $sql);
    ?>
	
	<form action="search-games.php" method="post">
  <input type="text" name="keywords" placeholder="Search">
  <input type="submit" value="Go!">
</form>

    <table >
	
      <?php while($a_row = mysqli_fetch_assoc($results)):?>
        <tr>
          <td><a href="game-details.php?id=<?=$a_row['game_id']?>"><?=$a_row['game_name']?></a></td>
          <td><?=$a_row['rating']?></td>
		  <td><a class="btn btn-outline-danger btn-sm" href="delete-game.php?id=<?=$a_row['game_id']?>" role="button">Delete</a></td>
		  <td><a class="btn btn-warning btn-sm" href="edit-game-form.php?id=<?=$a_row['game_id']?>">Edit</a></td>

         </tr>
		 
      <?php endwhile;?>
    </table>
	<a href="add-game-form.php" class="btn btn-primary">Add a game</a>
	
  </body>
</html>
