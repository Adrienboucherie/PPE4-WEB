<?php
session_start ();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecurisee.class.php');

if (isset ( $_SESSION ['idU'] ) && isset ( $_SESSION ['mdpU'] )) {
	$pageIndex = new PageSecurisee ( "SECURISE" 	);
} else {
	$pageIndex = new PageBase ( "PUBLIC" );
}

$pageIndex->contenu = 'oui'; 
$pageIndex->afficher();

?>
