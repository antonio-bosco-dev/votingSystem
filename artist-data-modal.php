<?php
//connect to the database
 // Connect to database
 $conn = mysqli_connect("localhost", "admin", "1234", "music_works");

 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }

//get the artist id from the GET request
$artistId = intval($_GET['id']);

//query the database to get the artist data
$query = "SELECT name, title, link, vote FROM artists WHERE id = $artistId";
$result = mysqli_query($conn, $query);

//check if the query was successful
if ($result) {
  //fetch the data as an associative array
  $artistData = mysqli_fetch_assoc($result);

  //return the data as a JSON object
  echo json_encode($artistData);
} else {
  //return an error if the query was not successful
  echo json_encode(array("error" => "Could not retrieve artist data"));
}

//close the database connection
mysqli_close($conn);
?>
