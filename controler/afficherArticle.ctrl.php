<?php

require_once('../framework/view.class.php');
require_once('../model/DAO.class.php');

  $dao = new DAO();
  $vue = new View();
  $ref;
  $config = parse_ini_file('../config/config.ini');

    $nbArticle = 4;
    $articles = array() ;
    if (isset($_GET['ref'])){
      $ref = $_GET['ref'];
      $article = $dao->getArticle($ref);

      $vue->assign('article', $article);
      $vue->assign('ref', $ref);
      $vue->assign('chemin', $config['images_path']);
      $vue->display("../view/article.view.php");
    }
    else{
      echo "<h2>Erreur de chemin dans l'url</h2>";
    }
