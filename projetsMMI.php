<!DOCTYPE html>

<?php
session_start(); 
include_once("php/code.php");
require("php/database.php"); 
$user = new Users; 
?>

<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<title>MMI</title>
</head>

<?php include_once("header.php"); ?>

<body>

	<div>
		<h2>Projets</h2>
		<br/>

		<?php 
		// Récupération du nom de l'étudiant pour le titre
		$request = "SELECT * FROM Users WHERE username='".$_GET["nom"]."'"; 
        $resultat = $db->query($request);
        
        $etudiant = $resultat->fetch();
        ?>

        <h3>Nom: </h3> <?php echo $etudiant['username'];?> <br/>
        <h3>Description: </h3> <?php echo $etudiant['description'];?>
		
        <?php 
        // Récupération des projet de l'étudiant
		$reponse = $db->query('SELECT * FROM projets WHERE id='.$etudiant["id"]);
        //$projets = $reponse->fetch();
        
		$adresse=" ";
        while ($projets = $reponse->fetch()) {
            ?>
            <h3> <?php echo $projets['titre']; ?> </h3> <br/> 
            <p> <?php echo $projets['contenu']; ?> <p> <br/> 

            <?php if(isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"]==$etudiant['username']) //si un utilisateur est connecté ET que cet utilisateur correspond à l'étudiant présenté dans cette page
    		{ 
    			$adresse="modifprojet.php?idp=".$projets['id']; ?>
    			<a href= <?php echo $adresse ?> >Modifier ce projet</a> | 
        	<?php  
    		}
			?>
        <?php 
    	} 
    	?>

    	<?php if(isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"]==$etudiant['username']) //si un utilisateur est connecté ET que cet utilisateur correspond à l'étudiant présenté dans cette page
    		{ 
    			$adresse="nouveauprojet.php?ide=".$etudiant['id']; ?>
    			<a href= <?php echo $adresse ?> >Ajouter un projet</a>
        	<?php  
    		}
			?>

        
	</div>

</body>

<?php include_once("footer.php"); ?>
	
</html>