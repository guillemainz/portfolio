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
	<title>Portfolios MMI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>

<div class="container">
<div class="row align-items-center">
    <div class="col-lg-8">
        <h1 class="row">Portfolios MMI en ligne</h1>

    </div>

    <div class="col-lg-4 text-right">
        <?php if(isset($_SESSION["account"]["username"])) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
        {
            echo($_SESSION["account"]["username"]); //afficher l'account et le username à la suite de Bonjour
            ?>
            <button type="button" class="btn btn-secondary" onclick=window.location.href='login.php' >Déconnexion</button> 
        <?php
        }
        else
        {
            echo "non connecté"; //sinon afficher "visiteur non connecté" à la suite de Bonjour
            ?>
            <button type="button" class="btn btn-secondary" onclick=window.location.href='login.php' >Se connecter</button>     
   
        <?php
        }
        ?>

    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a> </li> 
        <li class="nav-item active"> <a class="nav-link" href="login.php">Login</a></li>
    </ul>
  </div>
</nav>




