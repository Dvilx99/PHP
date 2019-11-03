<?php
session_start();
    include_once("../framework/view.class.php");
    include_once("../model/DAO.class.php");
    //Declaration Variable + valeur par default
    $dao = new DAO();
    $view = new View();
    //Si il y une session je continue
    //Sinon j'envoie à la connexion
    if ($_SESSION['isConnected']){
      $config = parse_ini_file('../config/config.ini');
      $liste = array();
      //Charge le nombre d'article que l'utilisateur veut afficher ou met 5 par default,
      //Ou ne fais rien car il n'y a pas d'action sur nbArticle
      if (isset($_POST['nbArticle'])){
        $_SESSION['nbArticle'] = $_POST['nbArticle'];
      }
      else if (!isset($_SESSION['nbArticle'])){
        $_SESSION['nbArticle'] = 5;
      }
      //Charge la categorie courante que l'utilisateur veut afficher ou met 0 par default,
      //Ou ne fais rien car il n'y a pas d'action sur Categorie
      if (isset($_GET['nbArticle'])){
        $_SESSION['nbArticle'] = $_GET['categorie'];
      }
      else if (!isset($_SESSION['categorie'])){
        $_SESSION['categorie'] = 0;
      }
      //Si la categorie existe prepare le chargement pour celle ci,affichie l'accueil sinon
      if ($_SESSION['categorie'] != 0) {
        $liste = $dao->getArticlesParCategorie($_SESSION['categorie'],$_SESSION['nbArticle']);
        $view->assign('liste', $liste);
      }
      else {
        //Affiche le nb d'article a partir de ref
        if (isset($_GET['ref'])){
          $ref = $_GET['ref'];
          $liste = $dao->getN(intval($ref),$_SESSION['nbArticle']);
        }
        //Affiche le debut s'il n'y a pas de ref
        else{
          $liste = $dao->firstN($_SESSION['nbArticle']);
        }
      }
      // Note la référence du premier et dernier article affiché
      $firstRef = $liste[0]->getRef();
      $lastRef = end($liste)->getRef();

      // Calcule la référence qui suit le dernier article
      $nextRef = $dao->next($lastRef);
      // Si c'est la fin: reste sur le même article
      if ($nextRef == -1) {
        $nextRef = $firstRef;
      }
      // Passe le résultat à la vue
      $view->assign('nextRef',$nextRef);
      // Calcule la référence qui précède du nombre d'article que l'utilisateur veut afficher l'article courant
      $prevRef = $dao->prevN($firstRef,$_SESSION['nbArticle']);
      // Si c'est la fin: reste sur le même article
      if ($prevRef == -1) {
        $prevRef = $firstRef;
      }
      // Passe le résultat à la vue
      $view->assign('prevRef',$prevRef);
      
      //Donne le chemin pour récupérer les images a la vue
      $view->assign('chemin',$config['images_path']);
      $view->assign('catCourante',$_SESSION['categorie']);
      $view->assign('liste',$liste);
      $view->display('../view/listeArticles.view.php');
}
else {
  $view->display('../controler/seConnecter.ctrl.php');
}
