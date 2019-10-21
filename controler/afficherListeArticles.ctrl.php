<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/view.class.php");

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    // Creation de l'unique objet DAO
    $dao = new DAO();

    ///////////////////////////////////////////////////////
    //  Création qui concerne la DAO
    ///////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // Passe les paramètres à la vue
    

    // Charge la vue
    $view->display("articles.view.php")
    ?>
