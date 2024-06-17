<?php

$host = 'localhost';
$db = 'blog';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Ustawienie trybu błędów/set error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Jeśli połączenie się nie powiedzie, zakończ skrypt/if the connection fails, terminate the script
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
