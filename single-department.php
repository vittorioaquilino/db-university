<?php 

// importo il database e la classe departments
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Departments.php";

// inizializzo statement
$stmt = $conn->prepare("SELECT * FROM `departments` WHERE `id`=?");
$stmt->bind_param("d", $id);
$id = $_GET["id"];

// esecuzione
$stmt->execute();
$result = $stmt->get_result();

$departments = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $current_department = new Departments($row["id"], $row["name"]);
      $current_department->setContactData($row["address"], $row["phone"], $row["email"], $row["website"]);
      $current_department->head_of_department = $row["head_of_department"];
      $departments[] = $current_department;
    }
  } elseif ($result) {
      echo "nessun dipartimento nel database";
  } else {
    //errore nella query
    echo "errore";
}
?>

<!-- stampo in html il singolo dipartimento -->
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
    
    <a href="index.php"> &larr; Torna ai Dipartimenti</a>
    <?php foreach($departments as $department) { ?>
        <h3><?php echo $department->name; ?></h3>
        <div class="container">
            <p><b>Capo del Dipartimento:</b> <?php echo $department->head_of_department; ?></p>
            <h4>Contatti:</h4>
            <ul>
                <?php foreach($department->getContactsAsArray() as $key => $value) { ?>
                    <li class="contact"><small><?php echo "$key: $value"; ?></small></li> 
                <?php } ?>
            </ul>
        </div>
    <?php }?>
</body>
</html>