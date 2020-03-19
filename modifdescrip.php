<?php
session_start(); //démarre une nouvelle session
include_once("php/code.php");
require("php/database.php"); //ajoute au début le code du fichier database.php
?>

<!-- CETTE PAGE NE MARCHE PAS -->

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


<div class= "container">

	<div class="row">
		<h1>Modifier la description</h1>
	</div>

	<div class="row">
		<h2>Description actuelle: </h2>
		<p> <?php echo $description['description'];?></p>
	</div>


	<form action="modifdescrip.php" method="post"> <!-- formulaire qui appelle la page login.php, cad la page où on est actuellement; donc le formulaire rappelle le php ci dessus, mais cette fois en lui passant en paramètre le contenu du formulaire -->
		<div class="form-group">
			<label for="ndescrip">Username</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrez du texte" name="ndescrip" required>
		</div>
	  	<button type="submit" name="submit" value="OK" class="btn btn-primary">Envoyer</button>
	</form>

<!--
	<form action="modifdescrip.php" method="post">
	<div>
		<h2>Nouvelle description: </h2>
		<input type="text" placeholder="Tapez du texte" name="ndescrip" required size="100"> 
		<input type="hidden"  name="nom" value="<?php //echo $nom; ?>">
		<button type="submit" name="submit" value="OK">Envoyer</button>
	</div>
	</form>
-->

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

</div>

<?php include_once("footer.php"); ?>