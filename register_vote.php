<?php

// Connect to the database
$conn = mysqli_connect("localhost", "admin", "1234", "music_works");


 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }

// Get the artist id and vote value from the POST request
$artistId = intval($_POST['id']);
$voteValue = intval($_POST['vote']);
$commentValue = strval($_POST['comment']);



// Prepare the SQL statement to update the artist's vote
$sql = "UPDATE artists SET vote = $voteValue WHERE id = $artistId";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameters
mysqli_stmt_bind_param($stmt, "ii", $voteValue, $artistId);

// Execute the statement
mysqli_stmt_execute($stmt);

// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($conn);

// Return the success status
echo json_encode(array("status" => "success"));

?>
