<?php

require_once ('/vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("application/templates");
$twig = new Twig_Environment($loader);

// TODO: SELECT stuff from DB.

echo $twig->render('productSite.html.twig', array (
    $img => array (

    ),
    $specs => array (

    ),
    $variants => array(

    )
));