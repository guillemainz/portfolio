<!-- Ce document définit les classes et les fonctions PHP; il ne fait pas afficher de page, il ne contient aucun HTML -->

<?php
require("database.php"); //ajoute au début le code du fichier database.php

$dossier;

class Users { //définition de la classe Users qui contient des fonctions
    function get_user($id) 
    {
        global $db; //globaliser la variable db (objet pdo) venant du fichier database.php 

        $request = "SELECT * FROM Users WHERE id=$id"; //selectionner dans Users tous les éléments où l'id est égal à la variable passée en paramètre de cette fonction
        $resultat = $db->query($request); //stocker dans "resultat" le resultat de la requête "request" appliquée sur "db"
        $user = $resultat->fetch(); //mettre le resultat dans "user" - fetch permet de convertir le resultat de la requete en un truc utilisable

        return($user); //retourner la valeur contenue dans user, cad le resultat de request, cad tous les éléments de Users où l'id est égal à la variable passée en paramètre
    }

    function password_verify($password_a_verif, $password_connu)
   {
        //echo ("password à vérifier: ".$password_a_verif."<br/>");
        //echo ("password connu: ".$password_connu."<br/>");
        //echo ("comparaison: ".($password_a_verif===$password_connu)."<br/>");

        return $password_a_verif===$password_connu;
   }

    function connect($username, $password)
    {
        global $db;
        $request = "SELECT * FROM Users WHERE username='$username'"; 
        $resultat = $db->query($request);
        $user = $resultat->fetch();
        //meme chose mais avec le username et le password
        echo ($user["password"]);
        password_verify($password, $user["password"]);

        if($this->password_verify($password, $user["password"])) //si le mdp entré est égal au mdp correspondant au user 
        //password_verify s'applique à l'objet user, vu qu'on est déjà dans la classe user il faut dire à la fonction qu'elle s'aplique à l'objet actuel
        {
            session_start(); //fonction existant déjà dans php
            $_SESSION["account"] = ['id' => $user["id"],'username' => $user["username"] ]; //attribuer à la case account de cette session heeeeu y'a trop d'actions en même temps', ça veut dire quoi => ?

            header('Location: http://localhost/W17%20-%20PHP/index.php');
            exit();
        }
        else
        {
            echo("Impossible de se connecter"); //sinon afficher le message d'erreur

        }
    }

    function create ($username, $password)
    {
        global $db;
        $request = "INSERT INTO `users` (`username`, `password`) VALUES (?, ?)";  //créé une requete pour inserer un nouvel user
        $resultat = $db->prepare($request); //preparer la requete (convertit le string en un truc gérable par php)
        $db->execute ([$username, $password]);   //remplacer la point d'interro (qui sont une mesure de sécurité) par la valeur des variables
        $this->connect($username, $password); //appeler la fonction connect avec le nouveau login-password
   }

   function deconnexion(){
        echo("Deconnexion");
        //session_reset();
        session_destroy();
        header('Location: /index.php');
        exit();
   }

   

}
?>


