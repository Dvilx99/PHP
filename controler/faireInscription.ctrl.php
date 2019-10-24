<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  $dao = new DAO();
  $vue = new  View();
  if (count($_POST)==4 && $_GET['premierPassage']){
    $vue->assign('erreur',count($_POST)<4);
    $vue->display("../view/inscription.view.php");
  }
  else{

    if($dao->ajoutUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'])){

      $vue->display("../acceuil.view.php");
    }
    else{
      $vue->assign('erreur',true);
      $vue->display("../inscription.view.php");
    }
  }
