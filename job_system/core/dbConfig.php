<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "job_system"; // Your chosen schema name
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>