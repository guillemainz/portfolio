<!DOCTYPE html>

<?php
session_start(); //démarre une nouvelle session
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php
?>


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


$request="SELECT * FROM Projets WHERE id=:projectid AND user=:userid";
$resultat = $db->prepare($request);
$resultat->execute(array(':projectid' => $idp, ':userid' => $_SESSION["account"]["id"]));
$projet = $resultat->fetch();


?>

<div class="container">

	<div class="row">
		<h1>Modifier le projet</h1>
	</div>

	<div>
		<h2>Contenu actuel: </h2>
		<h3><?php echo $projet['titre'];?></h3><br/>
		<p><?php echo $projet['contenu'];?></p><br/>
	</div>


	<form action="modifprojet.php" method="post"> <!-- formulaire qui appelle la page login.php, cad la page où on est actuellement; donc le formulaire rappelle le php ci dessus, mais cette fois en lui passant en paramètre le contenu du formulaire -->
	    <div class="form-group">
	        <label for="ntitre">Titre</label>
	        <input type="text" class="form-control" placeholder="<?php echo $projet['titre'];?>" name="ntitre" required>
	    </div>
	    <div class="form-group">
	        <label for="ncontenu">Contenu</label>
	        <textarea class="form-control" rows="5" name="ncontenu" required> <?php echo $projet['contenu'];?> </textarea>
	    </div>
	    <input type="hidden"  name="idp" value="<?php echo $idp; ?>">
	    <button type="submit" name="submit" value="OK" class="btn btn-primary">Envoyer</button>
	</form>

</div>




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
	            header('Location: index.php ');
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

