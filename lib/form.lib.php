<?php

/**
 * Permet de vérifier tous les champs obligatoire d'un formulaire
 * @param array $data
 * @return string[]
 */
function checkFormRequiredsFields($data)
{
    $errors = [];
    foreach($data as $fields){

        if(isset($fields['requireds']))
        {
            foreach($fields['requireds'] as $requiredFieldName => $requiredFieldValue){
                if(empty($requiredFieldValue))
                {
                    $errors[$requiredFieldName] = "Ce champs est obligatoire.";
                }
            }
        }
    }

    return $errors;
}

function addAddressForCustomer($customerId, $addressData) {
    require 'db-connect.php';

    // On vérifie les champs
    $errors = checkFormRequiredsFields([$addressData]);
    if (!empty($errors)) {
        return [
            'status' => 'error',
            'message' => 'Tous les champs ne sont pas remplis.',
            'errors' => $errors
        ];
    }

    try {
        // On ajoute une adresse
        $query = $dbh->prepare("INSERT INTO address (number, street, zip_code, city) VALUES (:number, :street, :zip_code, :city)");
        $query->execute([
            ':number' => $addressData['number'],
            ':street' => $addressData['street'],
            ':zip_code' => $addressData['zip_code'],
            ':city' => $addressData['city'],
        ]);

        $addressId = $dbh->lastInsertId();

        if (!$addressId) {
            return [
                'status' => 'error',
                'message' => 'une erreur est survenue.'
            ];
        }

        // On relie l'adresse à l'utilisateur
        $query = $dbh->prepare("INSERT INTO customer_address (id_customer, id_address) VALUES (:id_customer, :id_address)");
        $query->execute([
            ':id_customer' => $customerId,
            ':id_address' => $addressId,
        ]);

        return [
            'status' => 'success',
            'message' => 'l\'adresse est bien ajoutée.'
        ];
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'erreur de la bd: ' . $e->getMessage()
        ];
    }
}