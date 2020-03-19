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
</head>


<h1>Portfolio de Zoé</h1>

<nav>
  <h3><a href="index.php">Accueil</a> | <a href="projetsMMI.php">Projet</a></h3>
</nav> 

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

</html>