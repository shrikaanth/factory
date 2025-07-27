<?php
// Database connection settings
$host = 'localhost';
$db   = 'u134758228_pfstudio'; // Local database name
$user = 'u134758228_pfstudio'; // Default XAMPP user
$pass = 'Photofactorystudi@2025@#Sandeepsir'; // Default XAMPP password (empty)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // If database doesn't exist, try to create it
    if ($e->getCode() == 1049) {
        try {
            $pdo = new PDO("mysql:host=$host;charset=$charset", $user, $pass, $options);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e2) {
            die('Database creation failed: ' . $e2->getMessage());
        }
    } else {
        die('Database connection failed: ' . $e->getMessage());
    }
}
?> 