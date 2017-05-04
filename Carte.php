<?php // Ne marche pas 
include (".BDW1/Projet_BDW/init.php");

// Fonction pour aficher une carte peut etre à changer ?
function AfficherCarte($valeur_carte,$couleur_carte){
	$valeur = null;
	$couleur = null;
	$points = null;
	$image = null;

	// récupération des données
	$r = mysqli_query($c, "SELECT * FROM carte WHERE valeur='$val' AND couleur='$coul';");
	while($t = mysqli_fetch_assoc($r)){
	$valeur = $t['valeur'];
	$couleur = $t['couleur'];
	$points = $t['points'];
	$image = $t['image'];
	}
	$ca =  "<div class='carte'>";
	$ca .=  "<div class='valcoul'>$valeur de $couleur</div>";
	$ca .=  "<img class='imgcarte'src='$image' alt='carte'/>";
	if( $points > 1 ){
		$ca .=  "<div class='pts'>$points points</div>";
	}else{
		$ca .=  "<div class='pts'>$points point</div>";
	}
	$ca .= "</div>";
	
	echo $ca;
}
include (".BDW1/Projet_BDW/end.php");

?>
