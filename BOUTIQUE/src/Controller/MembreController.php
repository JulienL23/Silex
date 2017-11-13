<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MembreController
{
    public function profilAction(Application $app){
        session_start();
        $_SESSION['membre']['id_membre'] = '1' ;
        $_SESSION['membre']['pseudo'] = 'Picsou23' ;
        $_SESSION['membre']['sexe'] = 'm' ;
        $_SESSION['membre']['prenom'] = 'Julien' ;
        $_SESSION['membre']['nom'] = 'Anonyme' ;
        $_SESSION['membre']['email'] = 'Blablabla@bla.com' ;
        $_SESSION['membre']['adresse'] = 'Dans ton c**' ;
        $_SESSION['membre']['code_postal'] = '92230' ;
        $_SESSION['membre']['ville'] = 'Gennevilliers' ;
        $_SESSION['membre']['statut'] = '0' ;

        // Etc ...
        $params = array(
            'profil' => $_SESSION['membre'],
        );

        //On rend la vue profil.html.twig

        return $app['twig'] -> render('profil.html.twig', $params);


    }

}
