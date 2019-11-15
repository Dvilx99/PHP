<?php

    require_once("../framework/view.class.php");
    require_once("../model/DAO.class.php");
    //Si la session est déjà ouverte ne le refait pas
    if (!isset($sessionOuverte)) {
      session_start();
    }
    //Declaration Variable + valeur par default
    $dao = new DAO();
    $view = new View();
    $config = parse_ini_file('../config/config.ini');
    //Si il y une session je continue
    //Sinon j'envoie à la connexion
    if (isset($_SESSION['isConnected'])){
      $liste = array();
      //Charge le nombre d'article que l'utilisateur veut afficher ou met 5 par default,
      //Ou ne fais rien car il n'y a pas d'action sur nbArticle
      if (isset($_POST['nbArticle'])){
        $_SESSION['nbArticle'] = $_POST['nbArticle'];
      }
      //Charge la categorie courante que l'utilisateur veut afficher ou met 0 par default,
      //Ou ne fais rien car il n'y a pas d'action sur Categorie
      $_SESSION['categorie'] = $_GET['categorie'] ?? 0;

      //Si la categorie existe prepare le chargement pour celle ci,affichie l'accueil sinon
      if ($_SESSION['categorie'] != 0) {
        $liste = $dao->getArticlesParCategorie($_SESSION['categorie']);
      }
      else {
        // Note la référence du premier et dernier article affiché
        $liste = $dao->firstN($_SESSION['nbArticle']);
      }

      //Donne le chemin pour récupérer les images a la vue
      $view->assign('chemin',$config['images_path']);
      $view->assign('catCourante',$_SESSION['categorie']);
      $view->assign('nbArticle',$_SESSION['nbArticle']);
      $view->assign('liste',$liste);
      $view->display('../view/listeArticles.view.php');
}
else {
  $view->display('../controler/seConnecter.ctrl.php');
}
