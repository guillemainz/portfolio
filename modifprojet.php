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
	    <title>Modifier Projets</title>
	</head>

	<?php include_once("header.php"); 

	$idp=" ";
	if (isset($_GET["idp"])) {
		$idp = $_GET["idp"];
	}
	else if (isset($_POST["idp"])) {
		$idp=$_POST["idp"]; //cf l'input caché plus bas
	}
	else {
		echo "Pas d'id de projet défini";
		//header('Location: index.php');
	    //exit();
	}


$request="SELECT * FROM Projets WHERE id='".$idp."'";
$resultat=$db->query($request);
$projet=$resultat->fetch();

?>

<body>
	<h1>Modifier le projet</h1>

	<div>
		<h2>Contenu actuel: </h2>
		<h3><?php echo $projet['titre'];?></h3><br/>
		<p><?php echo $projet['contenu'];?></p><br/>
	</div>

	<form action="modifprojet.php" method="post">
	<div>
		<h2>Nouveau contenu: </h2>

		<label for="ntitre"><b>Titre: </b></label>
		<input type="text" placeholder="Tapez du texte" name="ntitre" required size="100">
		<br/>
		<label for="ncontenu"><b>Contenu: </b></label>
		<input type="text" placeholder="Tapez du texte" name="ncontenu" required size="100"> 

		<input type="hidden"  name="idp" value="<?php echo $idp; ?>"> 
		<button type="submit" name="submit" value="OK">Envoyer</button>
	</div>
	</form>

</body>

<?php
	if(isset($_POST["submit"]))
	{
	    if($_POST["submit"] === "OK") 
		{
	        if($_POST['ntitre'] != NULL && $_POST['ncontenu'] != NULL) 
	        {
	            $request="UPDATE Projets SET titre=?, contenu=? WHERE id=?"; //les ? c'est une mesure de sécurité pour éviter que le visiteur injecte du code
	            $update=$db->prepare($request);
	            $update->execute([$_POST['ntitre'], $_POST['ncontenu'], $idp]);
	            header('Location: index.php');
            	exit();
	        }
	        else
	        {
	            echo("Remplis le formulaire"); 
	        }
		}
	}
?>


<?php include_once("footer.php"); ?>

</html>