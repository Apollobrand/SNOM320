<?php
require_once(__DIR__ . '/../../../facade/ProdFacade.php');
require_once(__DIR__ . '/../../../facade/CategoryFacade.php');
require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');

$un = '';
$pw = '';

$catId = 0;

// For twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);
// end twig

$pFacade = new prodFacade();
$cFacade = new categoryFacade();

// Basic Product
if (isset($_POST['catSelector']))
    $categorySelector   = $_POST['catSelector'];
if (isset($_POST['descriptionLong']))
    $descriptionLong    = $_POST['descriptionLong'];
if (isset($_POST['descriptionShort']))
    $descriptionShort   = $_POST['descriptionShort'];
if (isset($_POST['itemNumber']))
    $itemNumber         = $_POST['itemNumber'];
if (isset($_POST['itemNumberSupplier']))
    $itemNumberShort    = $_POST['itemNumberSupplier'];
if (isset($_POST['producerId']))
    $producerId         = $_POST['producerId'];
if (isset($_POST['seoDescription']))
    $seoDescription     = $_POST['seoDescription'];
if (isset($_POST['seoKeywords']))
    $seoKeywords        = $_POST['seoKeywords'];
if (isset($_POST['seoTitle']))
    $seoTitle           = $_POST['seoTitle'];
if (isset($_POST['title']))
    $title              = $_POST['title'];
if (isset($_POST['url']))
    $url                = $_POST['url'];
if (isset($_POST['weight']))
    $weight             = $_POST['weight'];

// Variant TODO: Variant
if (isset($_POST['createProduct']))
    $confirmButton      = $_POST['createProduct'];
if (isset($_POST['createVariant']))
    $confirmButton      = $_POST['createProduct'];

// This is the heavenly piece of code, which took me three days to write. THREE
$cats = $cFacade->readAllCategories($un, $pw);
$catAr = array();
foreach ($cats as $var)
{
    $pleaseWork = $var->Title;
    array_push($catAr, $pleaseWork);
}

echo $twig->render('adminAddProduct.html.twig', array(
    'cat' => $catAr
));
