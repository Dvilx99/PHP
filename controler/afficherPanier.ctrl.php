<?php
  include_once("../framework/view.class.php");
  include_once("../model/DAO.class.php");
  session_start();
  $dao = new DAO();
  $view = new View();
  $config = parse_ini_file('../config/config.ini');
  $prixTotal = 0;
  //Si il y une session je continue
  //Sinon j'envoie à la connexion
  if (isset($_SESSION['isConnected'])) {
    //Récupere les articles de son panier
    $panier = $dao->getPanier($_SESSION['email']);
    $user = $dao->getUtilisateur($_SESSION['email']);

    foreach ($panier as $article) {
      $prixTotal += $article->getPrix();
    }

    $view->assign('panier', $panier);
    $view->assign('prixTotal', $prixTotal);
    $view->assign('user', $user);
    $view->assign('image', $config['images_path']);
    $view->display("panier.view.php");
  }
  else {
    $view->display('seConnecter.ctrl.php');
  }
