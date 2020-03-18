<!-- Ce document définit les classes et les fonctions PHP; il ne fait pas afficher de page, il ne contient aucun HTML -->

<?php
require("database.php"); //ajoute au début le code du fichier database.php

class Users { //définition de la classe Users qui contient des fonctions
    function get_user($id) 
    {
        global $db; //globaliser la variable db (objet pdo) venant du fichier database.php 

        $request = "SELECT * FROM Users WHERE id=$id"; //selectionner dans Users tous les éléments où l'id est égal à la variable passée en paramètre de cette fonction
        $resultat = $db->query($request); //stocker dans "resultat" le resultat de la requête "request" appliquée sur "db"
        $user = $resultat->fetch(); //mettre le resultat dans "user" - fetch permet de convertir le resultat de la requete en un truc utilisable

        return($user); //retourner la valeur contenue dans user, cad le resultat de request, cad tous les éléments de Users où l'id est égal à la variable passée en paramètre
    }

    function connect($username, $password)
    {
        global $db;
        $request = "SELECT * FROM Users WHERE username='$username'"; 
        $resultat = $db->query($request);
        $user = $resultat->fetch();
        //meme chose mais avec le username et le password

        if(password_verify($password, $user["password"])) //si le mdp entré est égal au mdp correspondant au user ATTENTION il va falloir écrire cette fonction moi même!
        {
            session_start(); //fonction existant déjà dans php?
            $_SESSION["account"] = ['id' => $user["id"],'username' => $user["username"] ]; //attribuer à la case account de cette session heeeeu y'a trop d'actions en même temps', ça veut dire quoi => ?

            header('Location: /');
        }
        else
        {
            echo("Impossible de se connecter"); //sinon afficher le message d'erreur
            
        }
    }

    function create ($username, $password)
    {
        global $db;
        $user=new Users();
        $request = "INSERT INTO `users` (`username`, `password`) VALUES (?, ?)";  //créé une requete pour inserer un nouvel user
        $resultat = $db->prepare($request); //preparer la requete (convertit le string en un truc gérable par php)
        $db->execute ([$username, $password]);   //remplacer la point d'interro (qui sont une mesure de sécurité) par la valeur des variables
    }   $user->connect($username, $password); //appeler la fonction connect avec le nouveau login-password
}
?>


