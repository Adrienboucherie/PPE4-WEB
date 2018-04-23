<?php
session_start ();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');
require_once ('../Class/PageAdmin.class.php');

if (isset($_SESSION['idUGerant']) && isset($_SESSION['mdpUGerant'])) {
	$pageIndex = new PageSecurisee ("SECURISE");
} 
elseif(isset($_SESSION['idUAdmin']) && isset($_SESSION['mdpUAdmin'])){
	
	$pageIndex = new PageAdmin ("ADMINISTRATEUR");
}
else{
	$pageIndex = new PageBase ("PUBLIC");
}

$pageIndex->contenu = '

<b style="font-size: 30px">BIENVENUE SUR STARS \'UP !</b><br><br>

</br><p> Stars \'Up est une entreprise en collaboration avec le secrétaire d\'Etat chargé de la promotion du tourisme.</p>
<p>Notre but est de noter les hébergements de vacances en France (Hôtels, Camping et Chambres d\'Hôtes) qui veulent obtenir des étoiles suplémentaires pour la saison estivale 2018.</p><br>
	Pour cela rien de plus simple :<br><br>
	<ol>
	<li>Prenez contact avec nous.</li>
	<li>Choisissez une période de visite avec nos inspectreurs.</li>
	<li>Améliorer votre note !</li>
	</ol>'; 
$pageIndex->afficher();

?>
