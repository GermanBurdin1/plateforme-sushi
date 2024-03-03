<?php

if(!empty($_GET['id']))
{
    require 'data/db-connect.php';

    // On vérifie si la catégorie existe
    $query = $dbh->query("SELECT * FROM category WHERE category.id_category = " . $_GET['id']);
    $categorie = $query->fetch();

    if($categorie)
    {
        $title = $categorie['name'];
        $description = $categorie['description'];

        $query = $dbh->query("SELECT * FROM meal WHERE id_category = " . $categorie['id_category']);
        $meals = $query->fetchAll();

        require 'templates/categorie.html.php';
    }
    else
    {
        header('HTTP/1.0 404 Not Found'); // On change le code de status de la réponse en 404
        require 'templates/404.html.php';
        die;
    }

}
else
{
    header('Location: /');
    die;
}