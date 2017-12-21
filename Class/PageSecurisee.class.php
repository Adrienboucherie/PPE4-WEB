<?php
class pageSecurisee extends pageBase {
	public function __construct($t) {
		parent::__construct($t);
	}

	/**
	 ***************************** Gestion du menu ********************************************
	 */
	// REDEFINITON du menu par rapport à celui de page_base
	protected function affiche_menu() {

	
		$this->menu ='<div id="navbar" class="navbar navbar-inverse">
				<div class="navbar-header">
      				<a class="navbar-brand" href="../VUE/VerifSessionOK.php">Déconnexion</a>
    			</div>

          <ul class="nav navbar-nav">
            <li><a href="ConsultationHebergements.php">Consultation des Equipes avec leurs coureurs</a></li>


			</ul>
		</div>';
		echo $this->menu;
	}
}
?>
