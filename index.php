<!-- Ceci est la page d'accueil du site -->

<?php
session_start(); //démarre une nouvelle session
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php

$user = new Users; //créé automatiquement un nouvel objet (vide) de classe user en début de session (cf code.php) - pas utile dans cette page?
?>


<?php include_once("header.php"); ?>


<div class= "container">
    
    <div class="row">
        <h2>Accueil</h2>
    </div>

    <div class="row">
        <p id="Presentation">Paragraphe de description du fonctionnement du site. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a. Mauris in leo in lacus semper iaculis eu ut lorem. Nam sodales sagittis lacus, ut sollicitudin eros vehicula eget. Pellentesque tempor porta dui sed elementum. Suspendisse quis dignissim metus. Curabitur dictum feugiat nisi, ac luctus nisi blandit commodo. Praesent vestibulum elit non blandit convallis. Donec lacinia mauris id justo facilisis congue. Nullam elementum ante nibh, eget aliquam nisl malesuada vitae. Etiam vel ornare eros.</p>
    </div>

    <div class="row">

        <?php 
            $request = "SELECT * FROM Users"; 
            $resultat = $db->query($request);
            $users = $resultat->fetchAll();

            foreach ($users as  &$user) {
                ?>
                <div class="row">
                    <div class="card">
                        <h5 class="card-header"><?php echo $user["username"]; ?></h5>
                        <div class="card-body">
                            <p class="card-text"><?php echo $user["description"]; ?></p>
                            <?php $adresse="projetsMMI.php?nom=".$user['username']; ?>
                            <a href= <?php echo $adresse ?> class="btn btn-primary">Voir les projets</a>
                            
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>


    <?php 
    $adresse=" ";
    if(isset($_SESSION["account"]["username"])) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
    {
        $adresse="modifdescrip.php?nom=".$_SESSION["account"]["username"];
        ?>        
        <a href= <?php echo $adresse ?> class="btn btn-secondary">Modifier votre description</a>
        <?php
    }
    ?>

</div>

<?php include_once("footer.php"); ?>