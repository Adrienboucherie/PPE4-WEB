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

$pageConsultationHebergements->contenu .= '<div class="row">';
				
//parcours du résultat de la requete
$listeheb=listeHebergements();

foreach ($listeheb as $unHeb){
							$pageConsultationHebergements->contenu .= '<div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../VUE/Image/'.$unHeb->image_heb.'">
                <div class="card-body">
                <label>'.$unHeb->nom_heb.'</label>
                  <p class="card-text">'.$unHeb->description_heb.'</p>
                  <div class="d-flex justify-content-between align-items-center">
                    Adresse: '.$unHeb->adresse_heb.', '.$unHeb->ville_heb.'
                    </div>
                    <small class="text-muted">';
                    switch($unHeb->nbetoile){
                    	case "1" :
                    $pageConsultationHebergements->contenu .='<img class ="image" id="etoile" src="./Image/etoiles/1etoile.png" alt="Appréciation">';
                    break;
                    	case "2":
                    $pageConsultationHebergements->contenu .='<img class ="image" id="etoile" src="./Image/etoiles/2etoiles.png" alt="Appréciation">';
                    break;
                    	case "3":
                    $pageConsultationHebergements->contenu .='<img class ="image" id="etoile" src="./Image/etoiles/3etoiles.png" alt="Appréciation">';
                    break;
                    	case "4":
                    $pageConsultationHebergements->contenu .='<img class ="image" id="etoile" src="./Image/etoiles/4etoiles.png" alt="Appréciation">';
                    break;
                    	case "5":
                    $pageConsultationHebergements->contenu .='<img class ="image" id="etoile" src="./Image/etoiles/5etoiles.png" alt="Appréciation">';
                    break;
                    }
                    	$pageConsultationHebergements->contenu .='</small>
                  </div>
                </div>
              </div>
           ';






					/*$pageConsultationHebergements->contenu .= '<tr><td>'.$unHeb->nom_heb.'</td><td>'.$unHeb->adresse_heb.'</td>
					<td>'.$unHeb->ville_heb.'</td><td><div class="row"><div class="col-md-1">'.$unHeb->nbetoile.'</div><div class="col-md-1"><img class ="image" id="etoile" src="./Image/etoile.png" alt="Appréciation"></div></div></td><td>'.$unHeb->description_heb.'</td></tr>';*/
				}
				$pageConsultationHebergements->contenu .= '</div>';
$pageConsultationHebergements->afficher();
?>