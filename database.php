<?php 
// importo il database da mysql 
//definisco le constanti
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_PORT", "8889");
define("DB_NAME", "db_university");

// faccio la connessione
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// faccio il controllo
if ($conn && $conn->connect_error) {
    echo "Non c'è nessun database collegato";
    die();
}
?>