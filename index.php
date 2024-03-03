<?php 

session_start();

require 'data/db-connect.php';

$title = "Accueil";

// Pagination

$nbPerPage = 12;

if(!empty($_GET['search']))
{
    $search = strtolower($_GET['search']);
    $query = $dbh->query("SELECT COUNT(*) AS nbmeals FROM meal WHERE name LIKE '%$search%'");
}
else
{
    $query = $dbh->query("SELECT COUNT(*) AS nbmeals FROM meal");
}


$nbPages = ceil($query->fetch()['nbmeals'] / $nbPerPage);
$start = 0;
$currentPage = 1;

if(!empty($_GET['page']))
{
    $start = $_GET['page'] * $nbPerPage - $nbPerPage;
    $currentPage = $_GET['page'];
}

// Traitement du formulaire de recherche si une recherche est faite
if(!empty($_GET['search']))
{
    $search = strtolower($_GET['search']);
    $query = $dbh->query("SELECT * FROM meal WHERE name LIKE '%$search%' ORDER BY name ASC LIMIT $start,$nbPerPage");
    $meals = $query->fetchAll();

    // namebre de résultats totales
    $query = $dbh->query("SELECT COUNT(*) AS resultCount FROM meal WHERE name LIKE '%$search%'");
    $resultCount = $query->fetch()['resultCount'];
}
else
{

    $query = $dbh->query("SELECT * FROM meal ORDER BY name ASC LIMIT $start,$nbPerPage");
    $meals = $query->fetchAll();
}

// Affichage du template HTML
require 'templates/home.html.php';