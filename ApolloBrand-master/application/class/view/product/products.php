<?php
$pathToImg = '../../../../public_html/img/carousel/';

require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

echo $twig->render('products.html.twig', array(
    'forProducts' => array(
        array(
            'productImage'  => ($pathToImg . 'test1.png'),
            'productTitle'  => 'title1',
            'productSerial' => 'abc123',
            'productSource' => 'productSite.php'
        ),
        array(
            'productImage'  => ($pathToImg . 'test2.png'),
            'productTitle'  => 'title2',
            'productSerial' => '2abc123',
            'productSource' => 'productSite.php'

        ),
        array(
            'productImage'  => ($pathToImg . 'test3.png'),
            'productTitle'  => 'title3',
            'productSerial' => '3abc123',
            'productSource' => 'productSite.php'

        ),
        array(
            'productImage'  => ($pathToImg . 'test1.png'),
            'productTitle'  => 'title3',
            'productSerial' => '4abc123',
            'productSource' => 'productSite.php'

        ),
        array(
            'productImage'  => ($pathToImg . 'test2.png'),
            'productTitle'  => 'title5',
            'productSerial' => '5abc123',
            'productSource' => 'productSite.php'

        ),
        array(
            'productImage'  => ($pathToImg . 'test3.png'),
            'productTitle'  => 'title6',
            'productSerial' => '6abc123',
            'productSource' => 'productSite.php'

        )
    )
));