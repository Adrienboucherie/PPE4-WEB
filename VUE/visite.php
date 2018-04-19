<?php

session_start();
require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageAdmin.class.php');

require_once ('../CONTROLEUR/affichage_hebergements.php');
require_once ('../CONTROLEUR/affichage_inspecteurs.php');


if (isset($_SESSION['idUAdmin']) && isset ($_SESSION['mdpUAdmin'])) {
    $isSession = true;
    $pageConsultationVisite = new pageAdmin("Visite");
}

$pageConsultationVisite->script = 'jquery-3.0.0.min';
//$pageConsultationHebergements->script = 'ajaxRecupHebergements'; //pour gerer par l'AJAX le clic de la case � cocher et afficher les commentaires correspondants
$listeheb=listeHebergementsALL();
$listeInsp=ListeInspecteurs();
$pageConsultationVisite->contenu.='<div class="col-md-3"><select class="form-control">
  <option disabled selected>selectionner un établissement</option>';
  foreach ($listeheb as $heb) {
  	$pageConsultationVisite->contenu.='<option value="'.$heb->id_heb.'">'.$heb->nom_heb.'</option>';
  }
  $pageConsultationVisite->contenu.='</select></div>
  <div class="col-md-3"><select class="form-control">
  <option disabled selected>selectionner un inspecteur</option>';
 
  foreach($listeInsp as $insp){
  	$pageConsultationVisite->contenu.='<option value="'.$insp->id.'">'.$insp->nom.' '.$insp->prenom.'</option>';
  }
$pageConsultationVisite->contenu.='</select>';

$pageConsultationVisite->afficher();