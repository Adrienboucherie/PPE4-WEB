<?php
require_once '../Class/Connexion.class.php';

class ClasseModele {

	private $idcASS = null;

	public function __construct() {

		try {
			$ConnexionASS = new Connexion();
			$this->idcASS = $ConnexionASS->IDconnexion;
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}

	public function getClasses() {
		if ($this->idcASS) {
			$req ="SELECT * from CLASSE;" ;
			$resultASS = $this->idcASS->query($req);
			return $resultASS;
		}
	}


}
?>