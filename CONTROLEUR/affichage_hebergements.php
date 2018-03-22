<?php

require_once ('../MODELE/HebergementMODELE.class.php');

function listeHebergements()
{
$EQUMod = new HebergementMODELE();
return $EQUMod->ListeHebergements(); //requete via le modele
}



?>