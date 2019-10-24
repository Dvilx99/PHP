<?php
    include_once("../framework/view.class.php");
    include_once("../model/DAO.class.php");

    $dao = new DAO();
    $view = new View();

    $config = parse_ini_file('../config/config.ini');

    $categorie = $_GET['categorie'] ?? 0;
    //Si la categorie est set, lui donne $_GET, 0 sinon

    if ($categorie != 0) {
      $liste = $dao->getArticlesParCategorie($categorie);
      $view->assign('liste', $liste);
    }

    $view->assign('config', $config);
    $view->display("listeArticles.view.php")
    ?>
