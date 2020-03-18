<?php

$DB_DSN = "mysql:dbname=portfolio_users;host=localhost";
$DB_USER = "php";
$DB_PASSWORD = "phpmmi";
//l'adresse le login et le password sont mis en dure dans le code donc normalement quand on execute ce code ça nous connecte automatiquement

try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD); //essayer de créer dans la db un objet PDO avec les variables ci dessus, cad essayer de se connecter avec le login password ci dessus
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //donner un attribut exception/message d'erreur à la db
} catch (PDOException $e) {
echo 'Echec de la connexion : ' . $e->getMessage(); //si le try ne marche pas, attraper l'erreur et affciher le message d'erreur correspondant à l'exception définit ci dessus
}

?>