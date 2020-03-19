<!DOCTYPE html>

<?php
session_start(); //démarre une nouvelle session
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Description</title>
</head>

<?php include_once("header.php"); 

$nom="";
if (isset($_GET["nom"])) {
	$nom = $_GET["nom"];
}
else if (isset($_POST["nom"])) {
	$nom=$_POST["nom"];
}
else {
	header('Location: index.php');
    exit();
}

$request="SELECT * FROM Users WHERE username='".$nom."'";

$resultat=$db->query($request);
$description=$resultat->fetch();
?>

<body>

	<h1>Modifier la description</h1>

	<div>
		<h2>Description actuelle: </h2>
		<p> <?php echo $description['description'];?></p>
	</div>

	<form action="modifdescrip.php" method="post">
	<div>
		<h2>Nouvelle description: </h2>
		<input type="text" placeholder="Tapez du texte" name="ndescrip" required size="100"> <!--pour faire un champ plus haut il faut du css-->
		<input type="hidden"  name="nom" value="<?php echo $nom; ?>">
		<button type="submit" name="submit" value="OK">Envoyer</button>
	</div>
	</form>

</body>

<?php
	if(isset($_POST["submit"]))
	{
	    if($_POST["submit"] === "OK") 
		{
	        if($_POST['ndescrip'] != NULL) 
	        {
	            $request="UPDATE Users SET description=? WHERE username=?"; //les ? c'est une mesure de sécurité pour éviter que le visiteur injecte du code
	            $update=$db->prepare($request);
	            $update->execute([$_POST['ndescrip'], $nom]);
	            header('Location: index.php');
            	exit();
	        }
	        else
	        {
	            echo("Remplis le formulaire"); 
		}
	}
?>


<?php include_once("footer.php"); ?>

</html>