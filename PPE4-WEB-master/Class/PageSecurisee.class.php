<?php
class PageSecurisee extends PageBase {
	public function __construct($t) {
		parent::__construct($t);
	}
	
	/**
	 ***************************** Gestion du menu ********************************************
	 */
	// REDEFINITON du menu par rapport à celui de page_base
	protected function affiche_menu() {
		
		// on rajoute dans le MENU 
		// le menu Déconnexion : possiblité de se deconnecter du mode administrateur
		// 2 nouvelles pages "inscription coureurs et Association Caritative !
		$this->menu ='<div class="page-header">
		<table>
		<tr><td>
       <h1><a href="index.php"><img class ="image" src="./Image/logo.png" alt="Logo de StarsUp"> </a></h1>
			 </td>
			 <td> <div id="navbar" class="navbar-collapse collapse">
	 				<div class="navbar-header ">

	     			</div>

	           <ul class="nav navbar-nav">
						   <li> <a href="../VUE/VerifSessionOK.php">Déconnexion</a></li>
	             <li><a href="ConsultationHebergements2.php">Liste des hébergements</a></li>
	             <li><a href="../VUE/visite.php">Visite</a></li>
	 			</ul>
	 		</div></td></tr></table>
           </div>';
		echo $this->menu;
	}
}
?>