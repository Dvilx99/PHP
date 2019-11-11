<?php

    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");
    require_once("../model/Utilisateur.class.php");
    require_once("../model/Panier.class.php");
    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
      //Reponse dans membre existant
      public static $MEMBRE_EXISTE =1;
      public static $EMAIL_MANQUANT = 2;
      public static $MDP_MANQUANT =3;
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
        function getCat(int $id) : Categorie {
            $req = "SELECT * FROM categorie WHERE id = $id";
            $statement = $this->db->query($req);
            $liste = $statement->fetchAll(PDO::FETCH_CLASS, "categorie");
            return $liste[0];
        }



        function getArticle(int $ref) : Article {
          $req = "SELECT * FROM article WHERE ref = $ref";
          $statement = $this->db->query($req);
          $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
          return $liste[0];
        }

        function getArticlesParCategorie(int $int) : array {
          $categories = array();
          $categories[] = $this->getCat($int);
          $test = array();
          while ($test != $categories) {
            $test = $categories;

            foreach ($test as $categorie) {
              $sousCategories = $this->getSousCategorie($categorie->getId());

              foreach ($sousCategories as $sousCategorie) {
                if (!in_array($sousCategorie, $categories)) {
                  array_push($categories, $sousCategorie);
                }
              }

            }
          }

          $lesArticles = array();
          foreach ($categories as $categorie) {
            $int = $categorie->getId();
            $req = "SELECT * FROM article WHERE categorie = $int";
            $statement = $this->db->query($req);
            $articles = $statement->fetchAll(PDO::FETCH_CLASS, "article");

            foreach ($articles as $article) {
              if ($article != null) {
                array_push($lesArticles, $article);
              }
            }

          }
          return $lesArticles;
        }

        function getSousCategorie(string $pere) : array{
          $req = "SELECT * FROM categorie WHERE pere=$pere";
          $statement = $this->db->query($req);
          $liste = $statement->fetchAll(PDO::FETCH_CLASS, "categorie");
          return $liste;
        }

        function ajoutUtilisateur(string $nom, string $prenom, string $email, string $mdp) {
          $req = ("SELECT email FROM utilisateur WHERE email = '$email'");
          $statement = $this->db->query($req);
          $existingUser = $statement->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
          if (count($existingUser)!=0) {
            return 0;
          } else {
            $utilisateur = new Utilisateur($nom, $prenom, $email, $mdp);
            $serialized = serialize($utilisateur);
            $stmt = $this->db->prepare("INSERT INTO utilisateur(nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)");
            $stmt->execute(array(
              'nom' => $nom,
              'prenom' => $prenom,
              'email' => $email,
              'mdp' => $mdp
            ));
            return 1;
          }
        }

        //renvoie l'utilisarteur qui est associé a l'email
        function getUtilisateur(string $email) : Utilisateur {
          $req = "SELECT * FROM utilisateur WHERE email = '$email'";
          $statement = $this->db->query($req);
          $monUser = $statement->fetchAll(PDO::FETCH_CLASS,'utilisateur');
          return $monUser[0];
        }
        //ajoute un Panier a la base de données
        function ajoutPanier($utilisateur, $article) {
          $panier = new Panier($utilisateur, $article);
          $serialized = serialize($panier);
          $stmt = $this->db->prepare("INSERT INTO panier(utilisateur,article) VALUES (:utilisateur, :article)");
          $stmt->execute(array(
            'utilisateur' => $utilisateur,
            'article' => $article
          ));
          return 1 ;
        }
        //donne le Panier de l'utilisateur
        function getPanier($utilisateur) : array {
          $req = "SELECT article FROM panier WHERE utilisateur = $utilisateur";
          $statement = $this->db->query($req);
          $monUser = $statement->fetchAll(PDO::FETCH_CLASS,'article');
          return $articles;
        }
        //Retourne les article que l'utilisateur a reservé
        function getArticleUtilisateur(Utilisateur $user) : array {
          $req = "SELECT article FROM panier WHERE utilisateur = $user";
          $statement = $this->db->query($req);
          $mesrefs = $statement->fetchAll(PDO::FETCH_CLASS,'article');
          $mesArticles = array();
          foreach ($mesrefs as $key => $value) {
            $mesArticles[] = $value;
          }
          return $mesArticles;
        }
        //Censer etre utiliser pour factoriser ComposantVue/creationHeader mais pas fait
        function getAllCategoriePere() : array{
          $req = "SELECT * FROM categorie WHERE pere = id";
          $statement = $this->db->query($req);
          $lesPeres = $statement->fetchAll(PDO::FETCH_CLASS,'categorie');
          return $lesPeres;
        }

        function MembreExistant(string $email, string $mdp) {
          $req = ("SELECT email FROM utilisateur WHERE email = '$email'");
          $statement = $this->db->query($req);
          $existingMail = $statement->fetchAll(PDO::FETCH_ASSOC);
          $mail = $existingMail[0] ?? "";
          if ($mail == "") {
            return self::$EMAIL_MANQUANT;
          } else {
            $semi_User = $this->getUtilisateur($email);
            if(password_verify ($mdp ,$semi_User->getMdp())) {
              return self::$MEMBRE_EXISTE;
            } else {
              return self::$MDP_MANQUANT;
            }
          }
        }
  }

    ?>
