<?php
require_once('../framework/view.class.php');
session_start();
$vue = new View()
//Si il n'y a pas de session prédefini j'envoie à la connexion
if (isset($_SESSION['isConnected'])) {
  $vue->display('../view/afficherAcceuil.ctrl.php');
}
//Sinon j'ajoute au post les valeur des attributs de la session
// puis je demande de me connecter
else {
	$view->display('seConnecter.ctrl.php');
}
