<?php
// app/config/prod.php

$app['db.options'] = array(

    'host' => 'localhost',
    'dbname' => 'base_site',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8'
);

// Doctrine DBAL est prévu pour récupérer nos information de connexion à la BDD grâce à $app['db.options'], voilà pourquoi on les met ici :)
// Quand on passe notre site sur le server distant de OVH ou autre registrar, c'est ici que nous viendrons changer les informations de connexion à la BDD
