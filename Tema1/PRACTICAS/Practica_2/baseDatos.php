<?php

// Nos conectamos a una Base de Datos.
$servername = "localhost";
$username = "patryk";
$password = "patryk";
$dbname = "hardware";
// Creamos la conexión.
$conn = new mysqli($servername, $username, $password, $dbname);
// Comprobamos la conexión.
if ($conn->connect_error) {
   die("Conexión Fallida: " . $conn->connect_error);
}
// Para realizar la consulta y mostrar la Base de Datos.
   $sql = "SELECT * FROM components";
   // Usamos el trigger_error para ver el mensaje de error en caso de tener un
   // error con nuesta consulta ($sql).
   $result = $conn->query($sql) or trigger_error(mysqli_error($conn)." ".$sql);

   /*
   Se asegura de que cualquier tipo de dato introducido por el usuario
   no sea dañino para nuestra base de datos.
   Convierte los posibles scripts, caracteres u otros tipos de datos
   que puedan provocar alguna modificación o daño en la base de datos.
   */
   function test_input($data) {
     // Elimina los espacios en blanco o caracteres raros.
     $data = trim($data);
     // Quia las barras con comillas escapadas.
     $data = stripslashes($data);
     // Convierte caracteres especiales en entidades HTML.
     $data = htmlspecialchars($data);
     return $data;
   }

 ?>
