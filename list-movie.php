<!doctype html>
<html lang="en">
  <body>
    <h1>List of ALL my Movies!!!</h1>
    <?php
      // Connect to database
      include("db1.php");
	
      // Run SQL query
      $sql = "SELECT * FROM movie ORDER BY released_date";
      $results = mysqli_query($mysqli, $sql);
    ?>

    <table>
      <?php while($a_row = mysqli_fetch_assoc($results)):?>
        <tr>
          <td>><a href="movie-details.php?id=<?=$a_row['movie_id']?>"><?=$a_row['movie_name']?></a></td>
          <td><?=$a_row['rating']?></td>
         </tr>
      <?php endwhile;?>
    </table>
  </body>
</html>
