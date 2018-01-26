<?php
require_once('baseDatos.php');
$id = $_GET['id'];
$sql = "DELETE FROM components WHERE id = $id";
if ($conn->query($sql) === TRUE) {
  header('Location: index.php');
} else
    echo "<br>Error:" . $conn->error;
 ?>
