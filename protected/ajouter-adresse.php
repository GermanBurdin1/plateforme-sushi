<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['address_form_submit'])){
    require '../lib/form.lib.php';
    $errors = checkFormRequiredsFields($_POST);
}
require '../templates/protected/ajouter-adresse.html.php';