<?php

/********************  EXO 1 *******************/

function creerCarte($c){ 
$couleur = array('coeur', 'carreau', 'pique', 'trèfle');
$valeurpoint = array('7' => 0, '8' => 0, '9' => 0, '10' => 10, 'Valet' => 2,
 'Dame' => 3, 'Roi' => 4, 'As' => 11);

 for( $i = 0; $i < 4 ; $i++){
	
	foreach( $valeurpoint as $v => $p){
		$n = "./imgCartes/".$couleur[$i] . "_".$v .".PNG";
		$q = "INSERT INTO carte (valeur, couleur, points, image)
		 VALUES ('$v', '$couleur[$i]', $p, '$n')";
		mysqli_query($c,$q);
		//echo "$q<br>";
	}
}
	echo "cartes insérées!";
}


function majPointsCarte($atout,$c){ 

		$q1 = "UPDATE carte SET points = 0 WHERE valeur = '9'";
		 mysqli_query($c,$q1);
		$q2 = "UPDATE carte SET points = 2 WHERE valeur = 'valet'";
		 mysqli_query($c,$q2);
		$q1 = "UPDATE carte SET points = 14 WHERE valeur = '9' 
		AND couleur = '".$atout."'";
		 mysqli_query($c,$q3);
		$q4 = "UPDATE carte SET points = 20 WHERE valeur = 'valet' 
		AND couleur = '".$atout."'";
		 mysqli_query($c,$q4);
		//echo "$q";
	
	echo "cartes modifiées!";
}


function distribueCarte($nbCarte){ 
		global $c; 
		$nbJoueur = 4;
		$valeur = "";
	    $couleur = "";
	        
		
		/* création d'une table temporaire contenant les cartes restant à
		  distribuer  */
		$q = "CREATE TABLE TMP_CARTE (valeur, couleur) AS SELECT valeur, carte FROM CARTE";
		 mysqli_query($c,$q);
			
		for( $i = 0 ; $i < $nbCarte ; $i++ ){

			for( $j = 0 ; $j < $nbJoueur ; $j++ ){
		
		
		/* Récupération d'une carte choisie aléatoirement */	
		$q = "SELECT valeur, carte FROM TMP_CARTE ORDER BY RAND() LIMIT 1";
		$r = mysqli_query($c,$q);
		if( $t = mysqli_fetch_assoc($r)){
	        $valeur = $t['valeur'];
	        $couleur = $t['couleur'];
	     
	     
		$qi = "INSERT INTO MAIN (joueur, valeur, couleur) VALUES ("joueur" . $j , $valeur, $couleur)";
		 mysqli_query($c,$qi);
	     
		$qd = "DELETE FROM TMP_CARTE WHERE valeur = '" . $valeur. "' AND couleur = '" . $couleur. "'";
		 mysqli_query($c,$qd);
	     	
		
		}	
			
		
	echo "$nbCartes cartes distribuées aux $nbJoueurs joueurs!";
}


/********************  EXO 2 *******************/

function printCarte($val, $coul, $c){
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


/****************  CSS ******************/
.carte{
	border: 2px solid;
	border-radius : 20px;
	background-color: white;
	width : 200px;
	height : 250px;
}

.valcoul{
	margin-top : 10%;
	font-weight: bold;
	font-size: 18pt;
	text-align : center;
	width : 100%;
}

.pts{
	font-style: italic;
	font-size: 14pt;
	text-align : center;
	width : 100%;
}

.imgcarte{
	margin-left : 30%;
	width : 40%;
	margin-top: 10%;
	margin-bottom: 10%;
	
	
}



// Pour la fonction 'printCarte'

function printCarte($val, $coul, $c){

...
    $ca =  "<div class='carte'>";
    $ca .= "<div class='contenucarte'>";
    $ca .=  "<div class='valcoul'>$valeur de $couleur</div>";
    $ca .=  "<img class='imgcarte'src='$image' alt='carte'/>";
    if( $points > 1 ){
        $ca .=  "<div class='pts'>$points points</div>";
    }else{
        $ca .=  "<div class='pts'>$points point</div>";
    }
    $ca .= "</div>";
    $ca .= "</div>";
...
}
// Pour le CSS


.contenucarte{
    visibility :hidden;
    cursor: pointer;
}

div.carte:hover .contenucarte{
    cursor: pointer;
    visibility : visible;
}

// Attention: pour div.carte:hover  le div est nécessaire sur FireFox!
 
?>

