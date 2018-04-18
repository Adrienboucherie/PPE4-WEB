<?php

session_start();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');

if (isset($_SESSION['idUAdmin']) && isset ($_SESSION['mdpUAdmin'])) {
    $isSession = true;
    $pageConsultationVisite = new pageSecurisee("Visite");
}

$pageConsultationVisite->script = 'jquery-3.0.0.min';
//$pageConsultationHebergements->script = 'ajaxRecupHebergements'; //pour gerer par l'AJAX le clic de la case � cocher et afficher les commentaires correspondants

$pageConsultationVisite->contenu .= 'test';