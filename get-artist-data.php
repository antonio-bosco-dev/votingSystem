<?php
/*Questo codice si connette al database, esegue una query per recuperare i dati della tabella music_works,
 e visualizza i risultati come una griglia di box. */

  // Connect to database
  $conn = mysqli_connect("localhost", "admin", "1234", "music_works");
  

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Query to retrieve data from database
  $sql = "SELECT artist_name, title, vote, id, category, comment FROM artists";
  $result = mysqli_query($conn, $sql);

  

  // If there are results
  if (mysqli_num_rows($result) > 0) {
    // Loop through the results
    while ($row = mysqli_fetch_assoc($result)) {
      // Store data in variables
      $artist_name = $row["artist_name"];
      $title = $row["title"];
      $vote = $row["vote"];
      $id = $row["id"];
      $category = $row["category"];
      $comment = $row["comment"];


      // Output data as grid of boxes
      echo '<div class="box';
      echo ($vote > 0) ? ' voted"' : '"';
      echo " data-id=$id><div class='category-div'> <p class='category'>$category</p></div><div class='artist-name-box'><h1 class='artist-name'>$artist_name</h1><h2 class='title'>$title</h2></div>";
      echo "<div class='vote-div'><h1 class='vote";
      echo ($vote == 0) ? " vote-zero'" : " ' ";
      echo ">$vote</h1></div>";

      echo "<div class='comment-div'><p class='comment'><strong>Comment:</strong> $comment</p></div>";
      echo "</div>";
    }
  } else {
    echo "No results found.";
  }

  // Close connection
  mysqli_close($conn);
?>

