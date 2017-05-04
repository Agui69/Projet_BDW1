<?php
$joueur=$_GET["joueur"];

$connexion = null;

try{
$connexion = mysqli_connect("localhost", "p1503762","Lilkha04", "L2IF07");
 if (mysqli_connect_errno()) {
	printf("Échec de la connexion : %s<br>", mysqli_connect_error());
 	exit();
 }
 return $c;
 } 
 

// On définit la requête
$sql="SELECT etat FROM synchroAffichage  WHERE joueur='" . $joueur . "'";

// On envois la requète
$result = mysqli_query($connexion, $sql);

if($row = mysqli_fetch_array($result))
  {
        echo $row['etat'];
  }

mysqli_close($connexion);

?>

