<?php
require_once '../Class/Connexion.class.php';

class ConnexionModele {

	private $idCo = null;

	public function __construct() {
		// creation de la connexion afin d'executer les requetes
		try {
			$ConnexionCOU = new Connexion();
			$this->idCo = $ConnexionCOU->IDconnexion;
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}

	public function getnom($nom) {

		if ($this->idCo) {
			$req ="SELECT nomequ from equipe where nomequ='". $nom ."';" ;
			$resultEQU = $this->idCo->query($req);
			return $resultEQU->fetch()->nomequ;
		}
	}
    public function getmdp($nom, $mdp) {

	    if ($this->idCo) {
	      $req ="SELECT MDP from personne where MAIL='". $nom ."' and MDP ='". $mdp ."';" ;
	      $resultEQU = $this->idCo->query($req);
	      return $resultEQU->fetch()->mdp;
	    }
	}

    public function connect($nom, $mdp){

	    if ($this->idCo) {
		    $req ="SELECT * FROM personne where MAiL='". $nom ."' and MDP ='". $mdp ."';" ;
		    $resultEQU = $this->idCo->query($req);
			return $resultEQU->fetch();
	    }
    }

    public function getIDCo($mail){

	    if ($this->idCo) {
		    $req ="SELECT id FROM personne where MAiL='". $mail."';" ;
		    $resultEQU = $this->idCo->query($req);
			return $resultEQU->fetch();
	    }
    }

    public function getIDGerant($id){

	    if ($this->idCo) {
		    $req ="SELECT * FROM gerant where ID ='". $id->id ."';" ;
		    $resultEQU = $this->idCo->query($req);
			return $resultEQU->fetch();
	    }
    }

}
