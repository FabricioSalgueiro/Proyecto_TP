<?php
// config/db.php

$host = 'localhost';
$db   = 'libreria_db'; // Nombre de la base de datos creada arriba
$user = 'root';        // Usuario de MySQL (cambiar si es necesario)
$pass = '';            // Contraseña de MySQL (cambiar si es necesario)
$charset = 'utf8mb4';
$port = '3307';

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Traer resultados como array asociativo
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     // echo "Conexión exitosa."; // Descomentar para probar la conexión
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>