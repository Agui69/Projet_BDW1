<?php
$bd = ’L2IF72_BD ’ ;
$user = ’<p1612126>’  ;
$passwd = ’<Deejaydayoute971>’  ;
$machine = ’ localhost ’ ;
$connexion = mysqli_connect ( $machine , $user , $passwd , $bd ) ;
i f
( mysqli_connect_errno ()){
//  erreur  s i > 0
printf
( " Echec␣de␣ la ␣ connexion ␣ : ␣\%s " ,  mysqli_connect_error ( ) ) ;
}
?>
