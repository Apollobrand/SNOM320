<?php
require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

echo $twig->render('adminOverviewNews.html.twig', array(
    'forNews' => array(
        array(
            'newsTitle' => 'title1',
            'newsAuthor'=> 'author1',
            'newsDate'  => 'xx/yy/zzzz'
        ),
        array(
            'newsTitle' => 'title1',
            'newsAuthor'=> 'author1',
            'newsDate'  => 'xx/yy/zzzz'
        ),
        array(
            'newsTitle' => 'title1',
            'newsAuthor'=> 'author1',
            'newsDate'  => 'xx/yy/zzzz'
        ),
    )
));

//TODO: ADD COUNTER