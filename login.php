<!-- Ceci est la page de login à laquelle doit renvoyer le bouton login de la page index -->

<?php

session_start();

// Unset all of the session variables.
$_SESSION = array();
session_destroy();


include_once("php/code.php");

$user = new Users; //créer un nouvel utilisateur vide, à qui on va appliquer plus tard la fonction connect
if(isset($_SESSION["account"]["id"]))  //si l'account et l'id existent
{
    header('Location: index.php'); //ca ressemble vaguement à un chemin d'accès de fichier, probablement une redirection vers la racine (index)
}
if(isset($_POST["submit"])) //si on a eu une requête de type POST avec la valeur submit, cad si on a appuyé le bouton envoyer
{
    if($_POST["submit"] === "OK") //si la valeur renvoyée par la requête est OK
{
        if($_POST['uname'] != NULL && $_POST['psw'] != NULL) //si le username et le password ne sont pas nuls
        {
            $user->connect($_POST["uname"], $_POST["psw"]); //appliquer la fonction connect avec ces paramètres à la variable user créée au début de la session
            header('Location: index.php');
            exit();
        }
        else
        {
            echo("Remplis le formulaire"); //sinon demander à remplir le formulaire
        }
}
}
?>

<!-- Ce bout de code php devrait logiquement être APRES l'HTML -->


<?php include_once("header.php"); ?>



<h2>Login</h2> <br/>


<form action="login.php" method="post"> <!-- formulaire qui appelle la page login.php, cad la page où on est actuellement; donc le formulaire rappelle le php ci dessus, mais cette fois en lui passant en paramètre le contenu du formulaire -->
    <div class="form-group">
        <label for="uname">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="uname" required>
    </div>
    <div class="form-group">
        <label for="psw">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="psw" required>
    </div>
    <button type="submit" name="submit" value="OK" class="btn btn-primary">Login</button>
</form>




<!--
<form action="login.php" method="post"> 

<div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required> 

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="submit" value="OK">Login</button>
</div>
</form>

-->


<?php include_once("footer.php"); ?>

