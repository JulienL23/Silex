<?php

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

$app -> get('/', function(){

    $produits = $app['dao.produit'] -> findAll();
    // $produits = objetModelProduit (ProduitDAO) -> findAll();
    // produits est tableau multidimentionnel composé d'objet

    $categories = $app['dao.produit'] -> findAllCategories();

    ob_start();
    require '../views/view.php';
    $view = ob_get_clean();
    return $view;

});
