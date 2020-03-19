<!-- Ceci est la page d'accueil du site -->

<!DOCTYPE html>
<?php
session_start(); //démarre une nouvelle session
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php

$user = new Users; //créé automatiquement un nouvel objet (vide) de classe user en début de session (cf code.php) - pas utile dans cette page?
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<?php include_once("header.php"); ?>

<body>

    <div>
        <p id="Presentation">Paragraphe de présentation<br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a. Mauris in leo in lacus semper iaculis eu ut lorem. Nam sodales sagittis lacus, ut sollicitudin eros vehicula eget. Pellentesque tempor porta dui sed elementum. Suspendisse quis dignissim metus. Curabitur dictum feugiat nisi, ac luctus nisi blandit commodo. Praesent vestibulum elit non blandit convallis. Donec lacinia mauris id justo facilisis congue. Nullam elementum ante nibh, eget aliquam nisl malesuada vitae. Etiam vel ornare eros.</p>
    </div>
    
    <div>
        <h2>Accueil</h2>

        <ul>
            <li><a href="projetsMMI.php?nom=user1">User 1</a></li>
            <li><a href="projetsMMI.php?nom=user2">User 2</a></li>
            <li><a href="projetsMMI.php?nom=user3">User 3</a></li>
        </ul>
    </div>


    <?php 
    $adresse=" ";
    if(isset($_SESSION["account"]["username"])) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
    {
        $adresse="modifdescrip.php?nom=".$_SESSION["account"]["username"];
        ?>
        <!--<a href="modifdescrip.php?nom=" .<?php $nom ?> >Modifier votre description</a> -->
        <a href= <?php echo $adresse ?> >Modifier votre description</a>
        <?php
    }
    ?>

</body>

<?php include_once("footer.php"); ?>


</html>