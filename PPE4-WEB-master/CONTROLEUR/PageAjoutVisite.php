<?php

require_once ('../MODELE/InspecteurMODELE.class.php');



$EQUMod = new InspecteurMODELE();

$EQUMod->insertionInspecteurs($_POST['id_heb'], $_POST['ID_insp'], $_POST['DateV']);



echo '<script type="text/javascript">document.location.replace("../VUE/ConsultationHebergements2.php");
alert("Visite crée");</script>';



?>