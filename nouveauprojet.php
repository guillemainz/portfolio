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
		header('Location: index.php');
	    exit();
	}
?>

<?php include_once("header.php"); ?>

<h2>Nouveau projet: </h2>

<form action="nouveauprojet.php" method="post"> 
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" placeholder="Entrez du texte" name="titre" required>
    </div>
    <div class="form-group">
        <label for="contenu">Contenu</label>
        
        <textarea class="form-control" rows="5" name="contenu" placeholder="Entrez du texte" required> </textarea>
    </div>
    <button type="submit" name="submit" value="OK" class="btn btn-primary">Envoyer</button>
</form>



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
					header('Location: index.php');
	    			exit();
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
