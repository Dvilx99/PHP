<?php
require_once('../framework/view.class.php');
session_start();
$vue = new View()
// on définit une durée de vie de 3jours
$temps = 3*24*3600;
//Si il n'y a pas de session prédefini j'envoie à la connexion
if (!isset($_SESSION['email']) || !isset($_SESSION['mdp'])) {
  $vue->display('../view/connexion.view.php');
  var_dump($_SESSION['email']);
}
//Sinon j'ajoute au post les valeur des attributs de la session
// puis je demande de me connecter
else {
	$vue->assign($_POST['email'],$_SESSION['email']);
  $vue->assign($_POST['mdp'],$_SESSION['mdp']);
  $vue->display('../controler/seConnecter.ctrl.php');
}
