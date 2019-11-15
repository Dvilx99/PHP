<?php

    include_once("../framework/view.class.php");
    include_once("../model/DAO.class.php");

    if (!isset($sessionOuverte)) {
      session_start();
    }

    $dao = new DAO();
    $view = new View();

    $dao->retirerPanier($_SESSION['email']);
    $view->assign("sessionOuverte","yes");
    $view->display("../controler/afficherListeArticles.ctrl.php");
