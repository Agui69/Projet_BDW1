<?php 
include (".BDW1/Projet_BDW/init.php");
include (".BDW1/Projet_BDW/Carte.php");
include (".BDW1/Projet_BDW/listings.php");
include (".BDW1/Projet_BDW/partie.php");
include (".BDW1/Projet_BDW/statistiques.php");


session_start();
echo '<p>Salut Agui</p>';
echo '<!DOCTYPE html>
<html>
<head>
	<metacharset="UTF8">
	<title>Accueil</title>
	
</head>
<body>
	<label for="id1">Pseudo :</label>
	<input id="id1" type="text" name="nom_input"/>
	<p></p><label for="id2">Mot de Passe:</label>
	<input id="id2" type="password" name="nom_input"/>
	<p></p>
	<label for="id3"></label>
	<input id="id3" type="submit"value="Se connecter">
	<header>
		<nav>
		
		
		</nav>
	</header>
	<section>
		<article>
		
		<article>
	
	</section>
	<footer>Copyright Daryl & Agui </footer>
</body>
</html>'
include (".BDW1/Projet_BDW/end.php");
?>
