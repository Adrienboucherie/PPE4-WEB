<?php
session_start();
require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');
require_once ('../CONTROLEUR/controleur.php');

if (isset ( $_SESSION ['idU'] ) && isset ( $_SESSION ['mdpU'] )) {
	$isSession = true;
	$pageConsultationHebergements = new pageSecurisee ("Consulter les hébergements");
} else {
	$pageConsultationHebergements = new pageBase ("Consulter les Hébergements");
}
$pageConsultationHebergements->script = 'jquery-3.0.0.min';
//$pageConsultationHebergements->script = 'ajaxRecupHebergements'; //pour gerer par l'AJAX le clic de la case � cocher et afficher les commentaires correspondants

$pageConsultationHebergements->contenu = '<section>
					<div class="col-md-6">
          <table class="table table-striped">
            <thead>	<tr><th>Nom Equipe</th><th>son slogan</th><th>son Association</th></tr></thead><tbody>';
//parcours du résultat de la requete

foreach ($listeHeb as $unHeb){
					$pageConsultationHebergements->contenu .= '<tr><td>'.$unHeb->NOM_HEB.'</td>
					<td><input type="radio" onclick="jsClickRadioButton('.$isSession.');" name="idEQU"  id="'.$unHeb->IDHeb.'"  value="'.$unHeb->IDHeb.'" /></td></tr>';
