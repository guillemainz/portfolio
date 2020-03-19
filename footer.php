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
	<title>Footer</title>
</head>

    <h3>Portfolio de Zoé</h3>
    <p>Zoé Guillemain | MMI20 | Projet PHP</p>
    <?php
    if(isset($_SESSION["account"]["username"])) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
    { 
        ?>
        <button type="button" onclick= window.location.href='login.php' >Se déconnecter</button>
        <?php
    }
    else {
    	?>
    	<button type="button" onclick=window.location.href='http://localhost/W17%20-%20PHP/login.php' >Se connecter</button>
    	<?php
    }

    ?>

 </html>