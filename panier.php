<?php

require 'data/db-connect.php';

session_start();

if(isset($_SESSION['cart']))
{

    $totalCart = 0;
    $cart = array_map(function($meal) use ($dbh, &$totalCart) {
        $query = $dbh->query("SELECT * FROM meal WHERE id_meal = " . $meal['meal_id']);
        $data = $query->fetch();

        // On rajoute des champs à nos produits du panier
        $meal['name'] = $data['name'];
        $meal['price'] = $data['price'];
        $meal['photo'] = $data['photo'];
        $meal['total'] = number_format($data['price'] * $meal['qty'],2);

        $totalCart += $meal['total'];

        return $meal;

    }, $_SESSION['cart']);

    $title = "Panier";

    require 'templates/panier.html.php';


}