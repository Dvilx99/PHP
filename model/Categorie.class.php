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

        //Sert à rien 
        function getPath() : array {
          $dao = new DAO();
          $tab = array();
          $idCourant = intval($this->getId());
          $pere = intval($this->getPere());
          $CatCourante = $dao->getCat($idCourant);
          while ($idCourant!=$pere){
            array_unshift($tab,$CatCourante);
            $idCourant = $pere;
            $CatCourante = $dao->getCat($idCourant);
            $pere = intval($CatCourante->getPere());
          }
          array_unshift($tab,$dao->getCat($idCourant));
           return $tab;
      }
  }


?>
