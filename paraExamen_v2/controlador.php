<?php
session_start();
function test_input($data) {
  // Elimina los espacios en blanco o caracteres raros.
  $data = trim($data);
  // Quia las barras con comillas escapadas.
  $data = stripslashes($data);
  // Convierte caracteres especiales en entidades HTML.
  $data = htmlspecialchars($data);
  return $data;
}

// Nos conectamos a una Base de Datos.
$servername = "localhost";
$username = "patryk";
$password = "patryk";
$dbname = "hardware";
// Creamos la conexión.
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['login'])) {
  // Al pulsar el submit de login.php nos guarda los valores en estas variables.
  $user = test_input($_POST['user']);
  $passwd = test_input($_POST['password']);

  // Para realizar la consulta de los usuarios y comprobar si
  // el nombre de usuario y su contraseña existen y coinciden.
  $sql = "SELECT * FROM usuarios WHERE user = '$user' AND passwd = '$passwd'";
  $resultado = $conn->query($sql) or trigger_error(mysqli_error($conn)." ".$sql);
  if ($resultado->num_rows > 0) {
    while($row=$resultado->fetch_assoc()){
      // En caso de que existan empezamos una sesión.
      // session_start — Iniciar una nueva sesión o reanudar la existente
      session_start();
      $_SESSION['user'] = $row['user'];
      header('Location: index.php');
      exit();
    }
  } else {
      // En caso de poner un usuario y contraseña incorrectos nos redireccionará
      // al login de nuevo.
      header('Location: login.php');
      exit();
    }
}
// CERRAR LA SESIÓN
if (isset($_POST['logout'])) {
  session_start();
  session_unset($_SESSION['user']);
  header('Location: index.php');
  exit();
}
//************************ AÑADIR ************************//
if (isset($_POST['alta'])) {
  $tipo = $_POST['tipo'];
  $modelo = test_input($_POST['modelo']);
  $desc = test_input($_POST['desc']);
  $precio = test_input($_POST['precio']);
  // Comprobamos si los campos introducidos son los correctos:
  // Modelo: texto y no vacío.
  // Descripción: texto y no vacío.
  // Precio: número y no vacío.
  if (empty($_POST['modelo']) || empty($_POST['desc']) || empty($_POST['precio'])) {
    header('Location: altas.php');
    exit();
  } elseif(is_numeric($_POST['precio'])) {
      $modelo = test_input($_POST['modelo']);
      $desc = test_input($_POST['desc']);
      $precio = test_input($_POST['precio']);
      // AÑADIR REGISTROS
      $sql = "INSERT INTO components (tipo, modelo, descripcion, precio) VALUES ('$tipo', '$modelo', '$desc', $precio)";
      if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
      } else {
          echo "<br>Error:" . $conn->error;
        }
    } else {
        header('Location: altas.php');
      }
  }

//************************ MODIFICAR ************************//
if (isset($_POST['modificar'])) {
  $id = $_POST['id'];
  // Comprobamos si los campos introducidos son los correctos:
  // Modelo: texto y no vacío.
  // Descripción: texto y no vacío.
  // Precio: número y n vacío.
  if (empty($_POST['modelo']) || empty($_POST['desc']) || empty($_POST['precio'])) {
    // Si los campos están vacíos nos volverá a mostrar el formulario con los
    // datos correspondientes.
    header('Location: modificar.php?id='.$id);
    exit();
  } elseif(is_numeric($_POST['precio'])) {
      $tipo = $_POST['tipo'];
      $modelo = test_input($_POST['modelo']);
      $desc = test_input($_POST['desc']);
      $precio = test_input($_POST['precio']);
      // Query para modificar todos los campos donde la id sea igual a la id del enlace.
      $sql = "UPDATE components SET tipo='$tipo',modelo='$modelo',descripcion='$desc',precio=$precio WHERE id= '$id'";
      echo $sql;
      if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
      } else {
        echo "<br>Error:" . $conn->error;
        }
    } else {
        // Si los campos están vacíos nos volverá a mostrar el formulario con los
        // datos correspondientes.
        header('Location: modificar.php?id='.$id);
      }
}
//************************ ELIMINAR ************************//
elseif (isset($_GET['id']) && isset($_GET['b'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM components WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
  } else{
      echo "<br><b>ERROR:<b> " . $conn->error;
  }
}

// Comprobar si el usuario de sesión (sesión inicada) está creado,
// si no, nos devuelve al login
if (!isset($_SESSION['user'])){
  header('Location: login.php');
  exit();
}
?>
