<?php

  require_once('../framework/view.class.php');
  require_once('../model/DAO.class.php');
  $config = parse_ini_file('../config/config.ini');
  session_start();
  $view = new View();

  if (isset($_SESSION['isConnected'])){

    $dao = new DAO();

    $ref = $_GET['ref'];
    $article = $dao->getArticle($ref);
    if ($_GET['action']=="ajout") {
      if ($dao->ajoutPanier($_SESSION['email'], $_GET['ref']))
        $message = "Article ajouté avec succès.";
      else {
        $message = "Erreur lors de l'ajout de l'article.";
      }
    }
    else if ($_GET['action']=="supprime"){
      if ($dao->supprimePanier($_SESSION['email'], $_GET['ref']))
        $message = "Article supprimé avec succès.";
      else {
        $message = "Erreur lors de la suppression de l'article.";
      }
    }
    $view->assign('article', $article);
    $view->assign('ref', $ref);
    $view->assign('chemin', $config['images_path']);
    $view->assign('message', $message);
    $view->assign('sessionOuverte', "yes");
    $view->display("../controler/afficherPanier.ctrl.php");
  }
  //le force a se connecter
  else {
    $view->display('seConnecter.ctrl.php');
  }
