<?php

require_once ('../MODELE/InspecteurMODELE.class.php');

function insertionInspecteur($id_heb, $id_insp, $dateV)
{
$EQUMod = new InspecteurMODELE();
return $EQUMod->insertionInspecteur($id_heb, $id_insp, $dateV); //requete via le modele
}


?>