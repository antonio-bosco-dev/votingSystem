<?php
/*Questo codice si connette al database, esegue una query per recuperare i dati della tabella music_works,
 e visualizza i risultati come una griglia di box. Assicurati di sostituire "hostname", "username", "password" e "database_name" 
 con i dettagli corretti del tuo database. */

  // Connect to database
  $conn = mysqli_connect("localhost", "admin", "1234", "music_works");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Query to retrieve data from database
  $sql = "SELECT artist_name, title, vote, id FROM artists";
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

      // Output data as grid of boxes
      echo '<div class="box';
      echo ($vote > 0) ? ' voted"' : '"';
      echo " data-id=$id>";
      echo "<p class='artist-name'>$artist_name</p>";
      echo "<p class='title'>$title</p>";
      echo "<p class='vote'>$vote</p>";
      echo "</div>";
    }
  } else {
    echo "No results found.";
  }

  // Close connection
  mysqli_close($conn);
?>
