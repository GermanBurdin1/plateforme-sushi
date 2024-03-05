<?php


function addAddress($addressData)
{
    // On a besoin de la connexion à la base de données
    require '../data/db-connect.php';

    // On insère la nouvelle adresse en base de données
    $query = $dbh->prepare("INSERT INTO address (number, street, zip_code, city) VALUES (:number, :street, :zip_code, :city)");
    $query->execute($addressData['requireds']);

    return $dbh->lastInsertId();
}