<?php

session_start();

if(empty($_SESSION['user_id']))
{
    header('Location: /connexion.php');
    die;
}

require '../data/db-connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require '../lib/order.lib.php';

    $errors = [];
    if(empty($_POST['billing_address']))
    {
        $errors['billing_address'] = 'Vous devez choisir une adresse de facturation';
    }

    if(empty($_POST['delivery_address']))
    {
        $errors['delivery_address'] = 'Vous devez choisir une adresse de livraison';
    }

    if(empty($errors))
    {
        $orderId = createNewOrder($_SESSION['user_id'], intval($_POST['billing_address']), intval($_POST['delivery_address']));

        if($orderId)
        {
            addCartMealsToOrder($_SESSION['cart'], $orderId);
            header('Location: /protected/recap-commande.php?order_id='.$orderId);
            exit;
        }
    }
}




$query = $dbh->prepare("SELECT address.* FROM address JOIN customer_address ON customer_address.id_address = address.id_address WHERE customer_address.id_customer = :id_customer");
$query->execute([
    'id_customer' => $_SESSION['user_id'],
]);
$addresses = $query->fetchAll();

require '../templates/protected/adresse.html.php';