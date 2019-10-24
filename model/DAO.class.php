<?php

    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");
    require_once("../model/Utilisateur.php");

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/fnoc.db';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
              $this->db = new PDO($this->database);
            }
            catch (PDOException $e){
              die("erreur de connexion:".$e->getMessage());
            }
        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
            $query = "SELECT * FROM categorie";
            $statement = $this->db->query($query);
            $categories = $statement->fetchAll(PDO::FETCH_CLASS, "categorie");
            return $categories;
        }



        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN(int $n) : array {
            $req = "SELECT * FROM article LIMIT $n";
            $statement = $this->db->query($req);
            $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
            return $liste;
        }

        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN(int $ref,int $n) : array {
            $req = "SELECT * FROM article WHERE ref >= $ref LIMIT $n";
            $statement = $this->db->query($req);
            $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
            return $liste;
        }

        // Acces à la référence qui suit la référence $ref dans l'ordre des références
        // Retourne -1 si $ref est la dernière référence
        function next(int $ref) : int {
            $liste = $this->getN($ref, 2);
            if ($liste[1] != null) {
              return $liste[1]->getRef();
            } else {
              return -1;
            }

        }

        // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
        // Retourne -1 si $ref est la première référence
        function prevN(int $ref,int $n): int {
            $req = "SELECT * FROM article WHERE ref < $ref ORDER BY ref DESC LIMIT $n";
            $statement = $this->db->query($req);
            $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
            if (count($liste) > 1) {
              return $liste[$n-1]->getRef();
            } else {
              return -1;
            }
        }

        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat(int $id): Categorie {
            $req = "SELECT * FROM categorie WHERE id = $id";
            $statement = $this->db->query($req);
            $liste = $statement->fetchAll(PDO::FETCH_CLASS, "categorie");
            return $liste[0];
        }

        // Acces au n articles à partir de la reférence $ref
        // Retourne une table d'objets de la classe Article
        function getNCateg(int $ref,int $n,string $categorie) : array {
            $req = "SELECT * FROM article WHERE categorie = $categorie AND ref >= $ref LIMIT $n";
            $statement = $this->db->query($req);
            $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
            return $liste;
        }

        //Renvoie l'utilisateur pour le nom est mot de passse donné
        //Null sinon
        function membreExistant(string $email,string $mdp) : boolean {
          $req = "SELECT * FROM utilisateur WHERE email=$email and $mdp=mdp limit 1";
          $statement = $this->db->query($req);
          $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
          return count($liste)==1;
        }


        function getArticle(int $ref) : Article {
          $req = "SELECT * FROM article WHERE ref = $ref";
          $statement = $this->db->query($req);
          $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
          return $liste[0];
        }

        function getArticlesParCategorie(int $categorie) {
          $req = "SELECT * FROM article WHERE categorie = $categorie";
          $statement = $this->db->query($req);
          $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
          return $liste;
        }

        function ajoutUtilisateur(string $nom, string $prenom, string $email, string $mdp) {
          $req = ("SELECT email FROM utilisateur WHERE email = $email");
          $statement = $this->db>query($req);
          $existingUser = $statement->fetchAll(PDO::FETCH_CLASS, "Utilisateur");

          if ($existingUser[0][0] == $email) {
            return 0;
          } else {
            $utilisateur = new Utilisateur($nom, $prenom, $email, $mdp);
            $serialized = serialize($utilisateur);
            $stmt = $db->prepare("INSERT INTO utilisateur(nom, prenom, email, mdp) VALUES ($nom, $prenom, $email, $mdp)");
            $stmt->execute(array($serializedObject));
            return 1;
          }
        }
        
    }

    ?>
