<?php

session_start();

// On vérifie que le paramètre est bien présent dans l'URL
if(isset($_GET['id'])){

    require 'data/db-connect.php';

    $query = $dbh->query("SELECT * FROM meal WHERE id_meal = " . $_GET['id']);
    $meal = $query->fetch();

    if($meal)
    {
        $title = "Détail de " . $meal['name'];
        require 'templates/details.html.php';
    }
    else 
    {
        header('HTTP/1.0 404 Not Found'); // On change le code de status de la réponse en 404
        require 'templates/404.html.php';
        die;
    }


} else {
    // Sinon on redirige vers la page d'accueil
    header('Location: /');
    die;
}
