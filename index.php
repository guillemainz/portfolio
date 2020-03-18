<!-- Ceci est la page d'accueil du site, il faut y mettre le reste de l'HTML préparé hier -->

<!DOCTYPE html>
<?php
session_start(); //truc de base qu'il faut dans chaque doc
include_once("php/code.php");

$user = new Users; //créé automatiquement un nouvel objet de classe user en début de session (cf code.php) - pas utile dans cette page
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>
    <p>Bonjour <?php if(isset($_SESSION["account"]["username"])) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
    {
        echo($_SESSION["account"]["username"]); //afficher l'account et le username à la suite de Bonjour
    }
    else
    {
        echo "NOT CONNECTED"; //sinon afficher "non connecté" à la suite de Bonjour
        ?>

<!-- mettre ici le bouton permettant envoyant à la page de Login -->



        <?php
    }
        ?></p>
</body>
</html>