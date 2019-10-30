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
          $chemin = array();
          $parent = $this->getPere();

          array_unshift($chemin, $parent);
          while($parent!="Rugby" && $parent!="Tennis de table" && $parent!="Chasse" && $parent!="Echec") {
            $parent = $parent->getPere();
            array_unshift($chemin, $parent);
          }
          return $chemin;
        }
  }


?>
