<?php

require_once ('../MODELE/InspecteurMODELE.class.php');

function ListeInspecteurs()
{
$EQUMod = new InspecteurMODELE();
return $EQUMod->ListeInspecteurs(); //requete via le modele
}




?>