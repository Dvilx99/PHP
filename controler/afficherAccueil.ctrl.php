<?php
include('../framework/view.class.php');
include('../model/DAO.class.php');
  $dao-> new DAO();
  $vue = new View();
  $ref;

    $nbArticle = 1;
    $articles =array() ;
    if (isset($_GET['ref'])){
      $ref = $_GET['ref'];
      $articles = $dao->getN(intval($ref),$nbArticle);
    }
    else{
      $articles = $dao->firstN($nbArticle);
    }
    // Pas de catégorie


  $vue->assign('articles',$articles);
