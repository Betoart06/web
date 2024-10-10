<?php
$conn = new mysqli("localhost", "root", "", "crud_aliens");

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>