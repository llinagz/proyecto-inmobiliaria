<?php

//Importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//Crear un email y password
$email = "correo@correo.com";
$password = "123456";

//Hashear un password. Genera uno diferente cada vez. Tambien vale PASSWORD_BCRYPT.
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}');";
echo ($query);

//Agregar a la base de datos
mysqli_query($db, $query);