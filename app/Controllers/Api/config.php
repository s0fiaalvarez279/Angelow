<?php
header('Content-Type: application/json');
$host = 'localhost';
$user = 'root';
$password = '';          // Si tienes contraseña, cámbiala
$database = 'angelow_db';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]));
}
$conn->set_charset('utf8mb4');
?>