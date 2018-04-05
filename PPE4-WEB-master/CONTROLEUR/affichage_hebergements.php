<?php

require_once ('../MODELE/HebergementMODELE.class.php');

function listeHebergements()
{
$EQUMod = new HebergementMODELE();
return $EQUMod->ListeHebergements(); //requete via le modele
}

function listeAvis($id_heb){
	$EQUMod= new HebergementMODELE();
	return $EQUMod->ListeAvis($id_heb);
}



?>