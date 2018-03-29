<?php
require_once '../Class/Connexion.class.php';

class HebergementMODELE {

	private $idcASS = null;

	public function __construct() {
		
		try {
			$ConnexionASS = new Connexion();
			$this->idcASS = $ConnexionASS->IDconnexion;
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}
	public function ListeHebergements(){
		if ($this->idcASS) {
			$req ="select nom_heb, adresse_heb, ville_heb, nbetoile, commentaire from hebergement as h inner join visite as v on h.id_heb = v.id_heb GROUP BY nom_heb order by nom_heb ASC";
			$resultASS = $this->idcASS->query($req);
			return $resultASS;
		}
	}
}