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
$listeheb=listeHebergementsALL();
$listeInsp=ListeInspecteurs();
$pageConsultationVisite->contenu.='<form action="../CONTROLEUR/PageAjoutVisite.php" method="POST"><div class="col-md-3"><select id="id_heb" name="id_heb" class="form-control">
  <option disabled selected>selectionner un établissement</option>';
  foreach ($listeheb as $heb) {
  	$pageConsultationVisite->contenu.='<option value="'.$heb->id_heb.'">'.$heb->nom_heb.'</option>';
  }
  $pageConsultationVisite->contenu.='</select></div>
  <div class="col-md-3"><select id="ID_insp" name="ID_insp" class="form-control">
  <option disabled selected>selectionner un inspecteur</option>';
 
  foreach($listeInsp as $insp){
  	$pageConsultationVisite->contenu.='<option value="'.$insp->id.'">'.$insp->nom.' '.$insp->prenom.'</option>';
  }
$pageConsultationVisite->contenu.='</select><input id="DateV" name="DateV" class="btn btn-secondary" type="date">
<input type="submit" id="submit" class="btn btn-secondary" value="Créer la visite"></form>';

$pageConsultationVisite->afficher();