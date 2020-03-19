<!DOCTYPE html>

<?php
session_start(); //démarre une nouvelle session
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php
?>


<?php
	$etudiant=" ";
	$titre=" ";
	$contenu=" ";

	if (isset($_SESSION["account"]["id"])) {
		$idetudiant = $_SESSION["account"]["id"];
	}
	else {
		echo "Pas d'étudiant défini";
		//header('Location: index.php');
	    //exit();
	}
?>

<html lang="fr">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Ajouter Projet</title>
	</head>

	<?php include_once("header.php"); ?>

	<body>
		<form action="nouveauprojet.php" method="post">
			<div>
				<h2>Nouveau projet: </h2>

				<label for="titre"><b>Titre: </b></label>
				<input type="text" placeholder="Tapez du texte" name="titre" required size="100">
				<br/>
				<label for="contenu"><b>Contenu: </b></label>
				<input type="text" placeholder="Tapez du texte" name="contenu" required size="100"> 
				<button type="submit" name="submit" value="OK">Envoyer</button>
			</div>
		</form>
	</body>



<?php

	if(isset($_POST["submit"]))
	{
	    if($_POST["submit"] === "OK") 
		{
	        if($_POST['titre'] != NULL && $_POST['contenu'] != NULL)
	        {
	            $titre=$_POST['titre'];
				$contenu=$_POST['contenu'];

				try {
					$requete="INSERT INTO Projets (titre, contenu, user) VALUES (?,?,?)";
					//$db->exec($requete);

					$insertion=$db->prepare($requete);
					$insertion->execute([$titre, $contenu, $idetudiant]);
					echo "New record created successfully";
				}
				catch(PDOException $e){
			    	echo $requete . "<br>" . $e->getMessage();
			    }


				//$insertion=$db->prepare($requete);
				//$insertion->execute(array($titre, $contenu, $user)); 
	            //header('Location: index.php');
            	//exit();
	        }
	        else
	        {
	            echo("Remplis le formulaire"); 
	        }
		}
	}

?>

</html>