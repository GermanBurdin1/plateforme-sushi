<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'sushilang';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbName", $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
    echo "Error: " . $e->getMessage();
    die;
}