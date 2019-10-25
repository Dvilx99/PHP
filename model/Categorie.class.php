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
          // MARCHE PAS
          $dao = new DAO();
          $tab = array();
          $id = $this->getId();
          $idPere = $this->getPere();
          while ($id!=$idPere){
            $courant = $dao->getCat($id);
            array_unshift($tab,$courant);
            $id = $courant->getId();
            $idPere = $courant->getPere();
          }
           return $tab;
    }
  }


?>
