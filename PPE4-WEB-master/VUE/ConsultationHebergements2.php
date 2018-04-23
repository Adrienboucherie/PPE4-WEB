<?php
session_start();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');
require_once ('../Class/PageAdmin.class.php');
require_once ('../CONTROLEUR/affichage_hebergements.php');
require_once ('../MODELE/HebergementMODELE.class.php');



if (isset($_SESSION['idU']) && isset ($_SESSION['mdpU']) || isset($_SESSION['idUGerant']) && isset ($_SESSION['mdpUGerant'])) {
    $isSession = true;
    $pageConsultationHebergements = new pageSecurisee("Consulter les hébergements");
} else if(isset($_SESSION['idUAdmin']) && isset ($_SESSION['mdpUAdmin'])){
  $pageConsultationHebergements= new pageAdmin("oui");
}
else{
    $pageConsultationHebergements = new pageBase("Consulter les Hébergements");
}
$pageConsultationHebergements->script = 'jquery-3.0.0.min';
//$pageConsultationHebergements->script = 'ajaxRecupHebergements'; //pour gerer par l'AJAX le clic de la case � cocher et afficher les commentaires correspondants

$pageConsultationHebergements->contenu .= '<div class="row">';

//parcours du résultat de la requete
$listeheb=listeHebergements();
foreach ($listeheb as $unHeb){
    $_SESSION['ID_HEB']= $unHeb->id_heb;
    
    $pageConsultationHebergements->contenu .= '<div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../VUE/Image/'.$unHeb->image_heb.'">
                <div class="card-body">
                <label>'.$unHeb->nom_heb.'</label>
                  <p class="card-text">'.$unHeb->description_heb.'</p>
                  <div class="d-flex justify-content-between align-items-center">
                    Adresse: '.$unHeb->adresse_heb.', '.$unHeb->ville_heb.'
                    </div>
                    <small class="text-muted">
                    
                    <div class="modal fade" id="exampleModal'.$unHeb->id_heb.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Avis des inspecteurs - '.$unHeb->nom_heb.'</h5>
                          <p id="id_hebergement">Hebergement n° '.$unHeb->id_heb.'
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <table border=1px>
                          ';
    $listeAvis=listeAvis($unHeb->id_heb);
    $moyenne = 0;
    $nb = 0;
    foreach($listeAvis as $unAvis){
        $nb++;
        $moyenne += $unAvis->nbetoile;
        $pageConsultationHebergements->contenu .= '<tr><td>'.$unAvis->date_visite.'</td><td>';
        switch($unAvis->nbetoile){
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
        $pageConsultationHebergements->contenu .='</td><td>'.$unAvis->commentaire.'</td></tr>';
    }
    $pageConsultationHebergements->contenu .='</table>
                        </div>';
    if(isset($_SESSION['idUAdmin']) && isset ($_SESSION['mdpUAdmin'])){
        $pageConsultationHebergements->contenu .=' 
        <form action="../CONTROLEUR/insertionEtoile.php" method="POST">
                           <label >Veuillez sélectionner un nombre d\'étoile:</label>
                            <select class="form-control" id="diminutionEtoile" name="diminutionEtoile" require>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <optionvalue="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                              <div class="form-group">
                                <label ">Example textarea</label>
                                <textarea class="form-control" id="DescriptionEtoile" name="DescriptionEtoile" minlenght="100" require></textarea>
                              </div>
                              <input type="submit"></input>
                            </form>
                            ';
    }


    $pageConsultationHebergements->contenu .='<div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    ';
    switch(round($moyenne/$nb)){
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
                        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$unHeb->id_heb.'">
  Avis
</button>

<!-- Modal -->

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