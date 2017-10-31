<?php

include_once '../../../facade/ProdFacade.php';
include_once '../../../facade/CategoryFacade.php';
include_once '../../../facade/ImageFacade.php';
include_once '../../../facade/ProductCustomDataTypeFacade.php';
include_once '../../../facade/ProductCustomDataFacade.php';

$un = '';
$pw = '';
$i  = 20;

$cFacade = new categoryFacade();
$pFacade = new prodFacade();
$iFacade = new ImageFacade();
$cdtFacade = new ProductCustomDataTypeFacade();
$cdFacade = new ProductCustomDataFacade();

//$pFacade = new prodFacade();

/* Reads */
$pGet = $pFacade->getAllProducts($un, $pw);
print_r($pGet);

//// $cGet = $cFacade->readAllCategories($un, $pw);
//$iget = $iFacade->readAllImages($un, $pw, 67);
////print_r($iget);
////$pFacade->getAllProducts($un, $pw);
$cdtGet = $cdtFacade->ReadAllProductCustomDataType($un, $pw);
//print_r($cdFacade->ReadAllProductCustomData($un, $pw));



//print_r($cdtFacade->ReadAllProductCustomDataType($un, $pw));
//$cdFacade->CreateNewData($un, $pw, '55', 1);
//$cdFacade->AddCustomData($un,$pw, 67, 1);


/* Delete */
//$cFacade->deleteProduct(3, $un, $pw);
//while ($i != 48)
//{
//    $cFacade->deleteProduct($i, $un, $pw);
//    $i++;
//}

echo '<br>';

echo '<br>EOF';

//TODO: overtryk
//belysning
//slanger
//pumper
