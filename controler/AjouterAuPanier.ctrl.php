<?php

require_once('../framework/view.class.php');
require_once('../model/DAO.class.php');
session_start();
$view = new View();
if (isset($_SESSION['isConnected'])){
  $dao = new DAO();
  $config = parse_ini_file('../config/config.ini');

  $user = $dao->getUtilisateur($_SESSION['email']);
  $article;
  if (isset($_GET['ref']) && isset($user)){
    $dao->ajoutPanier($_SESSION['email'],$_GET['ref']);
  }
  else {
    throw new \Exception("Erreur dans le choix de l'article ou vous n'êtes pas connecter", 1);
  }

  $liste = $dao->getArticleUtilisateur($user);
  $view->assign('liste',$liste);
  //Ne pas passer par la session et l'envoyer par variable est volontaire
  $view->assign("user",$user);
  //Donne le chemin pour récupérer les images a la vue
  $view->assign('chemin',$config['images_path']);
  //Affiche la vue
  $view->diplay('../view/panier.view.php');
}
//le force a se connecter
else {
  $view->display('seConnecter.ctrl.php');
}
