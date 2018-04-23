<?php
require_once '../Class/Connexion.class.php';

class InspecteurMODELE {

	private $idcASS = null;

	public function __construct() {
		
		try {
			$ConnexionASS = new Connexion();
			$this->idcASS = $ConnexionASS->IDconnexion;
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}

	public function ListeInspecteurs(){
		if ($this->idcASS) {
			$req ="select id, nom, prenom from personne where id in(select id from inspecteur);";
			$resultASS = $this->idcASS->query($req);
			return $resultASS;
		}
	}

	public function insertionInspecteurs($id_heb, $id_insp, $dateV){
		if ($this->idcASS) {
			$req ="INSERT INTO visite (ID, ID_HEB, DATE_VISITE) VALUES ('".$id_insp."', '".$id_heb."', '".$dateV."');";
			$resultASS = $this->idcASS->query($req);
			return $resultASS;
		}
	}



}