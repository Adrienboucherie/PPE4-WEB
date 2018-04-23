<?php
session_start ();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');

if (isset ( $_SESSION ['idU'] ) && isset ( $_SESSION ['mdpU'] )) {
	$pageIndex = new PageSecurisee ( "SECURISE" 	);
} else {
	$pageIndex = new PageBase ( "PUBLIC" );
}

$pageIndex->contenu = '<b style="font-size: 30px">BIENVENUE SUR STARS \'UP !</b>
</br><p> Stars \'Up est une entreprise en collaboration avec le secrétaire d\'Etat chargé de la promotion du tourisme.</p>
<p>Notre but est de noter les hébergements de vacances en France (Hôtels, Camping et Chambres d\'Hôtes) qui veulent obtenir des étoiles suplémentaires pour la saison estivale 2018.</p>'; 
$pageIndex->afficher();

?>
