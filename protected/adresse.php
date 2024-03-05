<?php

session_start();

if(empty($_SESSION['user_id']))
{
    header('Location: /connexion.php');
    die;
}

require '../data/db-connect.php';

$query = $dbh->prepare("SELECT address.* FROM address JOIN customer_address ON customer_address.id_address = address.id_address WHERE customer_address.id_customer = :id_customer");
$query->execute([
    'id_customer' => $_SESSION['user_id'],
]);
$addresses = $query->fetchAll();

require '../templates/protected/adresse.html.php';