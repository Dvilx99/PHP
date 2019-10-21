<?php

    class Categorie {
        private $id;   // Identifiant
        private $nom;  // nom de la catégorie
        private $pere; // catégorie parente

        // Getters
        function getId() : string {
          return $this->id;
        }

        function getNom() : string {
          return $this->nom;
        }

        function getPere() : string {
          return $this->pere;
        }

        function getPath() : array {
          $dao = new DAO();
          $tab = array();
          $i = $this->getId();
          while ($id>1){
            array_unshift($tab,$dao->get($id));
            $id--;
          }
           return $tab;
    }
  }


?>
