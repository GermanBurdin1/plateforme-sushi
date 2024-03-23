<?php

if(!empty($_GET['order_id']))
{
    require '../lib/order.lib.php';

    $order = getCommandeById($_GET['order_id']);

    if(!$order)
    {
        echo 'Commande inexistante';
        exit;
    }

    $addresses = getCommandsAddresses($order['id_order']);


    $meals = getCommandsMeals($order['id_order']);

    $orderTotal = 0;
    foreach($meals as $meal){
        $orderTotal += $meal['price'] * $meal['qty'];
    }

    require '../templates/protected/recap-commande.html.php';
}
else
{
    echo 'Identifiant de la commande nécessaire.';
    exit;
}


