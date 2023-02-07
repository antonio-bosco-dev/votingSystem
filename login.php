<?php

/*
Questo codice implementa la connessione al database, la verifica dei dati di accesso inviati dall'utente, 
e la gestione della sessione per l'utente.
*/

// Connessione al database
$host = "localhost";
$username = "admin";
$password = "1234";
$dbname = "vote-sys-login";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Verifica della connessione
if (!$conn) {
  die("Connessione al database fallita: " . mysqli_connect_error());
}

// Verifica dei dati di accesso
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1) {
    // Salvataggio dei dati dell'utente nella sessione
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    
    // Reindirizzamento alla pagina principale
    header("Location: main.php");
  } else {
    // Visualizzazione del messaggio di errore
    echo "Username o password non corretti. Riprova.";
  }
}

mysqli_close($conn);
?>
