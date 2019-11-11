<?php
  include_once("../framework/view.class.php");
  include_once("../model/DAO.class.php");
  session_start();
  $dao = new DAO();
  $view = new View();
  //Si il y une session je continue
  //Sinon j'envoie à la connexion
if (isset($_SESSION['isConnected'])) {
  //Récupere l'utilisateur courant
  $user = $dao->getUtilisateur($_SESSION['email']);
  //Récupere les articles de son panier
  $articles=$dao->getPanier($user);
  $view->assign('articles',$monPanier);
  $view->display("panier.view.php");
}
else {
  $view->display('seConnecter.ctrl.php');
}
