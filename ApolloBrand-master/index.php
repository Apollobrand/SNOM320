<?php
$pathToImg = 'public_html/img/carousel/';

require_once('vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('application/template');
$twig = new Twig_Environment($loader);

echo $twig->render('test.frontpage.html.twig', array(
    'forCarousel' => array(
        array(
            'carouselImage'     => ($pathToImg . 'test1.png'),
            'carouselCategory'  => 'caCat1',
            'carouselTitle'     => 'caTit1',
            'carouselSource'    => ''
        ),
        array(
            'carouselImage'     => ($pathToImg . 'test2.png'),
            'carouselCategory'  => 'caCat2',
            'carouselTitle'     => 'caTit2',
            'carouselSource'    => ''
        ),
        array(
            'carouselImage'     => ($pathToImg . 'test3.png'),
            'carouselCategory'  => 'caCat3',
            'carouselTitle'     => 'caTIt3',
            'carouselSource'    => ''
        )
    ),

    'forCases' => array(
        array(
            'caseImage'         => ($pathToImg . 'test1.png'),
            'caseTitle'         => 'caTit1',
            'caseSource'        => 'test.frontpage.html.twig'
        ),
        array(
            'caseImage'         => ($pathToImg . 'test2.png'),
            'caseTitle'         => 'caTit2',
            'caseSource'        => ''
        ),
        array(
            'caseImage'         => ($pathToImg . 'test3.png'),
            'caseTitle'         => 'caTit3',
            'caseSource'        => ''
        )
    )

    // TODO: Service and instant contact... link to kontakt???
));