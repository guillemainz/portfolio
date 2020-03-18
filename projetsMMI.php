<?php require("php/database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<title>MMI</title>
</head>

<header>
	<h1>Portfolio de Zoé</h1>
	<p>Bienvenue Nom!</p>
</header>

<nav>
  <a href="index.php">Accueil</a> |
  <a href="Assets/projetsMMI.html">Projet</a> |
</nav> 

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


<!--

		<h3>Titre projet 1</h3>
		<p>Description du projet\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a. Mauris in leo in lacus semper iaculis eu ut lorem. Nam sodales sagittis lacus, ut sollicitudin eros vehicula eget. Pellentesque tempor porta dui sed elementum. Suspendisse quis dignissim metus. Curabitur dictum feugiat nisi, ac luctus nisi blandit commodo. Praesent vestibulum elit non blandit convallis. Donec lacinia mauris id justo facilisis congue. Nullam elementum ante nibh, eget aliquam nisl malesuada vitae. Etiam vel ornare eros.</p>
		<br/>

		<h3>Titre projet 2</h3>
		<p>Description du projet\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a. Mauris in leo in lacus semper iaculis eu ut lorem. Nam sodales sagittis lacus, ut sollicitudin eros vehicula eget. Pellentesque tempor porta dui sed elementum. Suspendisse quis dignissim metus. Curabitur dictum feugiat nisi, ac luctus nisi blandit commodo. Praesent vestibulum elit non blandit convallis. Donec lacinia mauris id justo facilisis congue. Nullam elementum ante nibh, eget aliquam nisl malesuada vitae. Etiam vel ornare eros.</p>
		<br/>

		<h3>Titre projet 3</h3>
		<p>Description du projet\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a. Mauris in leo in lacus semper iaculis eu ut lorem. Nam sodales sagittis lacus, ut sollicitudin eros vehicula eget. Pellentesque tempor porta dui sed elementum. Suspendisse quis dignissim metus. Curabitur dictum feugiat nisi, ac luctus nisi blandit commodo. Praesent vestibulum elit non blandit convallis. Donec lacinia mauris id justo facilisis congue. Nullam elementum ante nibh, eget aliquam nisl malesuada vitae. Etiam vel ornare eros.</p>
		<br/>

-->

	</div>

</body>

<footer>
	<h4>Portfolio de Zoé</h4>
	<p>Zoé Guillemain |	MMI20 | Projet PHP</p>
</footer>
	
</html>