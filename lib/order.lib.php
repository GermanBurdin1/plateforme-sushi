<?php

function createNewOrder(
    int $customerId, 
    int $billingAddressId,
    int $deliveryAddressId
){
    require '../data/db-connect.php';

    $query = $dbh->prepare('INSERT INTO `order` (date_order, id_customer, id_billing_address, id_delivery_address) VALUES (NOW(),:id_customer, :id_billing_address, :id_delivery_address)');

  
    $query->execute([
        'id_customer' => $customerId,
        'id_billing_address' => $billingAddressId,
        'id_delivery_address' => $deliveryAddressId
    ]);

    return $dbh->lastInsertId();
}

function addCartMealsToOrder(
    array $cart, 
    int $orderId
)
{
    require '../data/db-connect.php';

    foreach ($cart as $meal){

        $query = $dbh->prepare('SELECT price FROM meal WHERE id_meal = :id_meal');
        $query->execute([
            'id_meal' => $meal['meal_id'],
        ]);
        $priceMeal = $query->fetchColumn();

        if($priceMeal)
        {
            $query = $dbh->prepare('INSERT into order_meal (id_order, id_meal, qty, price) VALUES (:id_order, :id_meal, :qty, :price)');
            $query->execute([
                'id_order' => $orderId,
                'id_meal' => $meal['meal_id'],
                'qty' => $meal['qty'],
                'price' => $priceMeal
            ]);
        }
    }
}

function getCommandeById(int $orderId)
{
    require '../data/db-connect.php';

    $query = $dbh->prepare('SELECT * FROM `order` WHERE id_order = :order_id');
    $query->execute([
        'order_id' => $orderId
    ]);

    return $query->fetch();
}

function getCommandsMeals(int $orderId)
{
    require '../data/db-connect.php';

    $query = $dbh->prepare('');
    $query->execute([
        'order_id' => $orderId
    ]);

    return $query->fetch();
}