<?php
require_once('../framework/view.class.php');
require_once('../model/DAO.class.php');

  $config = parse_ini_file("../config/config.ini");
  $dao = new DAO();
  $vue = new View();
  $ref;

    $nbArticle = 9;
    $articles =array() ;
    if (isset($_GET['ref'])){
      $ref = $_GET['ref'];
      $articles = $dao->getN(intval($ref),$nbArticle);
    }
    else{
      $articles = $dao->firstN($nbArticle);
    }
    // Pas de catégorie

    $vue->assign('config',$config);
  $vue->assign('articles',$articles);
  $vue->display('../view/accueil.view.php');
