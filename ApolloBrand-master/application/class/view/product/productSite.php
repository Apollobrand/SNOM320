<?php
$pathToImg = '';

require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

echo $twig->render('productSite.html.twig', array(
    // Basic info
    'productImage'      => ($pathToImg . 'test1.png'),
    'productTitle'      => 'Title',
    'productMake'       => 'Maker',
    'productSerial'     => 'abc123',
    'productDescription'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis at lorem vehicula semper. Nulla non elementum risus, eu fringilla ipsum. Morbi facilisis mattis turpis ac elementum. Vestibulum vestibulum mattis lorem, a porttitor sem. Duis pharetra tempus ante, ac vestibulum nisl cursus at. Nam libero odio, vulputate id blandit et, semper ac leo. Proin vehicula tellus in augue tempor, nec sollicitudin elit fringilla. Pellentesque varius tortor sed magna consequat, ut placerat augue volutpat. Sed ac facilisis velit. Nunc sed ex risus. Aliquam viverra elit eget commodo auctor. Nam nulla mi, tempus sit amet tempus et, placerat vitae neque. Nullam sit amet nisi et justo malesuada auctor ornare a ante. Suspendisse lacinia eros ut sagittis malesuada. Phasellus tempor nisl quis faucibus consectetur.',

    // Specs
    'forSpecs' => array(
        'productHeight' => array('category' => 'Højde', 'value' => '10m'),
        'productWidth'  => array('category' => 'Brede', 'value' => '10m'),
        'productWeight' => array('category' => 'Vægt', 'value' => '10t')
    ),

    //variants
    'forVari' => array(
        'Vari1' => array('category' => 'Kategori 1', 'value' => 'Ja'),
        'Vari2' => array('category' => 'Kategori 2', 'value' => '10')
    )
));