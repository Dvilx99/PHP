<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  $dao = new DAO();
  $vue = new  View();

  if (count($_POST)==4){//Vérifie qu'il y a asser d'element envoyé
    $vue->assign('erreur',false);
    $vue->display("../view/inscription.view.php");
  }
  else{
    //Vérifie que l'utilisateur n'existe pas déja et l'ajoute sinon
    //Affiche la page accueil par la suite
      if(!membreExistant($_POST['email'],$_POST['mdp'] && $dao->ajoutUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'])){
        $vue->display("../acceuil.view.php");
    }
    else{
      $vue->assign('erreur',true);
      $vue->display("../inscription.view.php");
    }
  }
