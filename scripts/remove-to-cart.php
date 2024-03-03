<?php

// On démarre la session
session_start();

// On vérifie bien que nous sommes dans un traitement de formulaire POST
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['meal_id']))
    {
        // On vérifie qu'un panier existe en session
        if(isset($_SESSION['cart']))
        {
            $cart = $_SESSION['cart']; // On recupère les éléments du panier dans une variable

            $_SESSION['cart'] = array_filter($cart, function($meal)
            {
                return $meal['meal_id'] != $_POST['meal_id'];
            });
        }

        // On stock un message dans la session
        $_SESSION['message'] = 'Produit supprimé du panier';

        // On redirige vers la fiche produit
        header('Location: /panier.php');
        die;

    }
}
else // Sinon on redirige vers la page d'accueil
{
    header('Location: /');
    die;
}