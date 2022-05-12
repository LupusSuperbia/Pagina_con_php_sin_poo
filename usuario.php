<?php 

// Importar la conexion
require 'includes/config/database.php';

$db = conectarDB();

// Crear un en email y password
$email = "correo@correo.com";
$password = "123456";


$passwordHash = password_hash($password, PASSWORD_DEFAULT);
// HASHEAR PASSWORD 

// var_dump($passwordHash);
// Query para crear un usuario 
$query = " INSERT INTO usuarios(email, password) VALUES ('${email}', '${passwordHash}')";
// echo $query;

// Agregarlo a la base de dato 
mysqli_query($db, $query);
