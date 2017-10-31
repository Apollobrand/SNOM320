<?php
$pathToImg = '../../../../public_html/img/';

require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

echo $twig->render('adminIndex.html.twig', array(
    'image' => ($pathToImg . 'topbanner.PNG'),
    'link'  => 'overviewProduct.php'
));