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

    if ($dao->ajoutPanier($_SESSION['email'], $_GET['ref']))
      $message = "Article ajouté avec succès.";
    else
      $message = "Erreur lors de l'ajout de l'article.";

    $view->assign('article', $article);
    $view->assign('ref', $ref);
    $view->assign('chemin', $config['images_path']);
    $view->assign('message', $message);
    $view->display("../view/article.view.php");
  }
  //le force a se connecter
  else {
    $view->display('seConnecter.ctrl.php');
  }
