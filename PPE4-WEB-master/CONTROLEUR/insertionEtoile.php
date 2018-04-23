<?php
session_start();
require_once ('../MODELE/VisiteMODELE.class.php');


$EQUMod = new VisiteMODELE();

$date=date("Y-m-d");




$EQUMod->insertionEtoile( $_SESSION['ID_HEB'], $_POST['diminutionEtoile'], $_SESSION['idAdmin'], $date, $_POST['DescriptionEtoile']);

echo '<script type="text/javascript">document.location.replace("../VUE/ConsultationHebergements2.php");
alert("Note prise en compte");</script>';



?>