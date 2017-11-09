<?php
// src/Entity/Produit.php

namespace BOUTIQUE\Entity;

class Produit
{
    private $id_produit;
    private $reference;
    private $categorie;
    private $titre;
    private $description;
    private $couleur;
    private $taille;
    private $public;
    private $photo;
    private $prix;
    private $stock;

    public function setId_Produit($id){
        $this -> id_produit = $id;
    }
    public function getId_Produit(){
        return $this -> id_produit;
    }

    public function setReference($ref){
        $this -> reference = $ref;
    }
    public function getReference(){
        return $this -> reference;
    }

    public function setCategorie($cat){
        $this -> categorie = $cat;
    }
    public function getCategorie(){
        return $this -> categorie;
    }

    public function setTitre($tit){
        $this -> titre = $tit;
    }
    public function getTitre(){
        return $this -> titre;
    }

    public function setDescription($des){
        $this -> description = $des;
    }
    public function getDescription(){
        return $this -> description;
    }

    public function setCouleur($col){
        $this -> couleur = $col;
    }
    public function getCouleur(){
        return $this -> couleur;
    }

    public function setTaille($tai){
        $this -> taille = $tai;
    }
    public function getTaille(){
        return $this -> taille;
    }

    public function setPublic($pub){
        $this -> public = $pub;
    }
    public function getPublic(){
        return $this -> public;
    }

    public function setPhoto($pho){
        $this -> photo = $pho;
    }
    public function getPhoto(){
        return $this -> photo;
    }

    public function setPrix($pri){
        $this -> prix = $pri;
    }
    public function getPrix(){
        return $this -> prix;
    }

    public function setStock($sto){
        $this -> stock = $sto;
    }
    public function getStock(){
        return $this -> stock;
    }

}
