<?php
// importo il database e la classe departments
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Departments.php";

// creo una query
$sql = "SELECT * FROM departments";
$result = $conn->query($sql);

$departments = [];
// controllo se ci sono risultati
if ($result && $result->num_rows > 0) {
    //Proviamo ad accedere ai valori
    while ($row = $result->fetch_assoc()) {
      $department = new Departments($row["id"], $row["name"]);
      $departments[] = $department;
    }
  } elseif ($result) {
    // query è andata a buon fine ma non ci sono risultati
  } else {
    //query non andata a buon fine
    echo "error";
    die();
}
?>

<!-- stampo in html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <h2>Lista Dipartimenti:</h2>
    <div class="container">
        <div class="card">
            <ul>
                <?php foreach($departments as $department) { ?>
                <li><b><?php echo $department->name; ?></b></li>
                <li>
                    <a href="single-department.php?id=<?php echo $department->id; ?>">Visualizza dettagli</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</body>
</html>