<?php

namespace BOUTIQUE\DAO; // nomenclature 'psr-4'.

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class ProduitDao
{
   private $db; // Va contenir notre objet connexion, qui représentera la connexion à la BDD
   public function __construct(Connection $db){
       $this -> db = $db;
   }
   public function getDb(){
   return $this -> db;
   }

   public function findAll(){
       //Fonction pour récupèrer tous les produits dans la BDD
       $requete = "SELECT * FROM produit";
       $resultat = $this -> getDb() -> fetchAll($requete);// $resultat : contient tous les produits sous forme d'un array multidimentionnel

       $produits = array();
       foreach($resultat as $value){
           $id_produit = $value['id_produit'];
           $produits[$id_produit] = $this -> buildProduit($value);

       }
       return $produits;
   }

   // Toutes les autres requètes de l'entité Produit seront ici
   public function findAllCategories(){
   $requete = "SELECT DISTINCT categorie FROM produit";
   $resultat = $this -> getDb() -> fetchAll($requete);
   //$resultat est un tableau multidimentionnel avec toutes les categories...
   return $resultat;
}

//--

public function findById($id)
   {
       $requete = "SELECT * FROM produit WHERE id_produit = ?";
       $resultat = $this->getDb()->fetchAssoc($requete, array($id));
       // $resultat : un array avec les infos du produit selectionné
       $produit = $this->buildProduit($resultat);
       // On transforme l'array en objet de la class Produit (POPO)

       return $produit;
   }

//--

public function findAllByCategorie($categorie){

    $req = "SELECT * FROM produit WHERE categorie = ?";
    $resultat = $this -> getDb() -> fetchAll($req, array($categorie));
    // $resultat = Array multidimentionnel composé d'array

    $produits = array();
    foreach ($resultat as $value) {
        $id_produit = $value['id_produit'];
        $produits[$id_produit] = $this -> buildProduit($value);
    }

    //$produits est maintenant un array multi composé d'autant d'objets que de produits récupérés par la requête
    return $produits;
}

//--

   protected function buildProduit(array $value){// L'objectif de cette fonction est de transformer un array contenant toutes les infos d'un produit en
       //objet de la classe Entity/Produit.
           $produit = new Produit;// Notre POPO qu'on a créé avec ses getter et setter.
           $produit -> setId_Produit($value['id_produit']);
           $produit -> setReference($value['reference']);
           $produit -> setCategorie($value['categorie']);
           $produit -> setTitre($value['titre']);
           $produit -> setDescription($value['description']);
           $produit -> setCouleur($value['couleur']);
           $produit -> setTaille($value['taille']);
           $produit -> setPublic($value['public']);
           $produit -> setPhoto($value['photo']);
           $produit -> setPrix($value['prix']);
           $produit -> setStock($value['stock']);

           return $produit;
           // On a transformer un array qui contient toutes les infos d'un produit en un objet qui contient toutes les infos du produit et on a renvoyé cet objet ensuite :slightly_smiling_face:
   }
}
