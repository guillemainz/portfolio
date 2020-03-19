<?php require("php/database.php"); ?>

<!DOCTYPE html>
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
		$reponse2 = $db->query('SELECT * FROM projets WHERE id='.$etudiant["id"]);
        //$donnees2 = $reponse1->fetch();
        

        while ($projets = $reponse2->fetch()) {
                    ?>
                    <h3> <?php echo $projets['titre']; ?> </h3> <br/> 
                    <p> <?php echo $projets['contenu']; ?> <p> <br/> 
        <?php } ?>

	</div>

</body>

<?php include_once("footer.php"); ?>
	
</html>