<?php
    // Inclusion du framework
    include_once("../framework/view.class.php");

    // Inclusion du modèle
    include_once("../model/DAO.class.php");
    //Si il y une session je continue
    //Sinon j'envoie à la connexion
    if (isset($_SESSION['isConnected'])){
    // Creation de l'unique objet DAO
    $dao = new DAO();
    $view = new View();

    ///////////////////////////////////////////////////////////
    // Actions à faire concernant la DAO
    ///////////////////////////////////////////////////////////
    $panier = $dao->getPanier();

    $view->assign('panier', $panier);

    $view->display("finCommande.view.php");
  }
  else{
    $view->display('seConnecter.ctrl.php');
  }
?>
