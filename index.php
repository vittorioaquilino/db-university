<?php
// importo il database
require_once __DIR__ . "/database.php";

// creo una query
$sql = "SELECT * FROM departments";
$result = $conn->query($sql);
var_dump($result); //--> verifica

?>