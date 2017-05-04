<?php
$bd = ’L2IF07_BD ’ ;
$user = ’p1503762’  ;
$passwd = ’Lilkha04’  ;
$machine = ’ localhost ’ ;
$connexion = mysqli_connect ( $machine , $user , $passwd , $bd ) ;
if
( mysqli_connect_errno ()){
//  erreur  s i > 0
printf
( " Echec␣de␣ la ␣ connexion ␣ : ␣\%s " ,  mysqli_connect_error ( ) ) ;
}
?>
