<?php
  include_once("../framework/view.class.php");
  include_once("../model/DAO.class.php");
  $dao = new DAO();

  $monPanier=$dao->getPanier();
  $view->assign('articles',$monPanier);
  $view->display("panier.view.php")
?>
