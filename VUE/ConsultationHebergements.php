<?php
session_start();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');
require_once ('../CONTROLEUR/affichage_hebergements.php');


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
          <table class="table table-striped" width=100%>
            <thead>	<tr><th width=25%>Nom de l\'hébergement</th><th width=15%>Adresse</th><th width=15%>Ville</th><th width=5%>Note</th><th width=35%>Description de l\'hébergement</th></tr></thead><tbody>';
//parcours du résultat de la requete
$listeheb=listeHebergements();

foreach ($listeheb as $unHeb){
					$pageConsultationHebergements->contenu .= '<tr><td>'.$unHeb->nom_heb.'</td><td>'.$unHeb->adresse_heb.'</td>
					<td>'.$unHeb->ville_heb.'</td><td><div class="row"><div class="col-md-1">'.$unHeb->nbetoile.'</div><div class="col-md-1"><img class ="image" id="etoile" src="./Image/etoile.png" alt="Appréciation"></div></div></td><td>'.$unHeb->description_heb.'</td></tr>';
				}
				$pageConsultationHebergements->contenu .= '</tbody></thead></table></div>';
$pageConsultationHebergements->afficher();
?>