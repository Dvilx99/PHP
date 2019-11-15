<?php

  require_once('../framework/view.class.php');
  require_once('../model/DAO.class.php');
  $config = parse_ini_file('../config/config.ini');
  session_start();
  $view = new View();

  if (isset($_SESSION['isConnected'])){
    $message = "";
    $dao = new DAO();
    //Si on veut vider le panier
    if ($_POST['action']=="vider"){
      if (!$dao->viderPanier($_SESSION['email']))
        $message = "Panier vidé avec succès.";
      else {
        $message = "Erreur lors de la suppresion de l'article.";
      }
    }
    else {
      $ref = $_POST['ref'];
      $article = $dao->getArticle($ref);
      //Si on veut ajouter un article
      if ($_POST['action']=="ajout") {
        if ($dao->ajoutPanier($_SESSION['email'], $_POST['ref']))
          $message = "Article ajouté avec succès.";
        else {
          $message = "Erreur lors de l'ajout de l'article.";
        }
      }
      //Si on veut supprimer un article
      else if ($_POST['action']=="supprime"){
        if ($dao->supprimePanier($_SESSION['email'], $_POST['ref']))
          $message = "Article supprimé avec succès.";
        else {
          $message = "Erreur lors de la suppression de l'article.";
        }
      }
    }
    $view->assign('chemin', $config['images_path']);
    $view->assign('message', $message);
    $view->assign('sessionOuverte', "yes");
    $view->display("../controler/afficherPanier.ctrl.php");
  }
  //le force a se connecter
  else {
    $view->display('seConnecter.ctrl.php');
  }
