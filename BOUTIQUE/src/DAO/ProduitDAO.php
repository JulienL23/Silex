<?php
// src/DAO/ProduitDAO.php

namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connexion;
use BOUTIQUE\Entity\Produit;

class ProduitDAO
{
    private $db; // Va contenir notre objet Connexion, qui représentera la connexion avec la BDD.

    public function __construct(Connexion $db){
        $this -> db = $db;
    }


    public function findAll(){
        //Fonction pour récupérer tous les produits dans la BDD :

        $requete = "SELECT * FROM produit";
        $resultat -> $this -> getDb() -> fetchAll($requete);

        // $résultat : Contient toutes les produits sous forme d'un array multidimentionnel
    }






    protected function buildProduit(array $value){ // l'objectif de cette fonction est de transformer un array contenant toutes les infos d'un produit en un objet de la classe Entity/Produit

        $produit = new Produit; // Notre POPO qu'on a créé avec ses getter et setter

        $produit -> setId_Produit($value['id_produit']);
        $produit -> setReference($value['reference']);
        $produit -> setCategorie($value['categorie']);
        $produit -> setTitre($value['titre']);
        $produit -> setDescription($value['description']);
        $produit -> setCouleur($value['couleur']);
        $produit -> setTaille($value['taille']);
        $produit -> setPublic($value['public']);
        $produit -> setPhoto($value['photo']);
        $produit -> setPrix($value['Prix']);
        $produit -> setStock($value['Stock']);

        return $produits;

        // On a transformer un array qui contient toutes les infos d'un produit en un objet qui contient toutes les infos du produit et on a envoyer cette objet ensuite :)

        $produits = array();

        foreach($resultat as $value){

            $id_produit = $value['id_produit'];
            $produits[$id_produit] = $this -> buildProduit($value);
        }
        return $produits;

    }

    // toutes les autres requetes de l'entité Produit seront ici
    // ----
    // ----

    public function findAllCategories(){
        $req = "SELECT DISTINCT categorie FROM produit";
        $resultat = $this -> getDb() -> fetchAll($req);
        // $resultat est un tableau multidimentionnel avec toutes les categories...

        
    }
}
