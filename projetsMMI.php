<?php
session_start(); 
include_once("php/code.php");
require("php/database.php"); 
$user = new Users; 
?>


<?php 
	include_once("header.php"); 

	// Récupération du nom de l'étudiant pour le titre
	$request = "SELECT * FROM Users WHERE username='".$_GET["nom"]."'"; 
	$resultat = $db->query($request);
	        
	$etudiant = $resultat->fetch();
?>



<div>
	
	<h2>Portfolio de <?php echo $etudiant['username'];?> </h2>
	<div> 
		<h3> <?php echo $etudiant['username'];?> </h3>
    	<p> <?php echo $etudiant['description'];?> </p>
	</div>

	<h2>Projets</h2>
	<br/>

    
    <?php 
		$reponse = $db->query('SELECT * FROM projets WHERE user='.$etudiant["id"]); // Récupération des projet de l'étudiant
        $projets = $reponse->fetchAll();
		$adresse=" ";
	?>



	<?php 
        foreach ($projets as  &$projet) {
            ?>
            <div class="row">
                <div class="card">
                    <h5 class="card-header"><?php echo $projet['titre']; ?></h5>
                    <div class="card-body">
                        <p class="card-text"><?php echo $projet['contenu'];; ?></p>
                        <?php $adresse="modifprojet.php?idp=".$projet['id']; ?>
                        <a href= <?php echo $adresse ?> class="btn btn-primary">Modifier ce projet</a>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>


	<?php if(isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"]==$etudiant['username']) //si un utilisateur est connecté ET que cet utilisateur correspond à l'étudiant présenté dans cette page
		{ 
		?>
			<hr/>
			<a href= "nouveauprojet.php" class="btn btn-secondary" >Ajouter un projet</a>
    	<?php  
		}
		?>

        
	</div>


<?php include_once("footer.php"); ?>
	
