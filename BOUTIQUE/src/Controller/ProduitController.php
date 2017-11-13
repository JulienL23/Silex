<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Entity\Produit;

class ProduitController
{
    public function produitAction($id, Application $app){

        $pdt = $app['dao.produit']->findById($id);

        $params = array(
            'produit' => $pdt,
        );

            return $app['twig'] -> render('produit.html.twig', $params);

    }

    public function boutiqueAction($categorie, Request $request, Application $app){

        // Etape 1 : récupérer les produits en fonction de $categorie
        // SELECT * FROM produit WHERE categorie = '$categorie'
        $produits = $app['dao.produit'] -> findAllByCategorie($categorie);
        // Etape 2 : Récupérer également toutes les categorie pour ré_afficher le menu latéral
        $categories = $app['dao.produit'] -> findAllCategories();

        $params = array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Nos' . $categorie . 's'
        );

        return $app['twig'] -> render('index.html.twig', $params);


    }
}
