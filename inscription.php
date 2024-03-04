<?php

// On vérifie si l'utilisateur est en train de valider son panier
if(str_contains($_SERVER['HTTP_REFERER'], 'panier.php'))
{
    // Si c'est le cas on le redirige vers la page d'adresses
    header('Location: /protected/adresse.php');
    die;
}

// Vérifie que le formulaire à bien été envoyé
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registering_form_submit']))
{

    // Permettra de stocker les messages d'erreurs au fur-et-à-mesure
    $errors = [];

    // Validation du champs "NOM"
    if(empty($_POST['lastname']) || strlen($_POST['lastname']) <= 1)
    {
        $errors['lastname'] = 'Le champs NOM ne doit pas être vide et doit contenir plus d\'un caractère';
    } 

    // Validation du champs "Prénom"
    if(empty($_POST['firstname']) || strlen($_POST['firstname']) <= 1)
    {
        $errors['firstname'] = 'Le champs Prénom ne doit pas être vide et doit contenir plus d\'un caractère';
    }

    // Validation du champs "Email"
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = 'Le champs Email est obligatoire et doit être une adresse email valide';
    }

    var_dump(preg_match('/[a-zA-Z0-9\!\@\$\€\*\^\§\%\&]{16,32}/', $_POST['password']));
    exit;

    // Validation du champs "Password"
    if(empty($_POST['password']) || !preg_match('/[a-zA-Z0-9\!\@\$\€\*\^\§\%\&]{16,32}/', $_POST['password']))
    {
        $errors['password'] = 'Le mot de passe est obligatoire et doit contenir entre 16 et 32 carcatères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.';
    }

    if(!isset($_POST['cgu']))
    {
        $errors['cgu'] = 'Vous devez accepter les conditions générales d\'utilisation';
    }

    if(empty($errors))
    {
        require 'data/db-connect.php';
        // Vérification de l'email en BDD
        $email = $_POST['email'];
        $query = $dbh->prepare("SELECT id_customer FROM customer WHERE email = :email");
        $query->execute(['email' => $email]);
        $customerId = $query->fetch();

        if($customerId)
        {
            $errors['email'] = 'Un compte existe déjà pour cette adresse email.';
        }
        else
        {
            $salt = "dw1";
            $query = $dbh->prepare("INSERT INTO customer (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $query->execute([
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'] . $salt, PASSWORD_DEFAULT)
            ]);

            if($dbh->lastInsertId())
            {
                header('Location: /connexion.php');
                exit;
            }
            else
            {
                $errors['form'] = "Une erreur s'est produit lors de l'inscription. Contacter l'administrateur à l'adresse [email].";
            }
        }
    }   
}


require 'templates/inscription.html.php';
