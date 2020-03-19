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
	<title>Projets</title>
</head>

<?php 
	include_once("header.php"); 

	// Récupération du nom de l'étudiant pour le titre
	$request = "SELECT * FROM Users WHERE username='".$_GET["nom"]."'"; 
	$resultat = $db->query($request);
	        
	$etudiant = $resultat->fetch();
?>

<body>

	<div>
		<h2>Projets</h2>
		<br/>
		
		<h2>Portfolio de <?php echo $etudiant['username'];?> </h2>
		<div> 
			<h3> <?php echo $etudiant['username'];?> </h3>
        	<p> <?php echo $etudiant['description'];?> </p>
		</div>

        
        <?php 
			$reponse = $db->query('SELECT * FROM projets WHERE user='.$etudiant["id"]); // Récupération des projet de l'étudiant
	        $projets = $reponse->fetchAll();
			$adresse=" ";
		?>

	
		<?php 
	    //while ($projets = $reponse->fetch()) {
		foreach ($projets as  &$projet) {
	        ?>
	        <div>
		        <h3> <?php echo $projet['titre']; ?> </h3>
		        <p> <?php echo $projet['contenu']; ?> <p>

		        <?php if(isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"]==$etudiant['username']) //si un utilisateur est connecté ET que cet utilisateur correspond à l'étudiant présenté dans cette page
		    	{ 
		    		$adresse="modifprojet.php?idp=".$projet['id']; ?>
		    		<a href= <?php echo $adresse ?> >Modifier ce projet</a> <br/>
		        <?php  
		    	} ?>
	    	</div>
	    <?php
	    } 
	    ?>
    

    	<?php if(isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"]==$etudiant['username']) //si un utilisateur est connecté ET que cet utilisateur correspond à l'étudiant présenté dans cette page
    		{ 
    		?>
    			<a href= "nouveauprojet.php" >Ajouter un projet</a>
        	<?php  
    		}
			?>

        
	</div>

</body>

<?php include_once("footer.php"); ?>
	
</html>