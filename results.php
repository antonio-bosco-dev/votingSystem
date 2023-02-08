<?php
$conn = new mysqli("localhost", "admin", "1234", "music_works");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM artists ORDER BY vote DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " Name: " . $row["name"] . " Title: " . $row["title"] . " Link: " . $row["link"] . " Vote: " . $row["vote"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
