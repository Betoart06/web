<?php

$conn = new mysqli("localhost", "root", "", "crud_aliens");

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (isset($_POST["insertar"])) {
    $nombre = $_POST["nombre"];
    $poderes = $_POST["poderes"];
    $sql = "INSERT INTO aliens_ben10 (nombre, poderes) VALUES ('$nombre', '$poderes')";
    $conn->query($sql);
  }

  if (isset($_POST["actualizar"]) && isset($_POST["id"])) {  // Verificar si 'id' está definido
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $poderes = $_POST["poderes"];
    $sql = "UPDATE aliens_ben10 SET nombre='$nombre', poderes='$poderes' WHERE id=$id";
    $conn->query($sql);
  }

 
  if (isset($_POST["borrar"]) && isset($_POST["id"])) {  // Verificar si 'id' está definido
    $id = $_POST["id"];
    $sql = "DELETE FROM aliens_ben10 WHERE id=$id";
    $conn->query($sql);
  }
}

$result = $conn->query("SELECT * FROM aliens_ben10");
?>

