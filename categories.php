<?php

require 'data/db-connect.php';

$query = $dbh->query("SELECT category.*, meal.photo FROM category LEFT JOIN meal ON category.id_category = meal.id_category GROUP BY category.id_category");
$categories = $query->fetchAll();

require 'templates/categories.html.php';