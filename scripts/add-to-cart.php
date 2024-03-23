<?php

// On démarre la session
session_start();

// On vérifie bien que nous sommes dans un traitement de formulaire POST
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(!empty($_POST['meal_id']) && !empty($_POST['qty']))
    {
        // On vérifie q'un panier existe en session
        if(isset($_SESSION['cart']))
        {
            $cart = $_SESSION['cart']; // On recupère les éléments du panier dans une variable

            // On vérifie si le produit est déjà dans le panier
            $meals = array_filter($cart, function($meal)
            {
                return $meal['meal_id'] == $_POST['meal_id'];
            });

            if(count($meals) > 0)
            {
                // On modifie la quantité du produit
                $_SESSION['cart'] = array_map(function($meal){
                    if($meal['meal_id'] == $_POST['meal_id'])
                    {
                        $meal['qty'] += $_POST['qty']; // On incrémente la quantité du produit
                    }
                    return $meal;
                }, $cart);
            }
            else
            {
                $_SESSION['cart'][] = [
                    'meal_id' => $_POST['meal_id'],
                    'qty' => $_POST['qty'],
                ];
            }
        }
        else // Si non on le créer et on stock le produit
        {
            // On stock les données du panier en session
            $_SESSION['cart'][] = [
                'meal_id' => $_POST['meal_id'],
                'qty' => $_POST['qty'],
            ];
        }

        // On stock un message dans la session
        $_SESSION['message'] = 'Produit ajouté au panier';

        // On redirige vers la fiche produit
        header('Location: /details.php?id=' . $_POST['meal_id']);
        die;

    }
}
else // Sinon on redirige vers la page d'accueil
{
    header('Location: /');
    die;
}