<?php
$pathToImg = '../../../../public_html/img/carousel/';

require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

echo $twig->render('productIndex.html.twig', array(

));