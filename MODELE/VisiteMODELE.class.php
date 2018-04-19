<?php
require_once '../Class/Connexion.class.php';

class VisiteMODELE {

	private $idcASS = null;

	public function __construct() {
		
		try {
			$ConnexionASS = new Connexion();
			$this->idcASS = $ConnexionASS->IDconnexion;
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}

	public function insertionEtoile($id_insp, $etoile, $id_heb, $dateV, $description){
		if ($this->idcASS) {
			$req ="INSERT INTO visite (ID, NBETOILE, ID_HEB, DATE_VISITE, COMMENTAIRE) VALUES ('".$id_insp."', '".$etoile."', '".$id_heb."', '".$dateV."', '".$description."');";
			$resultASS = $this->idcASS->query($req);
			return $resultASS;
		}
	}

	



}