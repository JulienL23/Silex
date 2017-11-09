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

$app -> get('/', function() use($app){

    $produits = $app['dao.produit'] -> findAll();
    // $produits = objetModelProduit (ProduitDAO) -> findAll();
    // produits est tableau multidimentionnel composé d'objet

    $categories = $app['dao.produit'] -> findAllCategories();

    // ob_start();
    // require '../views/view.php';
    // $view = ob_get_clean();
    // return $view;

    // Ajouté à l'étape 8.6.
    $params = array(
        'produits' => $produits,
        'categories' => $categories,
        'title' => 'Accueil'
    );

    return $app['twig'] -> render('index.html.twig', $params);

});



$app->get('/produit/{id}', function($id) use($app)
{
    $pdt = $app['dao.produit']->findById($id);

    $params = array(
        'produit' => $pdt,
    );

        return $app['twig'] -> render('produit.html.twig', $params);
});


// On souhaite construire une nouvelle route (fonctionnalité/affichage) qui va nous afficher tout les produit en fonction de la categorie. L'URL souhaitée est : www.boutique.dev/boutique/nom_de_la_categorie

$app -> get('/boutique/{categorie}', function($categorie) use($app){

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

});
