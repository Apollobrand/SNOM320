<?php
$pathToImg = '../../../../public_html/img/carousel/';

require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

echo $twig->render('productIndex.html.twig', array(
    'forCategory' => array(
        array(
            'categoryImage'     => ($pathToImg . 'test1.png'),
            'categoryTitle'     => 'Slanger & vandkoblinger',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test2.png'),
            'categoryTitle'     => 'Brandbekæmpelse',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test3.png'),
            'categoryTitle'     => 'Pumper',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test1.png'),
            'categoryTitle'     => 'Generatorer',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test2.png'),
            'categoryTitle'     => 'Belysning',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test3.png'),
            'categoryTitle'     => 'Overtryksventilatorer',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test1.png'),
            'categoryTitle'     => 'Værktøj',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test2.png'),
            'categoryTitle'     => 'Rednings udstyr',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test3.png'),
            'categoryTitle'     => 'Øvelsesudstyr',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test1.png'),
            'categoryTitle'     => 'Miljø & klimamateriel',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test2.png'),
            'categoryTitle'     => 'Strålerør & vandkanoner',
            'categorySource'    => 'products.php'
        ),
        array(
            'categoryImage'     => ($pathToImg . 'test3.png'),
            'categoryTitle'     => 'Diverse',
            'categorySource'    => 'products.php'
        )
    )
));