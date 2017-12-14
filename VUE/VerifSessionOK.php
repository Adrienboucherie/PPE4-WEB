<?php
session_start ();
include ('../Class/autoload.php');
require_once ('../MODELE/Connexion.class.php');
$page= new PageBase ( "Stars'Up - Se connecter" );

$modeleCo=new ConnexionModele();

/* cas ou la session existe deja, donc il a clique sur se Deconnecter */
if (isset($_SESSION ['idU']) && isset($_SESSION ['mdpU'])) {
	/* Dans ce cas, on detruit la session SUR LE SERVEUR */
	$_SESSION = array (); /* on vide le contenu de session sur le serveur */
	// Dans ce cas, on detruit aussi l'identifiant de SESSION en recreant le cookie de SESSION avec une dateHeure perimee (time() -42000)
	if (ini_get ( "session.use_cookies" )) {
		$params = session_get_cookie_params ();
		setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"] );
	}
	// on detruit la session sur le serveur
	session_destroy ();
	?> <script type="text/javascript"> alert('session detruite');</script> <?php

	// affichage du msg
	header ('Location:verifSessionOK.php?error=SUCCESS : Vous venez d\'être déconnecté !');

} else {
	// traitement du formulaire (si on vient du formulaire alors
	if ((isset ( $_POST['idU'] )) && (isset ( $_POST['mdpU'] ))) {


		/*$id=$_POST['idU'];
		$idmdp=$_POST['mdpU'];*/


		$info = $modeleCo->connect($_POST['idU'], $_POST['mdpU']);
		if($info){
			$lemail = $info->MAIL;
			$lemdp = $info->MDP;
			$id =  $info->ID;
		}

		if(isset($id) & !empty($id))
		{
			$_SESSION ['idU'] = $lemail;
			$_SESSION ['mdpU'] = $lemdp;
			$_SESSION ['id'] = $id;

				// on appelle la nouvelle classe Page_sécurisée :  page avec un menu specifique
				$page = new PageSecurisee ( "Stars'Up - ModeAdmin" );
				header ('Location:index.php');
			}
		else {
				// les identifiants de connexion existe mais ne sont pas VALABLES


					header ('Location:verifSessionOK.php?error=ERREUR : Login ou mot de passe non valide !');
			}

		}
	//}
	 else { // pas de session donc on affiche le formulaire de connexion (on vient donc de la page base avec Se Connecter)

		$page->contenu = "<h3>Veuillez vous connecter. </h3>";
		// action # car on reste sur la meme page
		$page->contenu .= '	<form class="form-inline" id="formInscriptionAdmin" method="POST" action="VerifSessionOK.php">
  					<div class="form-group">
    					<input type="text" class="form-control" name="idU" id="idU"size="15" maxlength="15" placeholder="Identifiant" autofocus required >
    					<input type="password" class="form-control" name="mdpU" id="mdpU" size="15" maxlength="15" placeholder="Mot de passe" required>
  					</div>
 					<button type="submit" class="btn btn-default">Valider</button>
	 		 		<button type="reset" class="btn btn-default">Recommencer</button>
			</form>';
	}
}
// TRAITEMENT DE L'ERREUR
if (isset($_GET['error']) && !empty($_GET['error'])) {
	$err = $_GET['error'];
	$page->zoneErreur = '<div id="infoERREUR" class="alert alert-success fade in"><strong>INFO : </strong><a href="#" onclick="cacher();" class="close" data-dismiss="alert">&times;</a></div>';
	$verif = preg_match("/ERREUR/",$err); //verifie s'il y a le mot erreur dans le message retourné
	if ( $verif == TRUE ){
		$class ="alert alert-danger fade in";
	}
	else {
		$class ="alert alert-success fade in";
	}
	$page->scriptExec = "changerCouleurZoneErreur('".$class."');";	//ajout dans le tableau scriptExec du script à executer
	$page->scriptExec = "montrer('".$err."');"; //ajout dans le tableau scriptExec du script à executer
}
$page->afficher();


?>
