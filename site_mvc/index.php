<?php
define('RACINE_SITE', '/silex/site_mvc/');
require('model.php');

$infos = afficheAll();

$produits = $infos["produits"];
$categorie = $infos["categorie"];


require('view.php');

 ?>
