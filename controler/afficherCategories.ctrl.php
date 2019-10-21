<?php
    // Inclusion du framework
    include_once("../framework/view.class.php");

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    // Creation de l'unique objet DAO
    $dao = new DAO();

    ///////////////////////////////////////////////////////////
    // Actions à faire concernant la DAO
    ///////////////////////////////////////////////////////////

    include('../view/categories.view.php');

    ?>
