<?php

session_start();

if(empty($_SESSION['user_id']))
{
    header('Location: /connexion.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['address_form_submit'])) {
    require '../lib/form.lib.php';
    $errors = checkFormRequiredsFields($_POST);

    if (empty($errors)) {

        try {

            require '../lib/customer.lib.php';
            $addressId = addAddressForCustomer($_POST['address'], $_SESSION['user_id']);
            $alert = [
                'status' => 'success',
                'message' => 'Adresse enregistrée avec succès.'
            ];
        }
        catch (Exception $e) {
            $alert = [
                'status' => 'danger',
                'message' => $e->getMessage()
            ];
        }
    }
}
require '../templates/protected/ajouter-adresse.html.php';
