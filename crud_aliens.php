<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Insertar datos
  if (isset($_POST["insertar"])) {
    $nombre = $_POST["nombre"];
    $poderes = $_POST["poderes"];
    $sql = "INSERT INTO aliens_ben10 (nombre, poderes) VALUES ('$nombre', '$poderes')";
    $conn->query($sql);
  }

  // Actualizar datos
  if (isset($_POST["actualizar"]) && isset($_POST["id"])) {  
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $poderes = $_POST["poderes"];
    $sql = "UPDATE aliens_ben10 SET nombre='$nombre', poderes='$poderes' WHERE id=$id";
    $conn->query($sql);
  }

  // Borrar datos
  if (isset($_POST["borrar"]) && isset($_POST["id"])) {  
    $id = $_POST["id"];
    $sql = "DELETE FROM aliens_ben10 WHERE id=$id";
    $conn->query($sql);
  }
}

// Consultar datos
$result = $conn->query("SELECT * FROM aliens_ben10");
?>
