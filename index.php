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
        <p id="Presentation"> Bienvenue dans les portfolios en ligne de MMI! Vous pouvez ici voir les différents projets réalisés par nos étudiant. Cliquez sur un étudiant pour voir ses réalisations! <br/><br/> Si vous êtes étudiant, connectez vous via la page login pour pouvoir modifier votre contenu. <br/>(note à l'attention de Mr Judic: le mdp est identique au username) <br/><br/> <b>Bonne découverte!</b>
        </p>
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
                            <?php 
                            if(isset($_SESSION["account"]["username"])&&$_SESSION["account"]["username"]===$user['username']) //si les éléments "account" et "username" du tableau SESSION ont une valeur alors
                            {
                                ?>        
                                <a href="modifdescrip.php" class="btn btn-secondary">Modifier votre description</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>


</div>

<?php include_once("footer.php"); ?>