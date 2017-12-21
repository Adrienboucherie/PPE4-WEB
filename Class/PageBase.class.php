<?php
class pageBase {
	private $style = array (
			'bootstrap',
			'bootstrap.min',
			'bootstrap-theme',
			'bootstrap-theme.min',
			'Normalize',
			'style'
	); // mettre juste le nom du fichier SANS l'extension css
	private $script = array (
			'utile' //script gérant les affichages des messages d'erreur et aussi la redirection
	); // mettre juste le nom du fichier SANS l'extension js
	private $scriptExec = array(); //script que l'on veut executer
	private $motsCles;
	private $description;
	private $titre;
	private $entete;

	private $contenu;
	private $zoneErreur;
	private $piedpage;
	public function __construct($t) {
		$this->titre = $t;
		$this->description = 'Notation d\'hébergements';
		$this->motsCles = 'Note, hébergement, inspection';
		$this->entete = '<div class="page-header">
		<table>
		<tr><td>
       <h1><a href="index.php"><img class ="image" src="./Image/logo.png" alt="Logo de StarsUp"> </a></h1>
			 </td>
			 <td> <div id="navbar" class="navbar-collapse collapse">
	 				<div class="navbar-header">

	     			</div>

	           <ul class="nav navbar-nav" >
						   <li> <a href="../VUE/VerifSessionOK.php">Connexion</a></li>
	             <li><a href="ConsultationHebergements.php">Liste des hébergements</a></li>
	 			</ul>
	 		</div></td></tr></table>
           </div>';


		$this->zoneErreur='';


	}
	public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'motsCles' :
				{
					$this->motsCles .= $valeur;
					break;
				}
			case 'style' :
				{
					$this->style [count ( $this->style ) + 1] = $valeur;
					break;
				}
			case 'script' :
				{
					$this->script [count ( $this->script ) + 1] = $valeur;
					break;
				}
			case 'scriptExec' :
				{
					$this->scriptExec [count ( $this->scriptExec ) + 1] = $valeur;
					break;
				}

			case 'titre' :
				{
					$this->titre = $valeur;
					break;
				}
			case 'contenu' :
				{
					$this->contenu = $valeur;
					break;
				}
			case 'zoneErreur' :
				{
					$this->zoneErreur = $valeur;
					break;
						}
		}
	}
	public function __get($propriete) {
		switch ($propriete) {

			case 'contenu' :
				{
					return $this->contenu;
					break;
				}
		}
	}
	/**
	 * ****************************Gestion des mots clés *********************************************
	 */
	/* Insertion des mots clés */
	private function charge_motsCles() {
		echo "<meta name='keywords' lang='fr' content='" . $this->motsCles . "' />";
		echo ("\n");
	}

	/**
	 * ****************************Gestion de la description *********************************************
	 */
	/* Insertion de la description du site */
	private function charge_description() {
		echo "<meta name='description' content='" . $this->description . "'/>";
		echo ("\n");
	}
	/**
	 * ****************************Gestion des styles *********************************************
	 */
	/* Insertion des feuilles de style */
	private function charge_style() {
		foreach ( $this->style as $s ) {
			echo "<link rel='stylesheet' type='text/css' href='../VUE/Style/" . $s . ".css'/>";
			echo ("\n");
		}
	}

	/**
	 * ****************************Gestion des scripts *********************************************
	 */
	/* Insertion des script JAVASCRIPT */
	private function charge_script() {
		foreach ( $this->script as $sc ) {
			echo "<script type='text/javascript' src='../VUE/Script/" . $sc . ".js'></script>\n";
		}
	}
	/**
	 * ****************************Gestion des scripts A EXECUTER *********************************************
	 */
	/* EXECUTION des script JAVASCRIPT */
	private function exec_script() {
		foreach ( $this->scriptExec as $se ) {
			echo "<script type='text/javascript'>". $se."</script>";
		}
	}
	/**
	 * ****************************Gestion de l'entete *********************************************
	 */
	protected function affiche_entete() {
		echo $this->entete;
	}
	/**
	 * ****************************Gestion de la zone d'erreur *********************************************
	 */
	private function affiche_zone_erreur() {
		echo $this->zoneErreur;
	}
	/**
	 * ****************************Gestion du pied de page *********************************************
	 */
	private function affiche_pied_page() {
		echo $this->piedpage;
	}
	/**
	 * ****************************Gestion du menu *********************************************
	 */
	protected function affiche_menu() {
		echo $this->menu;
	}
	/**
	 * ****************************METHODE AFFICHER ******************************************************
	 */
	public function afficher() {
		?>
<!DOCTYPE html>
<html lang='fr'>
<head>
<title> <?php echo $this->titre;?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php $this->charge_motsCles();?>
	<?php $this->charge_description();?>
	<?php $this->charge_style();?>
	<?php $this->charge_script();?>

</head>
<body>
<div class="container-fluid">
	<div class="container-fluid"><?php $this->affiche_entete();?></div>
	<div class="container-fluid"><?php $this->affiche_menu();?></div>
	<div class="container-fluid"><?php echo $this->contenu;?></div>
	<div class="container-fluid"><?php $this->affiche_zone_erreur();?><?php $this->exec_script();?></div>
	<div class="container-fluid"><?php $this->affiche_pied_page();?></div>
</div>



</body>
</html>
<?php
	}
}
?>
