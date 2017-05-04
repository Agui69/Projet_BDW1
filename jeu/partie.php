<?php
include (".BDW1/Projet_BDW/init.php");

function afficherMatrice($grille[][]){ // Fonction pour afficher la matrice 10x10
    echo $grille[][];
    for ($i=0;i<11;i++){
        for ($j=0;j<11;j++){
            $grille[][]= new $grille[$i][$j];
        }
    }           
    return $grille;
}            





include (".BDW1/Projet_BDW/end.php");
?>
