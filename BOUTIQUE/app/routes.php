<?php

use Symfony\Component\HttpFoundation\Request;
// Request est la classe Symfony qui va gérer les requête HTTPS (POST). On ne récupère les infos avec $_POST directement

// Creer ca en etape 6.3 ( explications.txt )
// Commenté en étape 7.9 ( explications.txt )

// $app -> get('/', function(){
//     require '../src/model.php';
//     // Fichier qui contient notre fonction afficheAll()
//
//     $infos = afficheAll();
//
//     $produits = $infos['produits'];
//     $categorie = $infos['categorie'];
//
//     ob_start(); // Enclenche la temporisation. Cela signifie que tout ce qui suit ne sera pas exécuté
//     require '../views/view.php';
//     $view = ob_get_clean(); // Stock tout ce qui a été retenu dans une variable
//     return $view;
//
//     // Ici on a stocké notre vue dans la variable $view frâce a ob_start() et ob_get_clean(). Ensuite on retourne  la vue. C'est la base de la function render() qu'on utilisera par la suite.
//
// });


// Créer en étape 7.9 :

$app -> get('/', "BOUTIQUE\Controller\BaseController::indexAction")-> bind('home');

/////////////////////////////////////////

$app->get('/produit/{id}', "BOUTIQUE\Controller\ProduitController::produitAction")-> bind('produit');

/////////////////////////////////////////
// On souhaite construire une nouvelle route (fonctionnalité/affichage) qui va nous afficher tout les produit en fonction de la categorie. L'URL souhaitée est : www.boutique.dev/boutique/nom_de_la_categorie

$app -> get('/boutique/{categorie}', "BOUTIQUE\Controller\ProduitController::boutiqueAction")-> bind('boutique');


// exo : Faire la route qui va afficher la page de profil. En simulant à l'intérieur de la route l'ouverture de la session et en enregistrant dans $_SESSION['membre'] les infos d'un membre au hasard.

$app -> get('/profil/', "BOUTIQUE\Controller\MembreController::profilAction")-> bind('profil');


// Fonctionnalité pour le formulaire de contact
$app -> match('/contact/', "BOUTIQUE\Controller\BaseController::contactAction")-> bind('contact');

// Route pour l'affichage de tous les produits dans le backoffice (dans un tableau HTML)
$app -> get('/backoffice/produit/', 'BOUTIQUE\Controller\BackOfficeController::produitAction') -> bind('bo_produit');

// Route pour ajouter un nouveau produit
$app -> match('/backoffice/produit/add/', 'BOUTIQUE\Controller\BackOfficeController::addProduitAction') -> bind('bo_produit_add');
