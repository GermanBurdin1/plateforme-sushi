<?php


function addAddressForCustomer($addressData, $customerId)
{
    // On a besoin de la connexion à la base de données
    require_once '../data/db-connect.php';

    // On insère la nouvelle adresse en base de données
    require_once '../lib/address.lib.php';
    $addressId = addAddress($addressData);

    // On vérifie que l'insertion s'est bien passée (on recupère l'id de l'adresse)
    if(!$addressId)
        throw new Exception('Un problème est survenu lors de l\'enregistrement.');

    // On met en relation l'adresse et le client via la table de liaison customer_address
    $query = $dbh->prepare("INSERT INTO customer_address (id_customer, id_address) VALUES (:id_customer, :id_address)");
    $query->execute([
        'id_customer' => $customerId,
        'id_address' => $addressId
    ]);

    // On retourne l'id de l'adresse nouvellement créer
    return $addressId;
}