<!DOCTYPE html>

<?php
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php

$user = new Users; //créé automatiquement un nouvel objet (vide) de classe user en début de session (cf code.php) - pas utile dans cette page?
?>

<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<h1>Portfolios en ligne</h1>

<div>
    Bonjour <?php if(isset($_SESSION["account"]["username"])) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
    {
        echo($_SESSION["account"]["username"]); //afficher l'account et le username à la suite de Bonjour

    }
    else
    {
        echo "visiteur non connecté"; //sinon afficher "visiteur non connecté" à la suite de Bonjour
        ?>
        <button type="button" onclick=window.location.href='http://localhost/W17%20-%20PHP/login.php' >Se connecter</button> 
        <?php
    }
    ?>
</div>

<nav>
  <h3><a href="index.php">Accueil</a> | <a href="login.php">Login</a></h3>
</nav> 


</html>