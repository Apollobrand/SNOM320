<?php
require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');
require_once('../../../facade/ProdFacade.php');

$un = 'aln-nielsen@protonmail.com';
$pw = 'Robotics01';

// Instance of prodFacade... duh
$pFacade = new prodFacade();

// Twig stuff
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);

$prods = $pFacade->getAllProducts($un, $pw);
$prodAr = array();
foreach ($prods as $var)
{
    $pleaseWork = array(
        'id'        => $var->Id,
        'title'     => $var->Title,
        'itemNum'   => $var->ItemNumber,
        'catNum'    => $var->CategoryId,
    );
}

echo "string";
print_r($pleaseWork);


// Get stuff
echo $twig->render('adminOverviewProduct.html.twig', array(
    'prodArray' => array(
        'pid' => $pleaseWork->id,
        'pt' => $pleaseWork->Title,
        'pin' => $pleaseWork->itemNum,
        'pcn' => $pleaseWork->catNum
    ),
));

/*$prodSearch = $_POST['prodSearch']; // Notice: might need to use ISSET

$str = '      ';
if ($prodSearch != ctype_space($str))
{
  foreach ($facade->getProductById($un, $pw, $prodSearch) as $Product)
  {
    echo $twig->render('adminOverviewProduct.html.twig', array(
      'prodArray' => array(
        $Product->Id          => 'productId',
        $Product->ItemNumber  => 'itemId',
        $Product->Title       => 'productTitle',
        $Product->BrandId     => 'productBrand',
        $Product->CategoryId  => 'categoryId'
      )
    ));
  }
}
else
{
  foreach ($facade->getAllProducts($un, $pw) as $Product)
  {
    echo $twig->render('adminOverviewProduct.html.twig', array(
      'prodArray' => array(
        $Product->Id          => 'productId',
        $Product->ItemNumber  => 'itemId',
        $Product->Title       => 'productTitle',
        $Product->BrandId     => 'productBrand',
        $Product->CategoryId  => 'categoryId'
      )
    ));
  }
}*/

// Delete


// TODO: COUNTERS FOR TOTAL NUMBER OF PRODUCTS
