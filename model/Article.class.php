<?php

    // Un article en vente
    class Article {
        private $ref;       // Référence unique
        private $libelCours;   //  Intitulé cours
        private $categorie; // identifiant de catégorie
        private $prix;      // le prix
        private $image;     // Nom du fichier image
        private $description; //Description

        // Getters
        function getRef() : int {
          return $this->ref;
        }
        function getLibelCours() : string {
          return $this->intituleCours;
        }

        function getCategorie() : string {
          return $this->categorie;
        }

        function getPrix() : float {
          return $this->prix;
        }

        function getImage() : string {
          return $this->image;
        }

        function getDescription() : string {
          return $this->description;
        }

    }

?>
